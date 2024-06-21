<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Point;

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

    //  $redirect_url = '';

    //  $user_roles = auth()->user()->roles()->pluck('name')->toArray();

    //  if($user_roles->name === 'SMME')
    //  {
    //     $redirect_url = 'smme/admin/dashboard2';
    //  }
    //  elseif($user_roles->name === 'Administrator (can create other users)')
    //  {
    //     $redirect_url = 'smme/admin/dashboard2';
    //  }
    // protected $redirectTo = $redirect_url;

    protected function redirectTo()
    {
        $user_roles = auth()->user()->roles()->pluck('name')->toArray();

        if (in_array('SMME', $user_roles)) {
            return 'smme/admin/dashboard';
        } elseif (in_array('Administrator (can create other users)', $user_roles)) {
            return 'admin/admin/dashboard';
        } elseif (in_array('Development Partners', $user_roles)) {
            return 'development/admin/dashboard';
        } elseif (in_array('Corporate Sponsors', $user_roles)) {
            return 'corporate/admin/dashboard';
        } elseif (in_array('Individual', $user_roles)) {
            return 'individual/admin/dashboard';
        } else {
            return '/home'; // Default redirect path
        }
    }

    protected function authenticated(Request $request, $user)
    {
        $user->update(['last_login_at' => now()]);

        // Award points if not already awarded today
        if (!$user->points()->whereDate('created_at', today())->exists()) {
            $user->points()->create([
                'points' => 1,
                'action' => 'daily_login',
            ]);
        }
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
