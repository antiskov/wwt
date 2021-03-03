<?php


namespace App\Contracts;


interface ICreateUser
{
    /**
     * @return mixed
     */
    public function getEmail();

    /**
     * @return mixed
     */
    public function getReferralCode();

    /**
     * @return mixed
     */
    public function getPassword();

}
