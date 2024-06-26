@extends('layouts.lesson')
@section('content')



<div class="relative">

    <ul class="uk-switcher relative z-10" id="video_tabs" style="touch-action: pan-y pinch-zoom;">

        <li class="uk-active">
            <!-- to autoplay video uk-video="automute: true" -->
            <div class="embed-video">
                <iframe src="https://www.youtube.com/embed/{{ $lesson->embed_id }}" frameborder="0" uk-video="automute: true" allowfullscreen="" uk-responsive="" class="uk-responsive-width"></iframe>
            </div>

        </li>
        <!-- <li>
            <div class="embed-video">
                <iframe src="https://www.youtube.com/embed/dDn9uw7N9Xg" frameborder="0" allowfullscreen=""
                    uk-responsive="" class="uk-responsive-width"></iframe>
            </div>
        </li>
        <li>
            <div class="embed-video">
                <iframe src="https://www.youtube.com/embed/CGSdK7FI9MY" frameborder="0" allowfullscreen=""
                    uk-responsive="" class="uk-responsive-width"></iframe>
            </div>
        </li>
        <li>
            <div class="embed-video">
                <iframe src="https://www.youtube.com/embed/4I1WgJz_lmA" frameborder="0" allowfullscreen=""
                    uk-responsive="" class="uk-responsive-width"></iframe>
            </div>
        </li>
        <li>
            <div class="embed-video">
                <iframe src="https://www.youtube.com/embed/dDn9uw7N9Xg" frameborder="0" allowfullscreen=""
                    uk-responsive="" class="uk-responsive-width"></iframe>
            </div>
        </li>
        <li>
            <div class="embed-video">
                <iframe src="https://www.youtube.com/embed/CPcS4HtrUEU" frameborder="0" allowfullscreen=""
                    uk-responsive="" class="uk-responsive-width"></iframe>
            </div>
        </li> -->

    </ul>

    <div class="bg-gray-200 w-full h-full absolute inset-0 animate-pulse"></div>

</div>

<nav class="cd-secondary-nav border-b md:p-0 lg:px-6 bg-white uk-sticky" uk-sticky="cls-active:shadow-sm ; media: @s">
    <ul uk-switcher="connect: #course-tabs; animation: uk-animation-fade">
        <li class="uk-active"><a href="#" class="lg:px-2" aria-expanded="true"> Overview </a></li>
        <li><a href="#" class="lg:px-2" aria-expanded="false"> Lesson Content </a></li>
        <li><a href="#" class="lg:px-2" aria-expanded="false"> Quizzes </a></li>
    </ul>
</nav>
<div class="uk-sticky-placeholder" style="height: 50px; margin: 0px;" hidden=""></div>

