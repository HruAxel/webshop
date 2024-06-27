<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\BillingData;

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

    function generalDataSave(Request $request) {
        $user = Auth::user();

        $user->name = $request->get('name');

        $user->email = $request->get('email');

        $user->mobil = $request->get('mobil');
    
        $user->save();

        return redirect()->back()->with('success', "Jeee");
    }

    function changePasswordSave(Request $request)
    {

        $this->validate($request, [
            'current_password' => 'required|string',
            'new_password' => 'required|confirmed|min:4|string'
        ]);
        $auth = Auth::user();

        // The passwords matches
        if (!Hash::check($request->get('current_password'), $auth->password)) {
            return back()->with('error', "Hiba");
        }

        // Current password and new password same
        if (strcmp($request->get('current_password'), $request->new_password) == 0) {
            return redirect()->back()->with("error", "A régi és az új jelszó nem egyezhet!");
        }

        $user =  User::find($auth->id);
        $user->password = $request->new_password;
        $user->save();
        return back()->with('success', "A jelszavad megváltozott!");
    }

    function changeBillingData(Request $request)
{

    $user = Auth::user();

    $data = $request->only(['zip', 'city', 'address', 'floor', 'doorbell']);
    $filteredData = array_filter($data, fn($value) => !is_null($value) && $value !== '');

    $user = Auth::user();
    $billingData = $user->billingData;

    if ($billingData) {
        $billingData->update($filteredData);
    } else {
        $billingData = new BillingData($filteredData);
        $billingData->user()->associate($user);
        $billingData->save();
    }
    
    return redirect()->back()->with('success', "Sikeres adatmódosítás!");
}


}
