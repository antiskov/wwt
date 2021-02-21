<?php

namespace App\Console\Commands;

use App\Models\Advert;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckActiveAdvert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adverts:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Changed status.';

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
    public function handle()
    {
        $date = Carbon::now();
        $statuses = Status::all();
        $statusId = $statuses->where('title', 'published')->first()->id;
        $adverts = Advert::where('status_id', $statusId)->get();

        foreach ($adverts as $advert) {
            if ($advert->finish_date_active_status < $date) {
                $advert->status_id = $statuses->where('title', 'archive')->first()->id;
                if (!$advert->save()){
                    \Log::info("Advert #$advert->id not changed active status.");
                }
            }
        }
    }
}
