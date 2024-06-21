<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
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
}
