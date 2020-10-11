<?php


namespace App\DataObjects\Admin;


use App\Http\Requests\Admin\CreateUserFormRequest;
use Illuminate\Support\Str;

class CreateUser
{
    /** @var string */
    private $email;

    /** @var string */
    private $name;

    /** @var string */
    private $surname;

    /** @var string */
    private $password;

    private $role;

    private $referral_code;


    public function __construct(CreateUserFormRequest $request)
    {
        $this->name = $request->get('name');
        $this->surname = $request->has('surname')?$request->get('surname'):'';
        $this->password = $request->get('password');
        $this->email = $request->get('email');
        $this->role=$request->get('role');
        $this->referral_code=Str::random(16);
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
    public function getRole(): int
    {
        return $this->role;
    }
    public function getReferralCode(): string
    {
        return $this->referral_code;
    }

}
