<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class D_adminLogInController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:d_admin', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.D_admin-login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6',
        ]);
            
        $credentials  = ['email' => $request->email, 'password' => $request->password];

        // Attempt to log the user in
        if (Auth::guard('d_admin')->attempt($credentials , $request->remember)) {
            // if successful, then redirect to their intended location

            return redirect()->intended(route('d_admin.dashboard'));
        }

        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('d_admin')->logout();
        return redirect('/');
    }
}