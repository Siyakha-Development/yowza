@extends('layouts.master_dashboard_layout')
@section('main_content')

    <div class="flex items-center space-x-4 py-5 lg:py-6">
        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            Create Question
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


                <form action="{{ route('admin.questions.store', ['prefix' => 'admin']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group {{ $errors->has('question') ? 'has-error' : '' }}">
                        <label for="question">question*</label>
                        <textarea id="question" name="question" rows="5" class="form-control" required>
                    {{ old('question', isset($question) ? $question->question : '') }}
                </textarea>
                        @if($errors->has('question'))
                            <em class="invalid-feedback">
                                {{ $errors->first('question') }}
                            </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('question_image') ? 'has-error' : '' }}">
                        <label for="question_image">Question Image*</label>
                        <input type="file" id="question_image" name="question_image" class="form-control" />
                        @if($errors->has('question_image'))
                            <em class="invalid-feedback">
                                {{ $errors->first('question_image') }}
                            </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('score') ? 'has-error' : '' }}">
                        <label for="score">Score*</label>
                        <input type="number" id="score" name="score" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" value="{{ old('score', isset($question) ? $question->score : '') }}" required />
                        @if($errors->has('score'))
                            <em class="invalid-feedback">
                                {{ $errors->first('score') }}
                            </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('test') ? 'has-error' : '' }}">
                        <label for="test">Test*</label>
                        <select name="test[]" class="form-multiselect mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" id="test" multiple >
                            @foreach($tests as $id => $test)
                                <option value="{{ $id }}">{{ $test }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('test'))
                            <em class="invalid-feedback">
                                {{ $errors->first('test') }}
                            </em>
                        @endif
                    </div>

                    @for ($question=1; $question<=4; $question++)
                        <div class="card card-footer">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xs-12 col-12 form-group {{ $errors->has('option_text') ? 'has-error' : '' }}">
                                        <label for="option_text">Option Text*</label>
                                        <textarea id="option_text" name="{{ 'option_text_'. $question }}" rows="5" style="width: 100%;" class="form-control" required>
                                {{ old('question', isset($question) ? "" : null) }}
                            </textarea>
                                        @if($errors->has('option_text_'. $question))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('option_text_'. $question) }}
                                            </em>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 form-group">

                                        <label class="inline-flex items-center space-x-2">
                                        <input type="checkbox" class="form-checkbox is-basic size-5 rounded border-slate-400/70 checked:bg-slate-500 checked:border-slate-500 hover:border-slate-500 focus:border-slate-500 dark:border-navy-400 dark:checked:bg-navy-400" name="{{ 'correct_' . $question }}">
                                            <p for="option_text">Correct*</p>
                                        </label>
                                        <p class="help-block"></p>
                                        @if($errors->has('correct_' . $question))
                                            <p class="help-block">
                                                {{ $errors->first('correct_' . $question) }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor

                    <div>
                        <button class="btn btn-danger" type="submit" >Save</button>
                    </div>
                </form>                {{--                <form action="{{ route('admin.courses.store', ['prefix' => 'admin']) }}" method="POST" enctype="multipart/form-data" class="mt-4 space-y-4">--}}
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
