<?php

namespace App\Services;

use App\Models\Liqpay;
use App\Models\UserTransaction;
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
            'order_id' => Session::get('order_id'),
        ];

    }

    public function setPay(Request $request, $amount, $description = 'пополнение счета', $currency = 'USD')
    {
        $parameters = $this->getParameters();
        $order_id = auth()->user()->id.'-'.rand(10000,20000);
        Session::put('order_id', $order_id);
        $array = [
            "public_key" => $parameters['publicKey'],
            "version" => "3",
            "action" => "pay",
            "amount" => $amount,
            "currency" => $currency,
            "description" => $description,
            "order_id" => $order_id,
        ];

        $json = json_encode($array);
        $data = base64_encode($json);

        $sign_string = $parameters['privateKey'].$data.$parameters['privateKey'];
        $signature = base64_encode( sha1( $sign_string, true) );

        $payArr = [
            'data' => $data,
            'signature' => $signature,
            'url' => $parameters['url'],
        ];

        return $payArr;
    }

    public function setTransactionDB($amount = 2, $description = 'пополнение счета')
    {
        $userTransaction = new UserTransaction();
        $userTransaction->user_id = auth()->user()->id;
        $userTransaction->price = $amount;
        $userTransaction->title = $description;
        $userTransaction->status = 0;
        $userTransaction->order_id = Session::get('order_id');
        $userTransaction->save();
    }

    public function checkTransaction()
    {
        $transactions = UserTransaction::where('user_id', auth()->user()->id)->get();
        $parameters = $this->getParameters();
        foreach ($transactions as $transaction) {
            $liqpay = new Liqpay($parameters['publicKey'],$parameters['privateKey']);
            $res = $liqpay->api("request", array(
                'action'        => 'status',
                'version'       => '3',
                'order_id'      => $transaction->order_id,
            ));
            if ($res->status == 'success' and $transaction->status == 0){
                $transaction->status = 1;
                $transaction->save();
            }
        }
    }
}
