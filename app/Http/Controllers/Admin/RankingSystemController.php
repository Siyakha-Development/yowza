<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Point;
use App\Models\User;

class RankingSystemController extends Controller
{
    //

    public function index()
    {
        $pointsData = Point::selectRaw('action, SUM(points) as total_points')
            ->groupBy('action')
            ->get();

        $users = User::with('points')->get();
        $totalPoints = Point::sum('points');
        return view('ranks.index', compact('pointsData', 'users', 'totalPoints'));
    }
}
