<?php


namespace App\Contracts;


interface IShowAdvert
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getType();

    /**
     * @return mixed
     */
    public function getName();
}
