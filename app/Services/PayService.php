<?php

namespace App\Services;

use App\Domain\Liqpay;
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

    public function setPay(Request $request, $amount, $description = 'пополнение счета', $currency = 'USD')
    {
        $parameters = $this->getParameters();
        $order_id = auth()->user()->id . '-' . rand(1000000, 2000000);
        $array = [
            "public_key" => $parameters['publicKey'],
            "version" => "3",
            "action" => "pay",
            "amount" => $amount,
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
        ];

        return $payArr;
    }

    public function setTransactionDB($order_id, $amount = 2, $description = 'пополнение счета')
    {
        $userTransaction = new UserTransaction();
        $userTransaction->type = 'addition';
        $userTransaction->user_id = auth()->user()->id;
        $userTransaction->price = $amount;
        $userTransaction->title = $description;
        $userTransaction->status = 'none';
        $userTransaction->order_id = $order_id;
        $userTransaction->save();
    }

    public function checkTransaction()
    {
        if ($transaction = UserTransaction::where('user_id', auth()->user()->id)->latest()->first()) {
            $parameters = $this->getParameters();

            $liqpay = new Liqpay($parameters['publicKey'], $parameters['privateKey']);
            $res = $liqpay->api("request", array(
                'action' => 'status',
                'version' => '3',
                'order_id' => $transaction->order_id,
            ));
//            dd($transaction->status);
            $transaction->status = $res->status;
            $transaction->save();
        }
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
            \Log::info([$callbackPar['order_id'], $callbackPar['status']]);
        } else {
            \Log::info('incorrect signature');
        }
    }

    public function getCheckStatusPay($order_id)
    {
        $transaction = UserTransaction::where('order_id', $order_id)->first();
        $parameters = $this->getParameters();

        $liqpay = new Liqpay($parameters['publicKey'], $parameters['privateKey']);
        $res = $liqpay->api("request", array(
            'action' => 'status',
            'version' => '3',
            'order_id' => $transaction->order_id,
        ));

        $transaction->status = $res->status;
        $transaction->save();

        return $transaction->status;
    }

    public function getScore()
    {
        $score = 0;
        $transactions = UserTransaction::where('user_id', auth()->user()->id)->get();
        foreach ($transactions as $transaction) {
            if($transaction->type == 'addition'){
                $score = $score + $transaction->price;
            } else {
                $score = $score - $transaction->price;
            }
        }

        return $score;
    }
}
