<?php


namespace App\Services;


use App\Models\Messages;

class MessagesService
{
    public $count;

    public function __construct()
    {
        $this->count = Messages::where('respondent_id', \auth()->user()->id)
            ->where('is_readed', 0)
            ->count();
    }

    public function getResult()
    {
        return $this->count;
    }
}
