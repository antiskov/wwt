<?php

namespace App\Services;

use App\Models\Currency;
use App\Models\ExchangeRate;
use GuzzleHttp\Client;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class RateService
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update()
    {
        $client = new Client();

        $request = $client->get(env('PRIVATBANK_RATE_URL'));
        $result = json_decode($request->getBody()->getContents(), true);

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

    /**
     * @return array
     */
    public function transRate()
    {
        if (Session::has('currency')) {
            if (\Session::get('currency') == 'UAH') {
                $rate = ExchangeRate::where('pair_currencies', 'USD/UAH')->first();
                $currency['rate'] = $rate->rate;
            } elseif (\Session::get('currency') == 'EUR') {
                $eur = ExchangeRate::where('pair_currencies', 'EUR/UAH')->first()->rate;
                $usd = ExchangeRate::where('pair_currencies', 'USD/UAH')->first()->rate;
                $currency['rate'] = $eur / $usd;
            } else {
                $currency['rate'] = 1;
            }
        } else {
            $currency['rate'] = 1;
        }

        return $currency;
    }

    /**
     * @return array
     */
    public function checkRate()
    {
        if(Session::has('currency')){
            if (\Session::get('currency') == 'UAH') {
                $rate = ExchangeRate::where('pair_currencies', 'USD/UAH')->first();
                $currency['rate'] = $rate->rate;
                $currency['symbol'] = Currency::where('title', 'UAH')->first()->symbol;
            } elseif (\Session::get('currency') == 'EUR') {
                $eur = ExchangeRate::where('pair_currencies', 'EUR/UAH')->first()->rate;
                $usd = ExchangeRate::where('pair_currencies', 'USD/UAH')->first()->rate;
                $currency['rate'] =  $usd / $eur;
                $currency['symbol'] = Currency::where('title', 'EUR')->first()->symbol;
            } else {
                $currency['rate'] = 1;
                $currency['symbol'] = Currency::where('title', 'USD')->first()->symbol;
            }
        } else {
            $currency['rate'] = 1;
            $currency['symbol'] = Currency::where('title', 'USD')->first()->symbol;
        }

        return $currency;
    }

    /**
     * @param FormRequest $request
     * @return float|int
     */
    public function setPriceRate(FormRequest $request)
    {
        $currency = ExchangeRate::all();
        if ($request->currency == 'EUR') {
            $eur = $currency->where('pair_currencies', 'EUR/UAH')->first()->rate;
            $usd = $currency->where('pair_currencies', 'USD/UAH')->first()->rate;
            $rate = $usd / $eur;
        } elseif ($request->currency == 'UAH') {
            $rate = $currency->where('pair_currencies', 'USD/UAH')->first()->rate;
        } elseif ($request->currency == 'USD') {
            $rate = 1;
        }
        return $rate;
    }
}
