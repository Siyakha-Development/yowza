@extends('layouts.master_dashboard_layout')
@section('main_content')
<div class="flex items-center space-x-4 py-5 lg:py-6">
    <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
        Add a Document
    </h2>

    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    <div class="hidden h-full py-1 sm:flex">
        <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
    </div>
    <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
        <li class="flex items-center space-x-2">
            <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                href="{{  route('smme.document-library.index', ['prefix' => 'admin']) }}">Document Library</a>
            <svg x-ignore="" xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </li>
        <li>Adding a Document</li>
    </ul>
</div>

<div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
    <div class="col-span-12">
        <div class="card p-4 sm:p-5">

            <form method="POST" action="{{ route('admin.document-library.store', ['prefix' => $prefix]) }}"
                enctype="multipart/form-data">
                @csrf
                <div class="mt-4 space-y-4">

                    <label class="block">
                        <span>Name</span>
                        <span class="relative mt-1.5 flex">
                            <input placeholder="Document Name"
                                class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                type="text" name="name" id="name" required>

                        </span>
                    </label>

                    <label class="block">
                        <span>Category</span>
                        <span class="relative mt-1.5 flex">
                            <select
                                class="form-select mt-1 h-12 w-full rounded-lg border border-slate-300 bg-white px-2.5 text-base hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                                name="document_library_category_id" id="document_library_category_id" required>

                                <option value="" disabled selected>Select Category</option>
                                <option value="Compliance">Compliance</option>
                                <option value="Funding and tenders">Funding and tenders</option>
                                <option value="Finance">Finance</option>
                                <option value="HR">HR</option>
                                <option value="Legal">Legal</option>
                                <option value="Marketing and Sales">Marketing and Sales</option>
                                <option value="Operations">Operations</option>
                            </select>

                        </span>
                    </label>


                    <label class="block">
                        <span>Status</span>
                        <select
                            class="form-select mt-1 h-12 w-full rounded-lg border border-slate-300 bg-white px-2.5 text-base hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                            name="status" id="status" required>
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </label>

                    <label class="block">
                        <span>Date</span>
                        <input
                            class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            placeholder="Document Date" type="date" name="date" id="date">

                    </label>

                    <label class="block">
                        <span>File (PDF, PPTX, DOCX)</span>
                        <input
                            class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent "
                            placeholder="Choose File" type="file" id="file" name="file">
                    </label>
                </div>
                <br>
                <div class="form-group">
                    <div class="flex justify-end space-x-2">
                        <div class="flex justify-end space-x-2">
                            <button type="submit"
                                class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                <span>Add</span>

                            </button>
                        </div>
                    </div>
                </div>


            </form>
        </div>

    </div>


</div>
@endsection
