<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
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

    public function requestPayment(Request $request)
    {
        $this->validate($request, [
            'amount' => ['required', 'integer', 'max:100'], //maximum payment should be 100 since it is yet on demo
            'from' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);

        $token = $this->getNewToken()->token;

        if (!$token) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to get token, please try again'
            ], 404);
        }

        $url = "https://demo.campay.net/api/collect/";
        $data = [
            "amount" => $request->amount,
            "from" => $request->from,
            "description" => $request->description,
            "external_reference" => auth()->user()->id,
            "currency" => "XAF"
        ];

        // Initializes a new cURL session
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            "Authorization: Token ${token}"
        ]);
        $response = curl_exec($curl);
        curl_close($curl);

        $json_response = json_decode($response);

        // Other than doing this, you have to get the details of a transaction by getting making GET request to /transaction/(reference)/.
        $transaction = new Transaction();
        $transaction->user_id = auth()->user()->id;
        $transaction->amount = $request->amount;
        $transaction->status = 'PENDING';
        $transaction->operator = $json_response->operator;
        $transaction->reference = $json_response->reference;
        $transaction->phone = $request->from;
        $transaction->description = $request->description;
        $transaction->external_reference = auth()->user()->id;
        $transaction->currency = "XAF";
        $transaction->save();

        return response()->json([
            'response' => $transaction
        ], 200);
    }
}
