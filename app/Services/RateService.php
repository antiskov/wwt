<?php

namespace App\Services;

use App\Models\ExchangeRate;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class RateService
{
    public function update()
    {
        $client = new Client();
        //todo: to ENV.done
        $request = $client->get(env('PRIVATBANK_RATE_URL'));
        $result = json_decode($request->getBody()->getContents(), true);
        //todo: to one request.done
        $currency = ExchangeRate::all();
        if ($usd = $currency->where('pair_currencies', 'USD/UAH')->first()) {
            if ($eur = $currency->where('pair_currencies', 'EUR/UAH')->first()) {
                $usd->rate = $result[0]['sale'];
                if (!$usd->save()) {
                    Log::info("USD/UAH not saved");
                }

                $eur->rate = $result[1]['sale'];
                if (!$eur->save()) {
                    Log::info("EUR/UAH not saved");
                }
            }
        } else {
            $usd = new ExchangeRate();
            $eur = new ExchangeRate();
            $usd->pair_currencies = 'USD/UAH';
            $usd->rate = $result[0]['sale'];
            if (!$usd->save()) {
                Log::info("USD/UAH not saved");
            }

            $eur->pair_currencies = 'EUR/UAH';
            $eur->rate = $result[1]['sale'];
            if (!$eur->save()) {
                Log::info("EUR/UAH not saved");
            }
        }
    }
}
