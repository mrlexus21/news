<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo()
    {
        if (Auth::user()?->hasAnyRole(['Admin', 'Chief-editor', 'Editor'])) {
            $routeName = route('admin.dashboard');
        } else {
            $routeName = route('personal.index');
        }

        return $routeName;
    }

    public function authenticated(Request $request, $user)
    {
        if ($user->status !== User::STATUS_ACTIVE) {
            $this->guard()->logout();
            return back()->with('warning', __('auth.You need to confirm your account. Please check your email.'));
        }
        return redirect()->intended($this->redirectPath());
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
