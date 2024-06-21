@extends('layouts.master_dashboard_layout')
@section('main_content')

<div class="flex flex-col items-center justify-between space-y-4 py-5 sm:flex-row sm:space-y-0 lg:py-6">
    <div class="flex items-center space-x-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
            </path>
        </svg>
        <h2 class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50">
            New Post
        </h2>
    </div>
    <div class="flex justify-center space-x-2">

        <button
            class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
            Join Other Workspace
        </button>
    </div>
</div>

<div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
    <div class="col-span-12 lg:col-span-8">
        <div class="card">
            <div class="tabs flex flex-col">
                <div class="is-scrollbar-hidden overflow-x-auto">
                    <div class="border-b-2 border-slate-150 dark:border-navy-500">
                        <div class="tabs-list -mb-0.5 flex">
                            <button
                                class="btn h-14 shrink-0 space-x-2 rounded-none border-b-2 border-primary px-4 font-medium text-primary dark:border-accent dark:text-accent-light sm:px-5">
                                <i class="fa-solid fa-layer-group text-base"></i>
                                <span>General</span>
                            </button>


                        </div>
                    </div>
                </div>
                <div class="tab-content p-4 sm:p-5">

                    <form method="POST" action="{{ route('smme.organization-workspace.store', ['prefix' => 'admin']) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="space-y-5">
                            <label class="block">
                                <span class="font-medium text-slate-600 dark:text-navy-100">Organization Title</span>
                            </label>
                            <input name="company_trading_name" id="company_trading_name"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Organization title" type="text">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <label
                            class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                          >
                            <input
                              tabindex="-1"
                              type="file"
                              class="pointer-events-none absolute inset-0 h-full w-full opacity-0"
                              name="company_logo" id="company_logo"
                            />
                            <div class="flex items-center space-x-2">
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                              >
                                <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"
                                />
                              </svg>
                              <span>Upload Logo</span>
                            </div>
                          </label>

                            <label class="block">
                                <span class="font-medium text-slate-600 dark:text-navy-100">Industry</span>
                            </label>
                            <input name="industry" id="industry"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Industry" type="text">

                            <label class="block">
                                <span class="font-medium text-slate-600 dark:text-navy-100">Location</span>
                            </label>
                            <input name="location" id="location"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Location" type="text">

                            <label class="block">
                                <span class="font-medium text-slate-600 dark:text-navy-100">Website</span>
                            </label>
                            <input name="website" id="website"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Website" type="text">

                            <label class="block">
                                <span class="font-medium text-slate-600 dark:text-navy-100">Description</span>
                            </label>
                            <textarea name="description" id="description"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Description"></textarea>

                            <!-- Add more fields as needed -->

                            <button type="submit"
                                class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">Create Workspace</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

</div>

@endsection
