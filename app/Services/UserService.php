<?php


namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Contracts\IShowUser;
use App\DataObjects\Admin\CreateUser;
use App\Models\User;

class UserService
{
    public function getRole($user)
    {
        return $user->role->title;
    }
    public function getAllUsers()
    {
        return User::all();
    }
    public function create(CreateUser $request)
    {
        Log::info('in user service creation');
        $user = new User();
        $user->email = $request->getEmail();
        $user->name = $request->getName();
        $user->surname = $request->getSurname();
        $user->role_id = $request->getRole();
        $user->password = \Hash::make($request->getPassword());
        $user->referral_code=$request->getReferralCode();
        $user->is_active=$request->getActivity();
        if (!$user->save()) {
            Log::info('user not saved');
            return false;
        }

        return $user;
    }
    public function update($user, $request)
    {
        $user = User::find($request->getId());
        $user->name = $request->getName();
        $user->surname = $request->getSurname();
        /*$user->password = Hash::make($request->getPassword());*/

        if (!$user->save()) {
            return false;
        }

        return $user;
    }

}
