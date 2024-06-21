@extends('layouts.master_dashboard_layout')

@section('main_content')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div
        class="flex flex-col items-center justify-between space-y-4 py-5 sm:flex-row sm:space-y-0 lg:py-6"
    >
        <div class="flex items-center space-x-1">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="size-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                />
            </svg>
            <h2
                class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50"
            >
                New Blog Category
            </h2>
        </div>

    </div>

    <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
        <div class="col-span-12 lg:col-span-10">
            <form action="{{url('/admin/admin/category/update',$category->id)}}" method="post"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="tabs flex flex-col">
                        <div class="is-scrollbar-hidden overflow-x-auto">
                        </div>
                        <div class="tab-content p-4 sm:p-5">
                            <div class="space-y-5">
                                <label class="block">
                                    <span>Name</span>
                                    <input
                                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('title') is-invalid @enderror"
                                        placeholder="Enter post title"
                                        type="text" name="name"
                                        value="{{$category->name}}"
                                    />
                                    @error('title')
                                    <span class="alert flex rounded-lg border border-error px-1 py-1 text-error sm:px-5">{{$message}}</span>
                                    @enderror
                                </label>
                                <label class="block">
                                    <span>Description</span>
                                    <input
                                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('title') is-invalid @enderror"
                                        placeholder="Enter post description"
                                        type="text" name="description"
                                        value="{{$category->description}}"
                                    />
                                    @error('description')
                                    <span class="alert flex rounded-lg border border-error px-1 py-1 text-error sm:px-5">{{$message}}</span>
                                    @enderror
                                </label>
                                <label
                                    class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                                >
                                    <input tabindex="-1" type="file" class="pointer-events-none absolute inset-0 h-full w-full opacity-0" name="category_image" value="{{ old('category_image') }}">
                                    <div class="flex items-center space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                        </svg>
                                        <span>Upload Image</span>
                                    </div>
                                </label>
                                <div class="form-group">
                                    @if($category->category_image)
                                        <img src="{{ asset('upload/category_images/' .$category->category_image) }}" alt="Current Image" style="max-width: 100px;">
                                    @else
                                        <p>No current image uploaded.</p>
                                    @endif
                                </div>
                                <div>
                                    <div>
                                        <div class="flex justify-center space-x-2">
                                            <button class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90" id="submit-button">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
