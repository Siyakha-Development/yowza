<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Models\CourseSecondary;
use Illuminate\Support\Str;


class CourseController extends Controller
{


    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        if (!Gate::allows('course_access')) {
            return abort(401);
        }

        $coursesPerPage = request('entries') ?: 10; // Default to 10 if not specified

        if (request('show_deleted') == 1) {
            if (!Gate::allows('course_delete')) {
                return abort(401);
            }
            $courses = Course::onlyTrashed()->ofTeacher()->paginate($coursesPerPage);
        } else {
            $courses = Course::ofTeacher()->paginate($coursesPerPage);
        }

        $secondary_courses = CourseSecondary::with('secondary_category')->paginate(10);

        return view('admin.courses.index', compact('courses', 'secondary_courses'));
    }


    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        if (!Gate::allows('course_create')) {
            return abort(401);
        }

        // Get users with role_id 2 (assuming role_id 2 is 'teacher')
        $teachers = User::whereHas('roles', function ($q) {
            $q->where('role_id', 1); // userid 2
        })->get()->pluck('name', 'id');

        return view('admin.courses.create', compact('teachers'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|integer',
            'course_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start_date' => 'nullable|date',
            'published' => 'nullable|boolean',
            'course_category' => 'required|in:Finance,Management,Marketing and Sales,Personal Growth,Customer Service,Funding,Entrepreneurship',
            'course_category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('course_image')) {
            $data['course_image'] = $request->file('course_image')->store('images/courses', 'public');
        }

        if ($request->hasFile('course_category_image')) {
            $data['course_category_image'] = $request->file('course_category_image')->store('images/course_categories', 'public');
            // $courseCategoryImagePath = $request->file('course_category_image')->store('images/course_categories', 'public');
            // $data['course_category_image'] = $courseCategoryImagePath;
        }

        $data['user_id'] = Auth::id(); // Assign the authenticated user's ID to the course
        $data['course_category'] = $request->input('course_category');

        $course = Course::create($data);

        return response()->json($course, 201);
    }

    

    public function show($id)
    {
        //
    }

    // public function edit($prefix, Course $course)
    // {
    //     $teachers = User::whereHas('role', function ($q) {
    //         $q->where('role_id', 1);
    //     })
    //         ->get()
    //         ->pluck('name', 'id');

    //     return view('admin.courses.edit', compact('course', 'teachers'));
    // }

    public function edit($prefix, Course $course)
    {
        $teachers = User::whereHas('roles', function ($q) {
            $q->where('role_id', 1); // userid 2
        })->get()->pluck('name', 'id');

        return view('admin.courses.edit', compact('course', 'teachers'));
    }


    public function update($prefix, Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|integer',
            'course_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'start_date' => 'nullable|date',
            'published' => 'nullable|boolean',
            'course_category' => 'required|in:Finance,Management,Marketing and Sales,Personal Growth,Customer Service,Funding,Entrepreneurship',
            'course_category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);

        $data = $request->all();

        if ($request->hasFile('course_image')) {
            // Delete the old image
            if ($course->course_image) {
                Storage::disk('public')->delete($course->course_image);
            }

            // Store the new image
            $data['course_image'] = $request->file('course_image')->store('images/courses', 'public');
        }

        if ($request->hasFile('course_category_image')) {
            // Delete the old image
            if ($course->course_category_image) {
                Storage::disk('public')->delete($course->course_category_image);
            }

            // Store the new image
            $courseCategoryImagePath = $request->file('course_category_image')->store('images/course_categories', 'public');
            $data['course_category_image'] = $courseCategoryImagePath;
        }

        $data['course_category'] = $request->input('course_category');

        // Update the course with the new data
        $course->update($data);

        // Sync teachers if the user is an admin
        $teachers = auth()->user()->isAdmin() ? array_filter((array) $request->input('teachers')) : [auth()->id()];
        $course->teachers()->sync($teachers);

        return redirect()->route('admin.courses.index', ['prefix' => 'admin']);
    }

    // public function update($prefix, Request $request, Course $course)
    // {
    //     $data = $request->all();

    //     if ($request->hasFile('course_image')) {
    //         // Delete the old image
    //         if ($course->course_image) {
    //             Storage::disk('public')->delete($course->course_image);
    //         }

    //         // Store the new image
    //         $data['course_image'] = $request->file('course_image')->store('images/courses', 'public');
    //     }

    //     // Update the course with the new data
    //     $course->update($data);

    //     // Sync teachers if the user is an admin
    //     $teachers = auth()->user()->isAdmin() ? array_filter((array) $request->input('teachers')) : [auth()->id()];
    //     $course->teachers()->sync($teachers);

    //     return redirect()->route('admin.courses.index', ['prefix' => 'admin']);
    // }

    public function destroy($prefix, Course $course)
    {
        if (!Gate::allows('course_delete')) {
            return abort(401);
        }

        $course->delete();

        return redirect()->route('admin.courses.index', $prefix);
    }

    public function restore($prefix, $id)
    {
        if (!Gate::allows('course_delete')) {
            return abort(401);
        }

        $course = Course::onlyTrashed()->findOrFail($id);
        $course->restore();

        return redirect()->route('admin.courses.index');
    }

    public function perma_del($prefix, $id)
    {
        if (!Gate::allows('course_delete')) {
            return abort(401);
        }

        $course = Course::onlyTrashed()->findOrFail($id);
        $course->forceDelete();

        return redirect()->route('admin.courses.index');
    }

}
