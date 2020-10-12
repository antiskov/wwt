<?php


namespace App\Contracts;


interface ICreateUser
{
    public function getEmail();
    public function getReferralCode();
    public function getPassword();
}
