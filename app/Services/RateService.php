<?php

namespace App\Services;

use App\Models\ExchangeRate;
use GuzzleHttp\Client;

class RateService
{
    public function update()
    {
        $client = new Client();
        //todo: to ENV
        $request = $client->get('https://api.privatbank.ua/p24api/pubinfo?exchange&json&coursid=11');
        $result = json_decode($request->getBody()->getContents(), true);
        //todo: to one request
        if ($usd = ExchangeRate::where('pair_currencies', 'USD/UAH')->first()) {
            if ($eur = ExchangeRate::where('pair_currencies', 'EUR/UAH')->first()) {
                $usd->rate = $result[0]['sale'];
                $usd->save();

                $eur->rate = $result[1]['sale'];
                $eur->save();
            }
        } else {
            $usd = new ExchangeRate();
            $eur = new ExchangeRate();
            $usd->pair_currencies = 'USD/UAH';
            $usd->rate = $result[0]['sale'];
            $usd->save();

            $eur->pair_currencies = 'EUR/UAH';
            $eur->rate = $result[1]['sale'];
            $eur->save();
        }
    }
}
