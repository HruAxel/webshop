<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    function register(RegisterRequest $request)
    {
        $validate = $request->validated();

        User::create($validate);

        return redirect()->route('login')->with('success', __('Sikeres regisztráció, mostmár bejelentkezhetsz!'));
    }

    function loginProcess(Request $request)
    {
        $loginresult = Auth::attempt(['email' => $request->email, 'password' => $request->password], $request);

        if ($loginresult) {
            return redirect()->route('homepage')->with('success', __('Sikeresen beléptél!'));
        } else {
            return redirect()->back()->with('error', __('A belépés sikertelen, helytelen adatok!'));
        }
    }


}
