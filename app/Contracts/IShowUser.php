<?php


namespace App\Contracts;


use App\Models\User;

interface IShowUser
{
    public function getId();
    public function getEmail();
    public function getName();
}
