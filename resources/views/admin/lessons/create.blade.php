@extends('layouts.master_dashboard_layout')
@section('main_content')
    <div class="flex items-center space-x-4 py-5 lg:py-6">
        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            Create Lesson
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


                <form action="{{ url('/admin/admin/lessons') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="course_id">Course*</label>
                        <select name="course_id" class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" id="course_id" >
                            @foreach($courses as $id => $course)
                                <option value="{{ $id }}">{{ $course }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('course_id'))
                            <em class="invalid-feedback">
                                {{ $errors->first('course_id') }}
                            </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title">title*</label>
                        <input type="text" id="title" name="title" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" value="{{ old('title', isset($lesson) ? $lesson->title : '') }}" required>
                        @if($errors->has('title'))
                            <em class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                        <label for="slug">Slug*</label>
                        <input type="text" id="slug" name="slug" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" value="{{ old('slug', isset($lesson) ? $lesson->slug : '') }}" required>
                        @if($errors->has('slug'))
                            <em class="invalid-feedback">
                                {{ $errors->first('slug') }}
                            </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                        <label for="full_text">Full Text*</label>
                        <textarea id="desccription" name="full_text" rows="5" class="form-control" value="{{ old('full_text', isset($lesson) ? $lesson->full_text : '') }}" required>
                </textarea>
                        @if($errors->has('full_text'))
                            <em class="invalid-feedback">
                                {{ $errors->first('full_text') }}
                            </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('short_text') ? 'has-error' : '' }}">
                        <label for="short_text">short Text*</label>
                        <textarea id="desccription" name="short_text" rows="5" class="form-control" value="{{ old('short_text', isset($lesson) ? $lesson->short_text : '') }}" required>
                </textarea>
                        @if($errors->has('short_text'))
                            <em class="invalid-feedback">
                                {{ $errors->first('short_text') }}
                            </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('embed_id') ? 'has-error' : '' }}">
                        <label for="embed_id">Youtube URL*</label>
                        <input type="text" id="embed_id" name="embed_id" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" value="{{ old('embed_id', isset($lesson) ? $lesson->embed_id : '') }}" required />
                        @if($errors->has('embed_id'))
                            <em class="invalid-feedback">
                                {{ $errors->first('embed_id') }}
                            </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('free_lesson') ? 'has-error' : '' }}">
                        <label for="free_lesson">Free Lesson*</label>
                        <select name="free_lesson" class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" id="free_lesson">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                        @if($errors->has('free_lesson'))
                            <em class="invalid-feedback">
                                {{ $errors->first('free_lesson') }}
                            </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('published') ? 'has-error' : '' }}">
                        <label for="published">Published*</label>
                        <select name="published" class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" id="published">
                            <option value="1">Active</option>
                            <option value="0">In Active</option>
                        </select>
                        @if($errors->has('published'))
                            <em class="invalid-feedback">
                                {{ $errors->first('published') }}
                            </em>
                        @endif
                    </div>
                    <br>
                    <div class="flex justify-end space-x-2">
                        <button class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90z" type="submit">Create Lesson</button>
                    </div>

                </form>

  

            </div>

        </div>


    </div>

@endsection
