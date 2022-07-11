<?php

namespace App\Console\Commands;

use App\Jobs\CheckTransactionStatus;
use App\Models\Transaction;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CheckTransaction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:transaction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is to check the status of a transaction';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info('Just checked in');
        $transactions = Transaction::where('status', 'PENDING')->get();
        if (count($transactions) > 0) {
            foreach ($transactions as $transaction) {
                CheckTransactionStatus::dispatch($transaction);
            }
        } else {
            Log::info('No transaction with status of PENDING');
        }
    }
}
