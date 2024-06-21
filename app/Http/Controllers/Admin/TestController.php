<?php

namespace App\Http\Controllers\Admin;

use App\Models\Test;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class TestController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\Foundation\Application
    {
        if (! Gate::allows('test_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('test_delete')) {
                return abort(401);
            }
            $tests = Test::onlyTrashed()->paginate(10);;
        } else {
            $tests = Test::paginate(10);
        }

        return view('admin.tests.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        if (! Gate::allows('test_create')) {
            return abort(401);
        }
        $courses = Course::ofTeacher()->get();
        $courses_ids = $courses->pluck('id');
        $courses = $courses->pluck('title', 'id')->prepend('Please select', '');
        $lessons = Lesson::whereIn('course_id', $courses_ids)->get()->pluck('title', 'id')->prepend('Please select', '');

        return view('admin.tests.create', compact('courses', 'lessons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (! Gate::allows('test_create')) {
            return abort(401);
        }
        Test::create($request->all());

        return redirect()->route('admin.tests.index', ['prefix' => 'admin']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(Test $test)
    {
        if (! Gate::allows('test_edit')) {
            return abort(401);
        }
        $courses = Course::ofTeacher()->get();
        $courses_ids = $courses->pluck('id');
        $courses = $courses->pluck('title', 'id')->prepend('Please select', '');
        $lessons = Lesson::whereIn('course_id', $courses_ids)->get()->pluck('title', 'id')->prepend('Please select', '');

        return view('admin.tests.edit', compact('test', 'courses', 'lessons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,Test $test)
    {
        if (! Gate::allows('test_edit')) {
            return abort(401);
        }
        $test->update($request->all());

        return redirect()->route('admin.tests.index', ['prefix' => 'admin']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Test $test)
    {
        if (! Gate::allows('test_delete')) {
            return abort(401);
        }
        $test->delete();

        return redirect()->route('admin.tests.index');
    }

    /**
     * Restore Test from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        if (! Gate::allows('test_delete')) {
            return abort(401);
        }
        $test = Test::onlyTrashed()->findOrFail($id);
        $test->restore();

        return redirect()->route('admin.tests.index');
    }

    /**
     * Permanently delete Test from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function perma_del($id)
    {
        if (! Gate::allows('test_delete')) {
            return abort(401);
        }
        $test = Test::onlyTrashed()->findOrFail($id);
        $test->forceDelete();

        return redirect()->route('admin.tests.index');
    }
}
