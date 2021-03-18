<?php

namespace App\Http\Controllers;

use App\Exceptions\EmailCodeValidException;
use App\Http\Requests\CheckEmailRequest;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Mail\TestMail;
use App\Models\Advert;
use App\Models\User;
use App\Services\DialogsService;
use App\Services\SubscribeService;
use App\Services\UserService;
use Cookie;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AjaxController extends Controller
{
    /**
     * @param CheckEmailRequest $request
     * @return JsonResponse
     */
    public function checkLoginEmail(CheckEmailRequest $request): JsonResponse
    {
        $user = User::where('email', "=", $request->email)->first();
        if ($user) {
            $data = [
                'status' => 'success',
                'email' => $request->email,
            ];
        } else {
            $data = [
                'status' => 'error',
                'message' => __('no user found'),
            ];
        }

        return response()->json($data);
    }

    /**
     * @param LoginFormRequest $request
     * @return JsonResponse
     */
    public function authUser(LoginFormRequest $request): JsonResponse
    {
        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember;
        Cookie::queue(Cookie::forget('remember'));
        setcookie('remember', $remember ? 1 : 0);

        if (Auth::attempt(['email' => $email, 'password' => $password, 'is_active' => 1], $remember)) {
            $data = [
                'status' => 'success',
            ];
        } else {
            $data = [
                'status' => 'error',
                'message' => __('wrong username or password, or not active account'),
            ];
        }
        return response()->json($data);
    }

    /**
     * @param RegisterFormRequest $request
     * @param UserService $userService
     * @param SubscribeService $subscribeService
     * @return JsonResponse
     * @throws EmailCodeValidException
     */
    public function registerUser(RegisterFormRequest $request, UserService $userService, SubscribeService $subscribeService): JsonResponse
    {
        $user = $userService->create($request->getDto());
        if($request->mailing){
            $subscribeService->setSubscribe($request->get('email'));
        }

        $userService->sendVerificationCode($user);

        $data = [
            'output' => 'Мы отправили ссылку для активации аккаунта на Вашу почту.',
        ];

        return response()->json($data);
    }

    /**
     * @param Advert $advert
     * @param DialogsService $service
     * @return JsonResponse
     */
    public function getLinkToDialog(Advert $advert, DialogsService $service): JsonResponse
    {
        return response()->json(['url'=>$service->getLinkToTheDialog($advert)]);
    }
}
