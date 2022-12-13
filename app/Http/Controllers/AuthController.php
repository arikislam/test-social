<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Auth;
use JetBrains\PhpStorm\NoReturn;

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
                'user_type' => UserType::CUSTOMER,
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

            return redirect()->route('keywords');
        }

        return redirect()->back()->with(['message' => 'Oppes! You have entered invalid credentials']);

    }
}