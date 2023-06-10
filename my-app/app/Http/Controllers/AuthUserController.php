<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;

class AuthUserController extends Controller
{
    //
    use HttpResponse;

    //Registrate
    public function store(StoreUserRequest $request)
    {

        $request->validated();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('API TOKEN' . $user->name);


        return $this->response([
            'user' => $user,
            //plaintext itt kell majd
            'token' => $token->plainTextToken,
        ], 'User Created');

    }

    public function login(LoginUserRequest $request)
    {

        $request->validated();

        //user check->with Auth facade
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return $this->response('', 'Bad Credentials User not Logged in', 401);
        }

        $user = User::where('email', $request->email)->first();

        //logged in
        return $this->response([
            'user' => $user,
            'token' => $user->createToken('API login Token' . $user->name)->plainTextToken
        ], 'User Logged in');
    }

    public function logout()
    {

        $user = Auth::user();

        if (!$user) {
            return $this->response('', 'User not found', 404);
        }

        $accessToken = $user->currentAccessToken();

        if (!$accessToken) {
            return $this->response('', 'Access Token not found', 404);
        }

        $accessToken->delete();

        return $this->response('', 'User Logged Out');

    }

}