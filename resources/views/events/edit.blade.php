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
                Edit Event
            </h2>
        </div>

    </div>

    <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
        <div class="col-span-12 lg:col-span-10">
            <form action="{{url('/admin/admin/events',$event->id)}}" method="post"  enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card">
                    <div class="tabs flex flex-col">
                        <div class="is-scrollbar-hidden overflow-x-auto">
                        </div>
                        <div class="tab-content p-4 sm:p-5">
                            <div class="space-y-5">
                                <label class="block">
                                    <span>Title</span>
                                    <input
                                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent "
                                        placeholder="Enter event title"
                                        type="text" name="title" value="{{$event->title}}"
                                    />
                                </label>
                                <label class="block">
                                    <span>Description</span>
                                    <input
                                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent "
                                        placeholder="Enter event description"
                                        type="text" name="description" value="{{$event->description}}"
                                    />
                                </label>
                                <label class="block">
                                    <span>Location</span>
                                    <select
                                        class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                                        name="location"
                                    >
                                        <option>Select location</option>
                                        @foreach($locations as $location)
                                            <option value="{{$location}}" {{$event->location=$location?'selected':''}}>{{$location}}</option>
                                        @endforeach
                                    </select>
                                </label>
                                <label class="block">
                                    <span>Event Type</span>
                                    <select
                                        class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                                        name="event_type"
                                    >
                                        <option>Select event type</option>
                                        @foreach($event_type as $et)
                                            <option value="{{$et}}" {{$event->event_type==$et?'selected':''}}>{{$et}}</option>
                                        @endforeach
                                    </select>
                                </label>
                                <label class="block">
                                    <span>Select Event Category</span>
                                    <select
                                        class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                                        name="category"
                                    >
                                        <option>Select Event Category</option>
                                        @foreach($category as $cat)
                                            <option value="{{$cat}}" {{$event->category==$cat?'selected':''}}>{{$cat}}</option>
                                        @endforeach
                                    </select>
                                </label>
                                <input
                                    x-init="$el._x_flatpickr = flatpickr($el, {
        enableTime: true,
        dateFormat: 'Y-m-d H:i:S',
        minTime: '07:00',
        maxTime: '18:00',
        defaultDate: new Date() // Set the default date and time to the current datetime
    })"
                                    class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="Choose start datetime..."
                                    type="datetime-local"
                                    name="start_time"
                                    value="{{ old('start_time') }}"
                                />
                                <span
                                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                                >
                                  <svg
                                      xmlns="http://www.w3.org/2000/svg"
                                      class="size-5"
                                      fill="none"
                                      viewBox="0 0 24 24"
                                      stroke="currentColor"
                                      stroke-width="1.5"
                                  >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                    />
                                  </svg>
                                    </span>
                                </label>
                                <label class="relative flex">
                                    <input
                                        x-init="$el._x_flatpickr = flatpickr($el, {
        enableTime: true,
        dateFormat: 'Y-m-d H:i:S',
        minTime: '07:00',
        maxTime: '18:00',
        defaultDate: new Date() // Set the default date and time to the current datetime
    })"
                                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        placeholder="Choose end datetime..."
                                        type="datetime-local"
                                        name="end_time"
                                        value="{{ old('end_time') }}"
                                    />
                                    <span
                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                                    >
      <svg
          xmlns="http://www.w3.org/2000/svg"
          class="size-5"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          stroke-width="1.5"
      >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
        />
      </svg>
    </span>
                                </label>
                                <label class="relative flex">
                                    <input
                                        x-data
                                        x-init="
        const picker = flatpickr($refs.input, {
            disable: [
                function (date) {
                    return (date.getDay() === 0 || date.getDay() === 6);
                }
            ],
            locale: {
                firstDayOfWeek: 1
            },
            defaultDate: 'today' // Set the default date to today's date
        });
        $watch('value', value => {
            if (value) {
                picker.setDate(value, true, 'Y-m-d');
            }
        })
    "
                                        x-ref="input"
                                    class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="Choose event date..."
                                    type="text"
                                    name="event_date"
                                    />

                                    <span
                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                                    >
                                  <svg
                                      xmlns="http://www.w3.org/2000/svg"
                                      class="size-5 transition-colors duration-200"
                                      fill="none"
                                      viewBox="0 0 24 24"
                                      stroke="currentColor"
                                      stroke-width="1.5"
                                  >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                    />
                                  </svg>
                                </span>
                                </label>
                                <br/>
                                <label
                                    class="btn relative bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                                >
                                    <input
                                        tabindex="-1"
                                        type="file"
                                        class="pointer-events-none absolute inset-0 h-full w-full opacity-0"
                                        name="event_image"
                                    />
                                    <div class="flex items-center space-x-2">
                                        <i class="fa-solid fa-cloud-arrow-up text-base"></i>
                                        <span>Event Image</span>
                                    </div>
                                </label>
                                <div class="flex justify-center space-x-2">
                                    <button class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90" id="submit-button">
                                        Create Event
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
