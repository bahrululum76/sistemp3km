<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('nidn', 'password');

        try {
            $this->validate($request, [
                'nidn' => 'required',
                'password' => 'required'
            ]);

            if (Auth::attempt($credentials)) {
                if (Auth::user()->roles_id == 1) {
                    return redirect()->route('admin_home');
                } else if (Auth::user()->roles_id == 2) {
                    return redirect()->route('lppm_home');
                    //return "LPPM";
                } else if (Auth::user()->roles_id == 3) {
                    return redirect()->route('dosen_home');
                    //return "Dosen";
                } else if (Auth::user()->roles_id == 4) {
                    return redirect()->route('reviewer_home');
                    //return "Reviewer";
                } else {
                    return redirect()->route('/')
                        ->with(['error' => 'Username atau Password salah !']);
                }
            } else {
                return redirect('/')
                    ->with(['error' => 'Username atau Password salah !']);
            }
        } catch (Exception) {
            return redirect()->route('login')
                ->with(['error' => 'Username atau Password salah !']);
        }
    }
}
