@extends('layouts.master_dashboard_layout')
@section('main_content')
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="flex flex-col items-center justify-between space-y-4 py-5 sm:flex-row sm:space-y-0 lg:py-6">
    <div class="flex items-center space-x-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        <h2 class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50">
            Create New Group
        </h2>
    </div>

</div>

<div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
    <div class="col-span-12 lg:col-span-10">

        <div class="card p-4 sm:p-5">
            <p class="text-base font-medium text-slate-700 dark:text-navy-100">
                Shipping Address
            </p>
            <div class="mt-4 space-y-4">
                <form action="{{ route('smme.yowza-community-groups.store', ['prefix' => 'admin']) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Group Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="group_banner">Group Banner</label>
                        <input type="file" name="group_banner" id="group_banner" class="form-control">
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" name="is_private" id="is_private" class="form-check-input" value="1" {{ old('is_private') ? 'checked' : '' }}>
                        <label for="is_private" class="form-check-label">Private Group</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Group</button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
