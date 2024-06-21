<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    // public const HOME = '/admin/dashboard';
    protected $namespace = 'App\Http\Controllers';

    public const ADMIN_DASHBOARD = '/admin/admin/dashboard';
    public const SMME_DASHBOARD = '/smme/admin/dashboard';
    public const DEVELOPMENT_DASHBOARD = '/development/admin/dashboard';
    public const CORPORATE_DASHBOARD = '/corporate/admin/dashboard';
    public const INDIVIDUAL_DASHBOARD = '/individual/admin/dashboard';

    /**
     * Redirect users after authentication based on their role.
     *
     * @return string
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

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {

        $this->configureRateLimiting();

        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }

    protected function mapAdminRoutes(): void
    {
        Route::middleware(['auth'])->prefix('admin')->group(function () {
            Route::group(['prefix' => '{prefix}'], function () {
                Route::get('download-lib/{id}', 'Admin\DocumentLibraryController@downloadFile')->name('admin.download-lib');
            });
        });
    }
}
