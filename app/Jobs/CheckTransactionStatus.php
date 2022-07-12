<?php

namespace App\Jobs;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CheckTransactionStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $transaction;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function getNewToken()
    {
        $campay_username = "uEv0V7AiaD5zqO5XmlONY7_jxmA0j32-rJRSDqGAbk3jl_HAf-YfjULvEQbaKqvbX-SgVXmwwFaOtrDSKcM-dQ";
        $campay_password = "57SiTLYa6_XIugUXtpjOki-ZDZvFgbBREwh0sMK2tW5SDt1A34QCzoU7Myfn4eIV8IH4iZ0EhKD5p8YKd4XvIg";

        $url = "https://demo.campay.net/api/token/";
        $data = [
            "username" => $campay_username,
            "password" => $campay_password
        ];

        // Initializes a new cURL session
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);
        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $token = $this->getNewToken()->token;

        // Get transaction details
        $url = "https://demo.campay.net/api/transaction/{$this->transaction->reference}/";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Token ${token}",
            'Content-Type: application/json'
        ]);
        $result = curl_exec($ch);
        curl_close($ch);

        $json_transaction = json_decode($result);


        if ($json_transaction->status == 'SUCCESSFUL') {
            $transaction = Transaction::where('reference', $this->transaction->reference)->first();
            $transaction->status = 'SUCCESSFUL';
            $transaction->save();

            $user = User::where('id', $transaction->user_id)->first();
            $user->coins += $transaction->amount;
            $user->save();
            Log::info('Successfully credited user with ' . $transaction->amount);
        } else if ($json_transaction->status == 'FAILED') {
            $transaction = Transaction::where('reference', $this->transaction->reference)->first();
            $transaction->status = 'FAILED';
            $transaction->save();
            Log::info('Failed to credit user with ' . $transaction->amount);
        }
    }
}
