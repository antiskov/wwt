<?php


namespace App\DataObjects\Admin;


use App\Contracts\IShowAdvert;
use App\Models\Advert;

class ShowShortAdvert implements IShowAdvert
{
    private $id;
    private $name;
    private $type;
    private $title;
    private $price;
    private $status;

    public function __construct(Advert $advert)
    {
        $this->id = $advert->id;
        $this->name = $advert->name . ' ' . $advert->surname;
        $this->type = $advert->type;
        $this->title = $advert->title;
        $this->price = $advert->price . " " . $advert->currency;
        $this->status = $advert->status;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getStatus(): string
    {
        return $this->status;
    }


}
