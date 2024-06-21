<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    // protected $redirectTo = '/dashboard';
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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
