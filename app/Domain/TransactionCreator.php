<?php

namespace App\Domain;

use App\Models\UserTransaction;
use App\Services\PayService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransactionCreator
{
    protected $userTransaction;

    /**
     * @param int $cost
     * @param string $order_id
     * @param string $type
     * @param string $title
     * @param string $status
     */
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

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->userTransaction->order_id;
    }

    public function additionCostUser(int $user_id, int $cost, string $order_id, $type = 'addition', $title = 'addition cost', string $status = 'none')
    {
        $this->userTransaction = new UserTransaction();
        $this->userTransaction->type = $type;
        $this->userTransaction->user_id = $user_id;
        $this->userTransaction->price = $cost;
        $this->userTransaction->title = $title;
        $this->userTransaction->status = $status;
        $this->userTransaction->order_id = $order_id;

        if (!$this->userTransaction->save()) {
            Log::info("Transaction #$this->userTransaction->id not saved");
        }
    }
}
