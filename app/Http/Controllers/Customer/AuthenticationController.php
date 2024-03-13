<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthenticationController extends Controller
{
    public function authenticate(Request $request)
    {
        if(Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 2]))
        {
            $request->session()->regenerate();

            return redirect()->intended('customer/dashboard');
        }

        return back();
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('customer-login');
    }
}
