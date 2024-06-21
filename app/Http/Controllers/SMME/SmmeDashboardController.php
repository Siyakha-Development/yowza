<?php

namespace App\Http\Controllers\SMME;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Organization;
use Illuminate\Http\Request;

class SmmeDashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        $user = auth()->user();

        // Retrieve up to 3 workspaces where the user is the owner or has joined

        $purchased_courses = [];
        if (auth()->check()) {
            $purchased_courses = Course::whereHas('students', function($query) {
                $query->where('users.id', auth()->id());
            })
                ->with('lessons')
                ->orderBy('id', 'desc')
                ->get();
        }
        $workspaces = $user->organizations()->take(3)->get();
        $courses = Course::paginate(10);

        return view('smme.index', compact('workspaces', 'courses'));
    }


}
