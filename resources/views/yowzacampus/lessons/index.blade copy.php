@extends('layouts.master_dashboard_layout')
@section('main_content')

<div class="grid grid-cols-6 lg:gap-6">


    <div class=" p-6 md:m-0 -mx-5 col-span-12 pt-6 lg:col-span-8 lg:pb-6">

        <div class="card tube-card p-4 lg:p-6">
            <div class="embed-video rounded -mx-6 -mt-6 lg:m-0">
                <iframe src="https://www.youtube.com/embed/{{ $lesson->embed_id }}" frameborder="0"
                    uk-video="automute: true" allowfullscreen="" uk-responsive="" class="uk-responsive-width"></iframe>
            </div>

            <div class="py-5 space-y-4">

                <div>
                    <h1 class="lg:text-2xl text-lg font-semibold line-clamp-1"> {{ $lesson->title }}</h1>
                    <p> 6 views </p>
                </div>



                <div class="text-lg font-semibold pt-2"> Description </div>
                <p id="more-view" class="line-clamp-2">
                    <?php
                    $fullText = $lesson->full_text;
                    // Style h1, h2, h3 tags with bold formatting
                    $fullText = preg_replace('/<h1>(.*?)<\/h1>/', '<h1><strong>$1</strong></h1>', $fullText);
                    $fullText = preg_replace('/<h2>(.*?)<\/h2>/', '<h2><strong>$1</strong></h2>', $fullText);
                    $fullText = preg_replace('/<h3>(.*?)<\/h3>/', '<h3><strong>$1</strong></h3>', $fullText);
                    // Render the formatted content
                    echo nl2br($fullText);
                    ?>
                </p>
                <a href="#" class="text-blue-600" id="toggle-more-view"
                    uk-toggle="target: #more-veiw; cls: line-clamp-2; animation: uk-animation-fade">
                    Read More
                </a>

                <hr>

                <!-- Comments-->
                <div class="text-lg font-semibold pt-2"> Lessons</div>

                <div class="space-y-4 my-5">
                    @if($purchased_course)
                    @if ($previous_lesson)
                    <div class="swiper-button-prev watch-prev-icon" style="left: 10px; right: initial; bottom: 0px; border-radius: 50%;">
                        <a href="{{ route('lessons.show', [$previous_lesson->course_id, $previous_lesson->slug]) }}"> <i
                                class="bx bx-left-arrow-alt"></i></a>
                    </div>
                    @endif
                    @if ($next_lesson)
                    <div class="swiper-button-next watch-next-icon" style="
                right: 10px;
                left: initial;
                bottom: 0px;
                border-radius: 50%;
              ">
                        <a href="{{ route('lessons.show', [$next_lesson->course_id, $next_lesson->slug]) }}"><i
                                class="bx bx-right-arrow-alt"></i></a>
                    </div>
                    @endif
                    @endif
                    <br>

                    @foreach ($lesson->course->publishedLessons as $publishedLesson)
                    @if ($publishedLesson->free_lesson)
                    <div class="bg-gray-50 border flex gap-x-4 p-4 relative rounded-md">
                        <img src="{{ Storage::url($publishedLesson->course->course_image) }}" alt=""
                            class="rounded-full shadow w-12 h-12">
                        <div class="flex justify-center items-center absolute right-5 top-6 space-x-1 text-yellow-500">
                            <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>
                            <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>
                            <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>
                            <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>
                            <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>
                        </div>
                        <div>
                            <h4 class="text-base m-0 font-semibold"><a
                                    href="{{ route('lessons.show', [$publishedLesson->course_id, $publishedLesson->slug]) }}">{{
                                    $publishedLesson->title }}</a> </h4>
                            <span class="text-gray-700 text-sm"> </span>
                            {{-- <p class="mt-3 md:ml-0 -ml-16">--}}
                                {{-- Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam ut laoreet
                                dolore--}}
                                {{-- magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                                tation--}}
                                {{-- ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.--}}
                                {{-- </p>--}}



                        </div>
                    </div>
                    @else
                    @if($purchased_course)
                    <div class="bg-gray-50 border flex gap-x-4 p-4 relative rounded-md">
                        <img src="{{ Storage::url($publishedLesson->course->course_image) }}" alt=""
                            class="rounded-full shadow w-12 h-12">
                        <div class="flex justify-center items-center absolute right-5 top-6 space-x-1 text-yellow-500">
                            <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>
                            <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>
                            <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>
                            <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>
                            <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>
                        </div>
                        <div>
                            <h4 class="text-base m-0 font-semibold"><a
                                    href="{{ route('lessons.show', [$publishedLesson->course_id, $publishedLesson->slug]) }}">{{
                                    $publishedLesson->title }}</a></h4>
                            <span class="text-gray-700 text-sm"> </span>
                            {{-- <p class="mt-3 md:ml-0 -ml-16">--}}
                                {{-- Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam ut laoreet
                                dolore--}}
                                {{-- magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                                tation--}}
                                {{-- ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.--}}
                                {{-- </p>--}}



                        </div>
                    </div>
                    @endif
                    @endif
                    @endforeach


                </div>

