<?php

namespace App\Console\Commands;

use App\Models\UserTransaction;
use App\Services\PayService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class PayCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pay:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check status transaction.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(PayService $service)
    {
        $date = Carbon::now();

        $transactions = UserTransaction::where('status', '!=', 'success')->get();

        foreach ($transactions as $transaction) {
            if ($date->diffInDays($transaction->created_at) <= 3){
                $service->forCheckTransaction($transaction);
            }
        }
    }
}
