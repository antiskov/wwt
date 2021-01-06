<?php

namespace App\Console\Commands;

use App\Services\RateService;
use Illuminate\Console\Command;

class UpdateRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rate:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update exchange rates in database';

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
     * @param RateService $service
     * @return int
     */
    public function handle(RateService $service)
    {
        $service->update();
    }
}
