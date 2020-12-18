<?php

namespace App\Services;

use App\Domain\Liqpay;
use App\Models\Advert;
use App\Models\UserTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PayService
{
    public function getParameters()
    {
        return [
            'privateKey' => 'sandbox_1f1JbI1pp8NriSBW0Zjw0EI6dNrQNoBaLGvXHrMo',
            'publicKey' => 'sandbox_i10140636412',
            'url' => 'https://www.liqpay.ua/api/3/checkout',
        ];

    }

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
//            'server_url' => route('callback_pay'),
            'server_url' => 'http://d4348b050153.ngrok.io/api/callback_pay',
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

    public function setTransactionDB(Request $request, $description = 'addition cost')
    {
        $userTransaction = new UserTransaction();
        $userTransaction->type = 'addition';
        $userTransaction->user_id = auth()->user()->id;
        $userTransaction->price = $request->get('cost');
        $userTransaction->title = $description;
        $userTransaction->status = 'none';
        $userTransaction->order_id = auth()->user()->id . '-' . rand(1000000, 2000000);
        $userTransaction->save();

        return $userTransaction->order_id;
    }

    public function setTransactionForSubmitting(Advert $advert)
    {
        $userTransaction = new UserTransaction();
        $userTransaction->type = 'addition';
        $userTransaction->user_id = auth()->user()->id;
        $userTransaction->price = 50; //todo remake to admin
        $userTransaction->title = 'addition cost';
        $userTransaction->status = 'none';
        $userTransaction->order_id = 'vip-adv-'.$advert->id.'-'.auth()->user()->id . '-' . rand(1000000, 2000000);
        $userTransaction->save();

        return $userTransaction->order_id;
    }

    public function checkTransaction()
    {
        if ($transaction = UserTransaction::where('user_id', auth()->user()->id)->where('type', 'addition')->latest()->first()) {
            $transaction = $this->forCheckTransaction($transaction);
        }
    }

    private function forCheckTransaction(UserTransaction $transaction){
        $parameters = $this->getParameters();

        $liqpay = new Liqpay($parameters['publicKey'], $parameters['privateKey']);

        $res = $liqpay->api("request", array(
            'action' => 'status',
            'version' => '3',
            'order_id' => $transaction->order_id,
        ));

        $transaction->status = $res->status;
        $transaction->save();

        return $transaction;
    }

    public function setCallback()
    {
        $parameters = $this->getParameters();
        $sign_string = $parameters['privateKey'] . $_POST['data'] . $parameters['privateKey'];
        $signature = base64_encode(sha1($sign_string, true));

        if($signature == $_POST['signature']){
            $callbackPar = json_decode(base64_decode($_POST['data']), true);
            $transaction = UserTransaction::where('order_id', $callbackPar['order_id'])->first();
            $transaction->status = $callbackPar['status'];
            $transaction->save();

            $this->checkStatusPayForSubmitting($transaction);

            \Log::info([$callbackPar['order_id'], $callbackPar['status']]);
        } else {
            \Log::info('incorrect signature');
        }
    }

    public function getCheckStatusPay($order_id)
    {
        $transaction = UserTransaction::where('order_id', $order_id)->where('type', 'addition')->first();
        $transaction = $this->forCheckTransaction($transaction);

        $this->checkStatusPayForSubmitting($transaction);

        return $transaction->status;
    }

    private function checkStatusPayForSubmitting(UserTransaction $transaction)
    {
        $vipArr = explode('-', $transaction->order_id);

        if($vipArr[0] == 'vip' && $transaction->status == 'success'){
            $userTransaction = new UserTransaction();
            $userTransaction->type = 'cost';
            $userTransaction->user_id = $transaction->user->id;
            $userTransaction->price = $transaction->price; //todo remake to admin
            $userTransaction->title = 'buy vip';
            $userTransaction->status = 'success';
            $userTransaction->order_id = 'buy-vip-'.auth()->user()->id . '-' . rand(1000000, 2000000);
            $userTransaction->save();

            $advert = Advert::where('id', $vipArr[2])->first();
            $advert->vip_status = 1;
            $advert->save();
        }
    }

    public function getScore()
    {
        $score = 0;
        $transactions = UserTransaction::where('user_id', auth()->user()->id)->get();
        foreach ($transactions as $transaction) {
            if($transaction->type == 'addition' && $transaction->status == 'success'){
                $score = $score + $transaction->price;
            } elseif($transaction->status == 'success') {
                $score = $score - $transaction->price;
            }
        }

        return $score;
    }
}
