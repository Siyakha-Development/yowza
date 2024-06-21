<?php

namespace App\Http\Middleware;

use App\Models\UserActivity;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use Jenssegers\Agent\Agent;

class TrackUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
//    public function handle(Request $request, Closure $next): Response
//    {
//        // Get user agent and IP address
//        $userAgent = $request->header('User-Agent');
//        $ipAddress = $request->ip();
//        $currentUrl = $request->fullUrl();
////        $currentUrl = parse_url(url()->current(), PHP_URL_PATH);
//
//
//        // Check if an entry with the same user agent and IP address already exists
//        $existingActivity = UserActivity::where('user_agent', $userAgent)
//            ->where('ip_address', $ipAddress)
//            ->where('url', $currentUrl)
//            ->first();
//
//        // If no existing entry found, save the user activity
//        if (!$existingActivity) {
//            $agent = new Agent();
//
//            $device = $agent->device();
//            $platform = $agent->platform();
//            $browser = $agent->browser();
//            $robot = $agent->isRobot();
//
//            // Save details to the database
//            UserActivity::create([
//                'device' => $device,
//                'platform' => $platform,
//                'browser' => $browser,
//                'robot' => $robot,
//                'ip_address' => $ipAddress,
//                'user_agent' => $userAgent,
//                'url' => $currentUrl,
//            ]);
//        }
//
//        return $next($request);
//    }

    public function handle(Request $request, Closure $next)
    {
        // Get user agent and IP address
        $userAgent = $request->header('User-Agent');
        $ipAddress = $request->ip();

        // Get the current URL
        $currentUrl = $request->url();

        // Check if an entry with the same user agent, IP address, and URL already exists
        $existingActivity = UserActivity::where('user_agent', $userAgent)
            ->where('ip_address', $ipAddress)
            ->where('url', $currentUrl)
            ->first();

        // If no existing entry found, save the user activity
        if (!$existingActivity) {
            $agent = new Agent();

            $device = $agent->device();
            $platform = $agent->platform();
            $browser = $agent->browser();
            $robot = $agent->isRobot();

            // Save details to the database
            UserActivity::create([
                'device' => $device,
                'platform' => $platform,
                'browser' => $browser,
                'robot' => $robot,
                'ip_address' => $ipAddress,
                'user_agent' => $userAgent,
                'url' => $currentUrl,
            ]);
        }

        return $next($request);
    }







}
