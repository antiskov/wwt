<?php


namespace App\DataObjects\Admin;


use App\Contracts\IShowUser;
use App\Models\User;

class ShowShortUser implements IShowUser
{
    private $id;
    private $email;
    private $name;
    private $role;
    private $is_active;
    public function __construct(User $user)
    {
        $this->id=$user->id;
        $this->email=$user->email;
        $this->name=$user->name.' '.$user->surname;
        $this->role=$user->role;
        $this->is_active=$user->is_active;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getActivity(): bool
    {
        return $this->is_active;
    }
    public function getRole(): string
    {
        return $this->role;
    }

}
