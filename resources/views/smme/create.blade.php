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

            <a href="{{ route('smme.smmeworkspace.index', ['prefix' => 'admin']) }}"
                class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                Join Other Workspace
            </a>
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

                        <form method="POST" action="{{ route('smme.smmeworkspace.store', ['prefix' => 'admin']) }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Name -->
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- SMME Business Name -->
                            <div class="form-group row">
                                <label for="smme_business_name" class="col-md-4 col-form-label text-md-right">{{ __('SMME Business Name') }}</label>
                                <div class="col-md-6">
                                    <input id="smme_business_name" type="text" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('smme_business_name') is-invalid @enderror" name="smme_business_name" value="{{ old('smme_business_name') }}" required>
                                    @error('smme_business_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- SMME Logo -->
                            <div class="form-group row">
                                <label for="smme_logo" class="col-md-4 col-form-label text-md-right">{{ __('SMME Logo') }}</label>
                                <div class="col-md-6">
                                    <input id="smme_logo" type="file" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('smme_logo') is-invalid @enderror" name="smme_logo">
                                    @error('smme_logo')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- SMME Description of Business -->
                            <div class="form-group row">
                                <label for="smme_description_of_business" class="col-md-4 col-form-label text-md-right">{{ __('SMME Description of Business') }}</label>
                                <div class="col-md-6">
                                    <textarea id="smme_description_of_business" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('smme_description_of_business') is-invalid @enderror" name="smme_description_of_business" required>{{ old('smme_description_of_business') }}</textarea>
                                    @error('smme_description_of_business')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- SMME Industry -->
                            <div class="form-group row">
                                <label for="smme_industry" class="col-md-4 col-form-label text-md-right">{{ __('SMME Industry') }}</label>
                                <div class="col-md-6">
                                    <input id="smme_industry" type="text" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('smme_industry') is-invalid @enderror" name="smme_industry" value="{{ old('smme_industry') }}">
                                    @error('smme_industry')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- SMME Business Registration Number -->
                            <div class="form-group row">
                                <label for="smme_business_registration_number" class="col-md-4 col-form-label text-md-right">{{ __('SMME Business Registration Number') }}</label>
                                <div class="col-md-6">
                                    <input id="smme_business_registration_number" type="text" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('smme_business_registration_number') is-invalid @enderror" name="smme_business_registration_number" value="{{ old('smme_business_registration_number') }}">
                                    @error('smme_business_registration_number')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- SMME Company Size -->
                            <div class="form-group row">
                                <label for="smme_company_size" class="col-md-4 col-form-label text-md-right">{{ __('SMME Company Size') }}</label>
                                <div class="col-md-6">
                                    <input id="smme_company_size" type="text" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('smme_company_size') is-invalid @enderror" name="smme_company_size" value="{{ old('smme_company_size') }}">
                                    @error('smme_company_size')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- SMME Company Address -->
                            <div class="form-group row">
                                <label for="smme_company_address" class="col-md-4 col-form-label text-md-right">{{ __('SMME Company Address') }}</label>
                                <div class="col-md-6">
                                    <textarea id="smme_company_address" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('smme_company_address') is-invalid @enderror" name="smme_company_address">{{ old('smme_company_address') }}</textarea>
                                    @error('smme_company_address')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- SMME Company Email -->
                            <div class="form-group row">
                                <label for="smme_company_email" class="col-md-4 col-form-label text-md-right">{{ __('SMME Company Email') }}</label>
                                <div class="col-md-6">
                                    <input id="smme_company_email" type="email" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('smme_company_email') is-invalid @enderror" name="smme_company_email" value="{{ old('smme_company_email') }}">
                                    @error('smme_company_email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- SMME Landline Number -->
                            <div class="form-group row">
                                <label for="smme_landline_number" class="col-md-4 col-form-label text-md-right">{{ __('SMME Landline Number') }}</label>
                                <div class="col-md-6">
                                    <input id="smme_landline_number" type="text" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('smme_landline_number') is-invalid @enderror" name="smme_landline_number" value="{{ old('smme_landline_number') }}">
                                    @error('smme_landline_number')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- SMME Business Classification -->
                            <div class="form-group row">
                                <label for="smme_business_classification" class="col-md-4 col-form-label text-md-right">{{ __('SMME Business Classification') }}</label>
                                <div class="col-md-6">
                                    <input id="smme_business_classification" type="text" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('smme_business_classification') is-invalid @enderror" name="smme_business_classification" value="{{ old('smme_business_classification') }}">
                                    @error('smme_business_classification')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- SMME Established in Year -->
                            <div class="form-group row">
                                <label for="smme_established_in_year" class="col-md-4 col-form-label text-md-right">{{ __('SMME Established in Year') }}</label>
                                <div class="col-md-6">
                                    <input id="smme_established_in_year" type="text" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('smme_established_in_year') is-invalid @enderror" name="smme_established_in_year" value="{{ old('smme_established_in_year') }}">
                                    @error('smme_established_in_year')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- SMME B-BBEE Level -->
                            <div class="form-group row">
                                <label for="smme_b_bbee_level" class="col-md-4 col-form-label text-md-right">{{ __('SMME B-BBEE Level') }}</label>
                                <div class="col-md-6">
                                    <input id="smme_b_bbee_level" type="text" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('smme_b_bbee_level') is-invalid @enderror" name="smme_b_bbee_level" value="{{ old('smme_b_bbee_level') }}">
                                    @error('smme_b_bbee_level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- SMME Black Woman Ownership -->
                            <div class="form-group row">
                                <label for="smme_black_woman_ownership" class="col-md-4 col-form-label text-md-right">{{ __('SMME Black Woman Ownership') }}</label>
                                <div class="col-md-6">
                                    <input id="smme_black_woman_ownership" type="text" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('smme_black_woman_ownership') is-invalid @enderror" name="smme_black_woman_ownership" value="{{ old('smme_black_woman_ownership') }}">
                                    @error('smme_black_woman_ownership')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- SMME Growth in Profit -->
                            <div class="form-group row">
                                <label for="smme_growth_in_profit" class="col-md-4 col-form-label text-md-right">{{ __('SMME Growth in Profit') }}</label>
                                <div class="col-md-6">
                                    <input id="smme_growth_in_profit" type="text" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('smme_growth_in_profit') is-invalid @enderror" name="smme_growth_in_profit" value="{{ old('smme_growth_in_profit') }}">
                                    @error('smme_growth_in_profit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- SMME Growth in Jobs -->
                            <div class="form-group row">
                                <label for="smme_growth_in_jobs" class="col-md-4 col-form-label text-md-right">{{ __('SMME Growth in Jobs') }}</label>
                                <div class="col-md-6">
                                    <input id="smme_growth_in_jobs" type="text" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('smme_growth_in_jobs') is-invalid @enderror" name="smme_growth_in_jobs" value="{{ old('smme_growth_in_jobs') }}">
                                    @error('smme_growth_in_jobs')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- SMME Growth in Economic Participation -->
                            <div class="form-group row">
                                <label for="smme_growth_in_economic_participation" class="col-md-4 col-form-label text-md-right">{{ __('SMME Growth in Economic Participation') }}</label>
                                <div class="col-md-6">
                                    <input id="smme_growth_in_economic_participation" type="text" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('smme_growth_in_economic_participation') is-invalid @enderror" name="smme_growth_in_economic_participation" value="{{ old('smme_growth_in_economic_participation') }}">
                                    @error('smme_growth_in_economic_participation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                                <br>
                            <div class="flex justify-end space-x-2">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
