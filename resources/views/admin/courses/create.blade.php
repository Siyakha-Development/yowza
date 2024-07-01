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


            <form action="{{ route('admin.courses.store', ['prefix' => 'admin'])}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="course_category"><span>Course Category</span>
                        <select name="course_category" class="form-control form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" id="course_category">
                            <option value="">Select a category</option>
                            @foreach(['Finance', 'Management', 'Marketing and Sales', 'Personal Growth', 'Customer Service', 'Funding', 'Entrepreneurship'] as $category)
                            <option value="{{ $category }}" {{ old('course_category') == $category? 'selected' : '' }}>{{ $category }}</option>
                            @endforeach
                        </select>
                        @error('course_category')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
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



        </div>

    </div>


</div>

@endsection
