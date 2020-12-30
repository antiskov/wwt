<?php

namespace App\Domain;

use App\Models\UserTransaction;
use App\Services\PayService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransactionCreator
{
    protected $userTransaction;

    public function additionCost(int $cost, string $order_id, $type = 'addition', $title = 'addition cost', string $status = 'none')
    {
        $this->userTransaction = new UserTransaction();
        $this->userTransaction->type = $type;
        $this->userTransaction->user_id = auth()->user()->id;
        $this->userTransaction->price = $cost;
        $this->userTransaction->title = $title;
        $this->userTransaction->status = $status;
        $this->userTransaction->order_id = $order_id;

        if (!$this->userTransaction->save()) {
            Log::info("Transaction #$this->userTransaction->id not saved");
        }
    }

    public function getOrderId()
    {
        return $this->userTransaction->order_id;
    }
}
