<?php


namespace App\DataObjects\Admin;


use App\Http\Requests\Admin\CreateUserFormRequest;

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

    /**
     * UserCreateDTO constructor.
     * @param string $phone
     * @param string $name
     * @param string $surname
     * @param string $password
     */
    public function __construct(CreateUserFormRequest $request)
    {
        $this->name = $request->get('name');
        $this->surname = $request->has('surname')?$request->get('surname'):'';
        $this->password = $request->get('password');
        $this->email = $request->get('email');
        $this->role=$request->get('role');
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

}
