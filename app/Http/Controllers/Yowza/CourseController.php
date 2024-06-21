<?php

namespace App\Http\Controllers\Yowza;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Services\PointService;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    protected $pointService;

    public function __construct(PointService $pointService)
    {
        $this->pointService = $pointService;
    }
    //
    public function index()
    {

        $courses = Course::where('published', 1)->latest()->get();
        $purchased_courses = [];
        if (auth()->check()) {
            $purchased_courses = Course::whereHas('students', function ($query) {
                $query->where('users.id', auth()->id());
            })
                ->with('lessons')
                ->orderBy('id', 'desc')
                ->get();
        }

        return view('yowzacampus.courses.index', compact('courses', 'purchased_courses'));
    }

    public function show($course_slug)
    {
        $course = Course::where('slug', $course_slug)->with('publishedLessons')->firstOrFail();
        $courses = Course::paginate(5);
        $purchased_course = auth()->check() && $course->students()->where('user_id', auth()->id())->count() > 0;

        return view('yowzacampus.courses.show', compact('course', 'courses', 'purchased_course'));
    }

    public function payment(Request $request)
    {
        $course = Course::findOrFail($request->get('course_id'));

        $course->students()->attach(auth()->id());

        $user = Auth::user();
        $this->pointService->awardPoints($user, 10, 'Enrolled Course'); // Example: Awarding 10 points for purchasing a course

        return redirect()->route('lessons.show', [$course->id, $request->lesson_id]);
    }

    public function rating($course_id, Request $request)
    {
        $course = Course::findOrFail($course_id);
        $course->students()->updateExistingPivot(auth()->id(), ['rating' => $request->get('rating')]);

        return redirect()->back()->with('success', 'Thank you for rating.');
    }
}
