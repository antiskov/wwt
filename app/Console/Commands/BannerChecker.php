<?php

namespace App\Console\Commands;

use App\Services\BannerService;
use App\Services\RateService;
use Illuminate\Console\Command;

class BannerChecker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'banner:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update is_active of a banner if his time is now.';

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
    public function handle(BannerService $service)
    {
        $service->checkActive();
    }
}