{{--                <div class="flex justify-center mt-9">--}}
{{--                    <a href="#" class="bg-gray-50 border hover:bg-gray-100 px-4 py-1.5 rounded-full text-sm">More--}}
{{--                        Comments ..</a>--}}
{{--                </div>--}}

            </div>
        </div>

        <div class="mt-4 grid gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="space-y-2 sm:space-y-5 lg:space-y-2">
                <div class="card">
                    <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5">
                        <div class="flex items-center space-x-2">

                            <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">
                                Tests/Quizzes
                            </h4>
                        </div>
                    </div>
                    <div x-data="{expandedItem:'item-1'}"
                        class="flex flex-col divide-y divide-slate-150 px-4 dark:divide-navy-500 sm:px-5">
                        @if ($purchased_course)
                        @if ($test_exists)
                        @if (!is_null($test_result))
                                    <br>
                                    <div class="flex -space-x-px" style="border-top-width: 0px !important;">
                                        <a
                                            href="#"
                                            class="tag rounded-r-none bg-success/10 text-success hover:bg-success/20 focus:bg-success/20 active:bg-success/25"
                                        >
                                            Your test score:
                                        </a>
                                        <a href="#" class="badge bg-success text-white shadow-lg shadow-success/50">
                                            {{ $test_result->test_result }}
                                        </a>
                                    </div>
                                    <br>
                        @else
                        <form action="{{ route('lessons.test', [$lesson->slug]) }}" method="post">
                            @csrf
                            @foreach ($lesson->test->questions as $question)
                            <div x-data="accordionItem('item-1')">
                                <div @click="expanded = !expanded"
                                    class="flex cursor-pointer items-center justify-between py-4 text-base font-medium text-slate-700 dark:text-navy-100">
                                    <p>{{ $loop->iteration }}. {{ strip_tags($question->question) }}</p>
                                    <div :class="expanded &amp;&amp; '-rotate-180'"
                                        class="text-sm font-normal leading-none text-slate-400 transition-transform duration-300 dark:text-navy-300 -rotate-180">
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>

                                <div x-collapse="" x-show="expanded">
                                    <div class="pb-4">
                                        @foreach ($question->options as $option)
                                        <p>

                                            <input type="radio" name="questions[{{ $question->id }}]"
                                                value="{{ $option->id }}" style="margin-bottom: 0.8rem" />
{{--                                                {{ strip_tags($option->option_text) }}--}}
                                                @php
                                                    $text_without_p_tags = preg_replace('/<\/?p>/', '', $option->option_text);
                                                @endphp
                                                {{ $text_without_p_tags }}
                                            <br />

                                        </p>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="flex space-x-2 pt-3">
                                <button class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                                        style="border: none; padding: 0.4rem 1.4rem; border-radius: 1rem;margin-top: 1rem;">Submit
                                    Result</button>
                            </div>
                            <br>
                        </form>
                        @endif
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>

<style>
    @media (min-width: 768px) {
        .md\:m-0 {
            margin: 0;
        }
    }

    .p-6 {
        padding: 1.5rem;
    }

    .tube-card {
        --tw-bg-opacity: 1;
        background-color: rgba(255, 255, 255, var(--tw-bg-opacity));
        border-radius: .5rem;
        border-width: 1px;
    }

    .embed-video {
        overflow: hidden;
        padding-bottom: 56.25%;
        position: relative;
        height: 0;
    }

    .embed-video iframe {
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        position: absolute;
        /* padding: 20px; */
    }

    audio,
    canvas,
    embed,
    iframe,
    img,
    object,
    svg,
    video {
        display: block;
        vertical-align: middle;
    }

    .line-clamp-2 {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        /* number of lines to show */
        -webkit-box-orient: vertical;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
            const moreView = document.getElementById('more-view');
            const toggleMoreView = document.getElementById('toggle-more-view');

            toggleMoreView.addEventListener('click', function (e) {
                e.preventDefault();
                if (moreView.classList.contains('line-clamp-2')) {
                    moreView.classList.remove('line-clamp-2');
                    toggleMoreView.textContent = 'Read Less';
                } else {
                    moreView.classList.add('line-clamp-2');
                    toggleMoreView.textContent = 'Read More';
                }
            });
        });
</script>

@endsection
