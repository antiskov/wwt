<?php

namespace App\Services;

use App\Domain\Liqpay;
use App\Domain\TransactionCreator;
use App\Models\Advert;
use App\Models\Price;
use App\Models\UserTransaction;
use Carbon\Carbon;
use http\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class PayService
{
    /**
     * @return array
     */
    public function getParameters()
    {
        return [
            'privateKey' => env('PRIVATE_KEY'),
            'publicKey' => env('PUBLIC_KEY'),
            'url' => env('LIQPAY_URL').'api/3/checkout',
        ];

    }

    /**
     * @param Advert $advert
     */
    public function bayVipStatusFromCost(Advert $advert)
    {
        $order_id = 'buy-vip-' . auth()->user()->id . '-' . rand(1000000, 2000000);
        $transaction = new TransactionCreator();
        $price = Price::where('title', 'vip')->first()->value;
        $transaction->additionCost($price, $order_id, 'cost', 'buy vip', 'success' );

        $advert->vip_status = 1;
        if (!$advert->save()) {
            Log::info("Transaction #$advert->id not changed vip_status");
        }
    }

    /**
     * @param $order_id
     * @param string $description
     * @param string $currency
     * @return array
     */
    public function setPay($order_id, $description = 'пополнение счета', $currency = 'UAH')
    {
        $transaction = UserTransaction::where('order_id', $order_id)->first();
        $parameters = $this->getParameters();
        $array = [
            "public_key" => $parameters['publicKey'],
            "version" => "3",
            "action" => "pay",
            "amount" => $transaction->price,
            "currency" => $currency,
            "description" => $description,
            "order_id" => $order_id,
            'server_url' => env('APP_URL').env('PAYMENT_CALLBACK_URL'),
            'result_url' => route('status_pay', $order_id),
        ];

        $json = json_encode($array);
        $data = base64_encode($json);

        $sign_string = $parameters['privateKey'] . $data . $parameters['privateKey'];
        $signature = base64_encode(sha1($sign_string, true));

        $payArr = [
            'data' => $data,
            'signature' => $signature,
            'url' => $parameters['url'],
            'order_id' => $order_id,
            'amount' => $transaction->price,
        ];

        return $payArr;
    }

    /**
     * @param Request $request
     * @param string $description
     * @return mixed
     */
    public function setTransactionDB(Request $request, $description = 'addition cost')
    {
        $order_id = auth()->user()->id . '-' . rand(1000000, 2000000);
        $transaction = new TransactionCreator();
        $transaction->additionCost($request->input('cost'), $order_id);

        return $transaction->getOrderId();
    }

    /**
     * @param Advert $advert
     * @return mixed
     */
    public function setTransactionForSubmitting(Advert $advert)
    {
        $order_id = 'vip-adv-' . $advert->id . '-' . auth()->user()->id . '-' . rand(1000000, 2000000);;
        $transaction = new TransactionCreator();
        $price = Price::where('title', 'vip')->first()->value;
        $transaction->additionCost($price, $order_id);

        return $transaction->getOrderId();
    }

    /**
     *
     */
    public function checkTransaction()
    {
        if ($transaction = UserTransaction::where('user_id', auth()->user()->id)->where('type', 'addition')->latest()->first()) {
            $this->forCheckTransaction($transaction);
        }
    }

    /**
     * @param UserTransaction $transaction
     * @return UserTransaction
     */
    public function forCheckTransaction(UserTransaction $transaction)
    {
        $parameters = $this->getParameters();

        $liqpay = new Liqpay($parameters['publicKey'], $parameters['privateKey']);

        $res = $liqpay->api("request", array(
            'action' => 'status',
            'version' => '3',
            'order_id' => $transaction->order_id,
        ));

        $transaction->status = $res->status;
        if (!$transaction->save()) {
            Log::info("Transaction #$transaction->id not saved");
        }

        return $transaction;
    }

    /**
     *
     */
    public function setCallback()
    {
        $parameters = $this->getParameters();
        $sign_string = $parameters['privateKey'] . $_POST['data'] . $parameters['privateKey'];
        $signature = base64_encode(sha1($sign_string, true));

        if ($signature == $_POST['signature']) {
            $callbackPar = json_decode(base64_decode($_POST['data']), true);
            $transaction = UserTransaction::where('order_id', $callbackPar['order_id'])->first();
            $transaction->status = $callbackPar['status'];
            if (!$transaction->save()) {
                Log::info("Transaction #$transaction->id not saved");
                abort(400);
            } else {
                $this->checkStatusPayForSubmitting($transaction);
                http_response_code(200);
            }
        } else {
            \Log::info('incorrect signature');
            abort(400);
        }
    }

    /**
     * @param $order_id
     * @return mixed
     */
    public function getCheckStatusPay($order_id)
    {
        $transaction = UserTransaction::where('order_id', $order_id)->where('type', 'addition')->first();
        $transaction = $this->forCheckTransaction($transaction);

        $this->checkStatusPayForSubmitting($transaction);

        return $transaction->status;
    }

    /**
     * @param UserTransaction $transaction
     */
    private function checkStatusPayForSubmitting(UserTransaction $transaction)
    {
        $vipArr = explode('-', $transaction->order_id);

        if ($vipArr[0] == 'vip' && $transaction->status == 'success') {

            $order_id = 'buy-vip-' . auth()->user()->id . '-' . rand(1000000, 2000000);
            $cost = new TransactionCreator();
            $cost->additionCost($transaction->price, $order_id, 'cost', 'buy vip', 'success');

            $this->setVipStatusAdvert($vipArr[2]);
        }
    }

    /**
     * @param $id
     */
    public function setVipStatusAdvert($id)
    {
        $advert = Advert::find($id);
        $advert->vip_status = 1;

        if (!$advert->save()) {
            Log::info("Advert #$advert->id not saved");
        }
    }

    //It's a balance

    /**
     * @return int
     */
    public function getScore()
    {
        $score = 0;
        $transactions = UserTransaction::where('user_id', auth()->user()->id)->get();
        foreach ($transactions as $transaction) {
            if ($transaction->type == 'addition' && $transaction->status == 'success') {
                $score = $score + $transaction->price;
            } elseif ($transaction->status == 'success') {
                $score = $score - $transaction->price;
            }
        }

        return $score;
    }

    public function getScoreUser($id)
    {
        $score = 0;
        $transactions = UserTransaction::where('user_id',$id)->get();
        foreach ($transactions as $transaction) {
            if ($transaction->type == 'addition' && $transaction->status == 'success') {
                $score = $score + $transaction->price;
            } elseif ($transaction->status == 'success') {
                $score = $score - $transaction->price;
            }
        }

        return $score;
    }
}
