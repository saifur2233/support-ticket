<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class RegistrationController extends Controller
{
    public function registration()
    {
        return view('customer.registration');
    }

    public function registrationStore(Request $request)
    {
        $user = new User();

        $user->name = $request->name;

        $user->email = $request->email;

        $user->password = Hash::make($request->password);

        $user->user_type = 2;

        $user->save();

        return redirect()->route('customer-registration');
    }
}
