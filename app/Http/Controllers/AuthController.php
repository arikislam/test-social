<?php

namespace App\Http\Controllers;

use App\Enums\FlashMessageEnum;
use App\Enums\UserTypeEnum;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param \App\Http\Requests\RegistrationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(RegistrationRequest $request)
    {
        $data = $request->only('name', 'email', 'password');
        try {
            User::create([
                'name'      => $data['name'],
                'email'     => $data['email'],
                'password'  => $data['password'],
                'user_type' => UserTypeEnum::CUSTOMER,
            ]);

            return redirect()->to('/login');
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->back()->with(['message' => 'Something went wrong']);

        }
    }


    public function login()
    {

        return view('auth.login');
    }


    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            session()->flash(FlashMessageEnum::SUCCESS->value, 'Login Successful');
            return redirect()->route('keywords.index');
        }
        session()->flash(FlashMessageEnum::ERROR->value, 'Cannot login');
        return redirect()->back();

    }
}