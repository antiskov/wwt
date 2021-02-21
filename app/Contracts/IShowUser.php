<?php


namespace App\Contracts;

interface IShowUser
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getEmail();

    /**
     * @return mixed
     */
    public function getName();
}
