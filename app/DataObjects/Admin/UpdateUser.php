<?php


namespace App\DataObjects\Admin;


use App\Http\Requests\Admin\CreateUserFormRequest;
use App\Http\Requests\Admin\UpdateUserFormRequest;
use Illuminate\Support\Str;

class UpdateUser
{
    /** @var string */
    private $email;

    /** @var string */
    private $name;

    /** @var string */
    private $surname;

    /** @var string */


    private $role;

    private $is_active;




    public function __construct(UpdateUserFormRequest $request)
    {
        $this->name = $request->get('name');
        $this->surname = $request->has('surname')?$request->get('surname'):'';
        $this->email = $request->get('email');
        $this->role=$request->get('role');
        $this->is_active=$request->get('is_active');
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

    public function getRole(): int
    {
        return $this->role;
    }

    public function getIsActive() {
        return $this->is_active;
    }

}
