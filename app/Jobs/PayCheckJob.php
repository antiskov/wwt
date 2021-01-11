<?php

namespace App\Jobs;

use App\Models\UserTransaction;
use App\Services\PayService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PayCheckJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var PayService
     */
    private $service;
    /**
     * @var UserTransaction
     */
    private $transaction;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(UserTransaction $transaction, PayService $service)
    {

        $this->service = $service;
        $this->transaction = $transaction;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->service->forCheckTransaction($this->transaction);
    }
}