<div class="container">

    <div class="max-w-2xl lg:py-6 mx-auto uk-switcher" id="course-tabs" style="touch-action: pan-y pinch-zoom;">

        <!--  Overview -->
        <div class="uk-active">

            <h4 class="text-2xl font-semibold"> About this course </h4>

            <p> {{ $lesson->title }}</p>

            <hr class="my-5">

            <div class="grid lg:grid-cols-3 mt-8 gap-8">
                <div>
                    <h3 class="text-lg font-semibold"> Description </h3>
                </div>
                <div class="col-span-2">
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                        euismod
                        tincidunt ut
                        laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim laoreet dolore
                        magna
                        aliquam erat
                        volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper
                        suscipit
                        lobortis
                        nisl ut aliquip ex ea commodo consequat

                        <br>
                        <a href="#" class="text-blue-500">Read more .</a>
                    </p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold"> What You’ll Learn </h3>
                </div>
                <div class="col-span-2">
                    <ul>
                        <li> <i class="uil-check text-xl font-bold mr-2"></i>Setting up the environment</li>
                        <li> <i class="uil-check text-xl font-bold mr-2"></i>Advanced HTML Practices</li>
                        <li> <i class="uil-check text-xl font-bold mr-2"></i>Build a portfolio website</li>
                        <li> <i class="uil-check text-xl font-bold mr-2"></i>Responsive Designs</li>
                        <li> <i class="uil-check text-xl font-bold mr-2"></i>Understand HTML Programming
                        </li>
                        <li> <i class="uil-check text-xl font-bold mr-2"></i>Code HTML</li>
                        <li> <i class="uil-check text-xl font-bold mr-2"></i>Start building beautiful
                            websites</li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold"> Requirements </h3>
                </div>
                <div class="col-span-2">
                    <ul class="list-disc ml-5 space-y-1">
                        <li>Any computer will work: Windows, macOS or Linux</li>
                        <li>Basic programming HTML and CSS.</li>
                        <li>Basic/Minimal understanding of JavaScript</li>
                    </ul>
                </div>

            </div>


        </div>

        <!--  Announcements -->
        <div>
            <h3 class="text-xl font-semibold mb-3"> {{ $lesson->title }} </h3>

            <!-- <div class="flex items-center gap-x-4 mb-5">
                <img src="../assets/images/avatars/avatar-4.jpg" alt="" class="rounded-full shadow w-12 h-12">
                <div>
                    <h4 class="-mb-1 text-base"> Stella Johnson</h4>
                    <span class="text-sm"> Instructor <span class="text-gray-500"> 1 year ago </span>
                    </span>
                </div>
            </div> -->


            <p>
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

            <a href="#" class="text-blue-600" id="toggle-more-view" uk-toggle="target: #more-veiw; cls: line-clamp-2; animation: uk-animation-fade">
                Read More
            </a>



        </div>

        <!-- faq -->
        <div>
            <h3 class="text-xl font-semibold mb-3"> Course Faq </h3>
            <ul uk-accordion="multiple: true" class="divide-y space-y-3 space-y-6 uk-accordion">
                <li class="uk-open">
                    <a class="uk-accordion-title font-semibold text-xl mt-4" href="#"> Html Introduction
                    </a>
                    <div class="uk-accordion-content mt-3" aria-hidden="false">
                        <p> The primary goal of this quick start guide is to introduce you to
                            Unreal
                            Engine 4`s (UE4) development environment. By the end of this guide,
                            you`ll
                            know how to set up and develop C++ Projects in UE4. This guide shows
                            you
                            how
                            to create a new Unreal Engine project, add a new C++ class to it,
                            compile
                            the project, and add an instance of a new class to your level. By
                            the
                            time
                            you reach the end of this guide, you`ll be able to see your
                            programmed
                            Actor
                            floating above a table in the level. </p>
                    </div>
                </li>
                <li>
                    <a class="uk-accordion-title font-semibold text-xl mt-4" href="#"> Your First
                        webpage</a>
                    <div class="uk-accordion-content mt-3" hidden="" aria-hidden="true">
                        <p> The primary goal of this quick start guide is to introduce you to
                            Unreal
                            Engine 4`s (UE4) development environment. By the end of this guide,
                            you`ll
                            know how to set up and develop C++ Projects in UE4. This guide shows
                            you
                            how
                            to create a new Unreal Engine project, add a new C++ class to it,
                            compile
                            the project, and add an instance of a new class to your level. By
                            the
                            time
                            you reach the end of this guide, you`ll be able to see your
                            programmed
                            Actor
                            floating above a table in the level. </p>
                    </div>
                </li>
                <li>
                    <a class="uk-accordion-title font-semibold text-xl mt-4" href="#"> Some Special Tags
                    </a>
                    <div class="uk-accordion-content mt-3" hidden="" aria-hidden="true">
                        <p> The primary goal of this quick start guide is to introduce you to
                            Unreal
                            Engine 4`s (UE4) development environment. By the end of this guide,
                            you`ll
                            know how to set up and develop C++ Projects in UE4. This guide shows
                            you
                            how
                            to create a new Unreal Engine project, add a new C++ class to it,
                            compile
                            the project, and add an instance of a new class to your level. By
                            the
                            time
                            you reach the end of this guide, you`ll be able to see your
                            programmed
                            Actor
                            floating above a table in the level. </p>
                    </div>
                </li>
                <li>
                    <a class="uk-accordion-title font-semibold text-xl mt-4" href="#"> Html Introduction
                    </a>
                    <div class="uk-accordion-content mt-3" hidden="" aria-hidden="true">
                        <p> The primary goal of this quick start guide is to introduce you to
                            Unreal
                            Engine 4`s (UE4) development environment. By the end of this guide,
                            you`ll
                            know how to set up and develop C++ Projects in UE4. This guide shows
                            you
                            how
                            to create a new Unreal Engine project, add a new C++ class to it,
                            compile
                            the project, and add an instance of a new class to your level. By
                            the
                            time
                            you reach the end of this guide, you`ll be able to see your
                            programmed
                            Actor
                            floating above a table in the level. </p>
                    </div>
                </li>
            </ul>
        </div>



    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const lessonId = {
            {
                $lesson - > id
            }
        };
        const csrfToken = '{{ csrf_token() }}';
        const progressBar = document.getElementById('progress-bar');

        // Function to update progress bar
        function updateProgressBar() {
            let currentWidth = parseInt(progressBar.style.width);
            if (currentWidth < 100) {
                currentWidth += 10; // Increment progress (example: 10% every minute)
                progressBar.style.width = currentWidth + '%';
                progressBar.setAttribute('aria-valuenow', currentWidth);
            }
        }

        // Send progress update every minute
        setInterval(function() {
            fetch(`/progress/${lessonId}`, {
                    method: 'PUT'
                    , headers: {
                        'Content-Type': 'application/json'
                        , 'X-CSRF-TOKEN': csrfToken
                    }
                    , body: JSON.stringify({
                        completed: true
                    })
                }).then(response => response.json())
                .then(data => {
                    console.log('Progress updated:', data);
                    updateProgressBar();
                });
        }, 60000); // 60 seconds interval
    });

</script>

@endsection
