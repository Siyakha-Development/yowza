<?php

namespace App\Http\Controllers\Yowza;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $purchased_courses = [];
        if (auth()->check()) {
            $purchased_courses = Course::whereHas('students', function($query) {
                $query->where('users.id', auth()->id());
            })
                ->with('lessons')
                ->orderBy('id', 'desc')
                ->get();
        }

        $courses =  Course::where('published', 1)->latest()->get();

        return view('yowzacampus.index', compact('courses','purchased_courses'));
    }
}
