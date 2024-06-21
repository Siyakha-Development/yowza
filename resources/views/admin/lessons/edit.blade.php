@extends('layouts.master_dashboard_layout')
@section('main_content')
    <div class="flex items-center space-x-4 py-5 lg:py-6">
        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            Edit Lesson
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


                <form action="{{ url('/admin/admin/lessons', $lesson->id ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="course_id">Course*</label>
                        <select name="course_id" class="form-control" id="teacher" >
                            @foreach($courses as $id => $courseName)
                                <option {{ $id == $lesson->course_id ? "selected" : null }} value="{{ $id }}">{{ $courseName }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('title'))
                            <em class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="title">title*</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($lesson) ? $lesson->title : '') }}" required>
                        @if($errors->has('title'))
                            <em class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                        <label for="slug">Slug*</label>
                        <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', isset($lesson) ? $lesson->slug : '') }}" required>
                        @if($errors->has('slug'))
                            <em class="invalid-feedback">
                                {{ $errors->first('slug') }}
                            </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                        <label for="full_text">Full Text*</label>
                        <textarea id="desccription" name="full_text" rows="5" class="form-control" required>
                    {{ old('full_text', isset($lesson) ? $lesson->full_text : '') }}
                </textarea>
                        @if($errors->has('slug'))
                            <em class="invalid-feedback">
                                {{ $errors->first('slug') }}
                            </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                        <label for="short_text">short Text*</label>
                        <textarea id="desccription" name="short_text" rows="5" class="form-control" required>
                    {{ old('short_text', isset($lesson) ? $lesson->short_text : '') }}
                </textarea>
                        @if($errors->has('slug'))
                            <em class="invalid-feedback">
                                {{ $errors->first('slug') }}
                            </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                        <label for="embed_id">Youtube URL*</label>
                        <input type="text" id="embed_id" name="embed_id" class="form-control" value="{{ old('embed_id', isset($lesson) ? $lesson->embed_id : '') }}" required />
                        @if($errors->has('slug'))
                            <em class="invalid-feedback">
                                {{ $errors->first('slug') }}
                            </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                        <label for="free_lesson">Free Lesson*</label>
                        <select name="free_lesson" class="form-control" id="free_lesson">
                            <option {{ $lesson->free_lesson == 1 ? 'selected' : null }} value="1">Yes</option>
                            <option {{ $lesson->free_lesson == 0 ? 'selected' : null }} value="0">No</option>
                        </select>
                        @if($errors->has('slug'))
                            <em class="invalid-feedback">
                                {{ $errors->first('slug') }}
                            </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                        <label for="published">Published*</label>
                        <select name="published" class="form-control" id="published">
                            <option {{ $lesson->published == 1 ? 'selected' : null }} value="1">Active</option>
                            <option {{ $lesson->published == 0 ? 'selected' : null }} value="0">In Active</option>
                        </select>
                        @if($errors->has('slug'))
                            <em class="invalid-feedback">
                                {{ $errors->first('slug') }}
                            </em>
                        @endif
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90z" type="submit">Update Lesson</button>
                    </div>

                </form>

                {{--                <form action="{{ route('admin.courses.store', ['prefix' => 'admin']) }}" method="POST" enctype="multipart/form-data" class="mt-4 space-y-4">--}}
                {{--                    @csrf--}}

                {{--                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">--}}
                {{--                        <label for="title" class="block">--}}
                {{--                            <span>Title*</span>--}}
                {{--                            <input type="text" id="title" name="title" class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" value="{{ old('title') }}" required>--}}
                {{--                            @if($errors->has('title'))--}}
                {{--                                <em class="invalid-feedback">--}}
                {{--                                    {{ $errors->first('title') }}--}}
                {{--                                </em>--}}
                {{--                            @endif--}}
                {{--                        </label>--}}
                {{--                    </div>--}}

                {{--                    <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">--}}
                {{--                        <label for="slug" class="block">--}}
                {{--                            <span>Slug*</span>--}}
                {{--                            <input type="text" id="slug" name="slug" class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" value="{{ old('slug') }}" required>--}}
                {{--                            @if($errors->has('slug'))--}}
                {{--                                <em class="invalid-feedback">--}}
                {{--                                    {{ $errors->first('slug') }}--}}
                {{--                                </em>--}}
                {{--                            @endif--}}
                {{--                        </label>--}}
                {{--                    </div>--}}

                {{--                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">--}}
                {{--                        <label for="description" class="block">--}}
                {{--                            <span>Description*</span>--}}
                {{--                            <textarea id="description" name="description" rows="5" class="form-textarea mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" required>{{ old('description') }}</textarea>--}}
                {{--                            @if($errors->has('description'))--}}
                {{--                                <em class="invalid-feedback">--}}
                {{--                                    {{ $errors->first('description') }}--}}
                {{--                                </em>--}}
                {{--                            @endif--}}
                {{--                        </label>--}}
                {{--                    </div>--}}

                {{--                    <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">--}}
                {{--                        <label for="price" class="block">--}}
                {{--                            <span>Price*</span>--}}
                {{--                            <input type="number" id="price" name="price" class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" value="{{ old('price') }}" required>--}}
                {{--                            @if($errors->has('price'))--}}
                {{--                                <em class="invalid-feedback">--}}
                {{--                                    {{ $errors->first('price') }}--}}
                {{--                                </em>--}}
                {{--                            @endif--}}
                {{--                        </label>--}}
                {{--                    </div>--}}

                {{--                    <div class="form-group {{ $errors->has('course_image') ? 'has-error' : '' }}">--}}
                {{--                        <label for="course_image" class="block">--}}
                {{--                            <span>Course Image*</span>--}}
                {{--                            <input type="file" id="course_image" name="course_image" class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" required>--}}
                {{--                            @if($errors->has('course_image'))--}}
                {{--                                <em class="invalid-feedback">--}}
                {{--                                    {{ $errors->first('course_image') }}--}}
                {{--                                </em>--}}
                {{--                            @endif--}}
                {{--                        </label>--}}
                {{--                    </div>--}}

                {{--                    <div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">--}}
                {{--                        <label for="start_date" class="block">--}}
                {{--                            <span>Start Date*</span>--}}
                {{--                            <input type="date" id="start_date" name="start_date" class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" value="{{ old('start_date') }}" required>--}}
                {{--                            @if($errors->has('start_date'))--}}
                {{--                                <em class="invalid-feedback">--}}
                {{--                                    {{ $errors->first('start_date') }}--}}
                {{--                                </em>--}}
                {{--                            @endif--}}
                {{--                        </label>--}}
                {{--                    </div>--}}

                {{--                    <div class="form-group {{ $errors->has('published') ? 'has-error' : '' }}">--}}
                {{--                        <label for="published" class="block">--}}
                {{--                            <span>Published*</span>--}}
                {{--                            <select name="published" class="form-select rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" id="published">--}}
                {{--                                <option value="1" {{ old('published') == 1 ? 'selected' : '' }}>Active</option>--}}
                {{--                                <option value="0" {{ old('published') == 0 ? 'selected' : '' }}>Inactive</option>--}}
                {{--                            </select>--}}
                {{--                            @if($errors->has('published'))--}}
                {{--                                <em class="invalid-feedback">--}}
                {{--                                    {{ $errors->first('published') }}--}}
                {{--                                </em>--}}
                {{--                            @endif--}}
                {{--                        </label>--}}
                {{--                    </div>--}}

                {{--                    <div class="flex justify-end space-x-2">--}}
                {{--                        <button type="submit" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">--}}
                {{--                            Save--}}
                {{--                        </button>--}}
                {{--                    </div>--}}
                {{--                </form>--}}

            </div>

        </div>


    </div>

@endsection
