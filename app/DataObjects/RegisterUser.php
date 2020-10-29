<?php


namespace App\DataObjects;


use App\Contracts\ICreateUser;
use App\Http\Requests\RegisterFormRequest;
use Illuminate\Support\Str;

class RegisterUser implements ICreateUser
{
    /** @var string */
    private $email;

    /** @var string */
    private $name;

    /** @var string */
    private $surname;

    /** @var string */
    private $password;

    /**
     * @var int
     */
    private $role;

    /**
     * @var string
     */
    private $referral_code;

    /**
     * @var int
     */
    private $is_active;


    /**
     * RegisterUser constructor.
     * @param RegisterFormRequest $request
     */
    public function __construct(RegisterFormRequest $request)
    {
        $this->name = $request->has('name')?$request->get('name'):'';
        $this->surname = $request->has('surname')?$request->get('surname'):'';
        $this->password = $request->get('password');
        $this->email = $request->get('email');
        $this->role=1;
        $this->referral_code=Str::random(16);
        $this->is_active=0;
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

    /**
     * @return int
     */
    public function getRole(): int
    {
        return $this->role;
    }

    /**
     * @return string
     */
    public function getReferralCode(): string
    {
        return $this->referral_code;
    }

    /**
     * @return int
     */
    public function getActivity(): int
    {
        return $this->is_active;
    }
}
