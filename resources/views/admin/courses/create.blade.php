@extends('layouts.master_dashboard_layout')
@section('main_content')
<div class="flex items-center space-x-4 py-5 lg:py-6">
    <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
        Create Course
    </h2>
    <div class="hidden h-full py-1 sm:flex">
        <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
    </div>
    <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
        <li class="flex items-center space-x-2">
            <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent" href="#">All Courses</a>
            <svg x-ignore="" xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </li>
        <li>Help</li>
    </ul>
</div>

<div class="grid grid-cols-8 gap-4 sm:gap-5 lg:gap-6">
    <div class="col-span-12 sm:col-span-8">

        <div class="card p-4 sm:p-5">


            <form action="{{ url('/admin/admin/courses') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="course_category"><span>Course Category</span>
                        <select name="course_category" class="form-control form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" id="course_category">
                            <option value="Finance">Finance</option>
                            <option value="Management">Management</option>
                            <option value="Marketing and Sales">Marketing and Sales</option>
                            <option value="Personal Growth">Personal Growth</option>
                            <option value="Customer Service">Customer Service</option>
                            <option value="Funding">Funding</option>
                            <option value="Entrepreneurship">Entrepreneurship</option>
                        </select>
                    </label>
                </div>
                <br>
                <div class="form-group">
                    <div class="form-group">
                        <label class="block" for="course_category_image"><span>Course Category Image</span>
                            <input type="file" name="course_category_image" class="form-control-file" id="course_category_image" required>
                        </label>
                    </div>
                </div>
                <div>
                    <label class="block" for="title">
                        <span>Title:</span>
                        <input type="text" id="title" name="title" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" required>
                    </label>
                </div>
                <div>
                    <label class="block" for="slug">
                        <span>Slug:</span>
                        <input type="text" id="slug" name="slug" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent">
                    </label>
                </div>
                <div>
                    <label class="block" for="description">
                        <span> Description:</span>
                        <textarea id="description" name="description"></textarea>
                    </label>
                </div>
                <div>
                    <label class="block" for="price">
                        <span>Price:</span>
                        <input type="number" id="price" name="price" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent">
                    </label>
                </div>
                <br>
                <div>
                    <label class="bloack btn relative bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                        <input tabindex="-1" type="file" id="course_image" name="course_image" class="pointer-events-none absolute inset-0 h-full w-full opacity-0" />
                        <div class="flex items-center space-x-2">
                            <i class="fa-solid fa-cloud-arrow-up text-base"></i>
                            <span>Choose File</span>
                        </div>
                    </label>

                    {{-- <label for="course_image">Course Image:</label>--}}
                    {{-- <input type="file" id="course_image" name="course_image">--}}
                </div>
                <br>
                <div>
                    <label class="block" for="start_date">
                        <span>Start Date:</span>
                        <input type="date" id="start_date" name="start_date" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent">
                    </label>
                </div>
                <br>
                <div>
                    <label class="block" for="published">
                        <span>Published: </span>
                        <input type="checkbox" id="published" name="published" value="1" class="form-checkbox is-basic size-5 rounded border-slate-400/70 checked:bg-slate-500 checked:border-slate-500 hover:border-slate-500 focus:border-slate-500 dark:border-navy-400 dark:checked:bg-navy-400">
                    </label>
                </div>
                <div class="flex justify-end space-x-2">
                    <button class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90z" type="submit">Create Course</button>
                </div>

            </form>

            {{-- <form action="{{ route('admin.courses.store', ['prefix' => 'admin']) }}" method="POST"
            enctype="multipart/form-data" class="mt-4 space-y-4">--}}
            {{-- @csrf--}}

            {{-- <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">--}}
            {{-- <label for="title" class="block">--}}
            {{-- <span>Title*</span>--}}
            {{-- <input type="text" id="title" name="title"
                            class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            value="{{ old('title') }}" required>--}}
            {{-- @if($errors->has('title'))--}}
            {{-- <em class="invalid-feedback">--}}
            {{-- {{ $errors->first('title') }}--}}
            {{-- </em>--}}
            {{-- @endif--}}
            {{-- </label>--}}
            {{-- </div>--}}

            {{-- <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">--}}
            {{-- <label for="slug" class="block">--}}
            {{-- <span>Slug*</span>--}}
            {{-- <input type="text" id="slug" name="slug"
                            class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            value="{{ old('slug') }}" required>--}}
            {{-- @if($errors->has('slug'))--}}
            {{-- <em class="invalid-feedback">--}}
            {{-- {{ $errors->first('slug') }}--}}
            {{-- </em>--}}
            {{-- @endif--}}
            {{-- </label>--}}
            {{-- </div>--}}

            {{-- <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">--}}
            {{-- <label for="description" class="block">--}}
            {{-- <span>Description*</span>--}}
            {{-- <textarea id="description" name="description" rows="5"
                            class="form-textarea mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            required>{{ old('description') }}</textarea>--}}
            {{-- @if($errors->has('description'))--}}
            {{-- <em class="invalid-feedback">--}}
            {{-- {{ $errors->first('description') }}--}}
            {{-- </em>--}}
            {{-- @endif--}}
            {{-- </label>--}}
            {{-- </div>--}}

            {{-- <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">--}}
            {{-- <label for="price" class="block">--}}
            {{-- <span>Price*</span>--}}
            {{-- <input type="number" id="price" name="price"
                            class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            value="{{ old('price') }}" required>--}}
            {{-- @if($errors->has('price'))--}}
            {{-- <em class="invalid-feedback">--}}
            {{-- {{ $errors->first('price') }}--}}
            {{-- </em>--}}
            {{-- @endif--}}
            {{-- </label>--}}
            {{-- </div>--}}

            {{-- <div class="form-group {{ $errors->has('course_image') ? 'has-error' : '' }}">--}}
            {{-- <label for="course_image" class="block">--}}
            {{-- <span>Course Image*</span>--}}
            {{-- <input type="file" id="course_image" name="course_image"
                            class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            required>--}}
            {{-- @if($errors->has('course_image'))--}}
            {{-- <em class="invalid-feedback">--}}
            {{-- {{ $errors->first('course_image') }}--}}
            {{-- </em>--}}
            {{-- @endif--}}
            {{-- </label>--}}
            {{-- </div>--}}

            {{-- <div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">--}}
            {{-- <label for="start_date" class="block">--}}
            {{-- <span>Start Date*</span>--}}
            {{-- <input type="date" id="start_date" name="start_date"
                            class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            value="{{ old('start_date') }}" required>--}}
            {{-- @if($errors->has('start_date'))--}}
            {{-- <em class="invalid-feedback">--}}
            {{-- {{ $errors->first('start_date') }}--}}
            {{-- </em>--}}
            {{-- @endif--}}
            {{-- </label>--}}
            {{-- </div>--}}

            {{-- <div class="form-group {{ $errors->has('published') ? 'has-error' : '' }}">--}}
            {{-- <label for="published" class="block">--}}
            {{-- <span>Published*</span>--}}
            {{-- <select name="published"
                            class="form-select rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            id="published">--}}
            {{-- <option value="1" {{ old('published')==1 ? 'selected' : '' }}>Active</option>--}}
            {{-- <option value="0" {{ old('published')==0 ? 'selected' : '' }}>Inactive</option>--}}
            {{-- </select>--}}
            {{-- @if($errors->has('published'))--}}
            {{-- <em class="invalid-feedback">--}}
            {{-- {{ $errors->first('published') }}--}}
            {{-- </em>--}}
            {{-- @endif--}}
            {{-- </label>--}}
            {{-- </div>--}}

            {{-- <div class="flex justify-end space-x-2">--}}
            {{-- <button type="submit"
                        class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">--}}
            {{-- Save--}}
            {{-- </button>--}}
            {{-- </div>--}}
            {{-- </form>--}}

        </div>

    </div>


</div>

@endsection
