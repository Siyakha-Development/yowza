<html lang="en" class="hydrated">

<head>
    <style type="text/css">
        .tippy-touch {
            cursor: pointer !important
        }

        .tippy-notransition {
            transition: none !important
        }

        .tippy-popper {
            max-width: 350px;
            -webkit-perspective: 700px;
            perspective: 700px;
            z-index: 9999;
            outline: 0;
            transition-timing-function: cubic-bezier(.165, .84, .44, 1);
            pointer-events: none;
            line-height: 1.4
        }

        .tippy-popper[data-html] {
            max-width: 96%;
            max-width: calc(100% - 20px)
        }

        .tippy-popper[x-placement^=top] .tippy-backdrop {
            border-radius: 40% 40% 0 0
        }

        .tippy-popper[x-placement^=top] .tippy-roundarrow {
            bottom: -8px;
            -webkit-transform-origin: 50% 0;
            transform-origin: 50% 0
        }

        .tippy-popper[x-placement^=top] .tippy-roundarrow svg {
            position: absolute;
            left: 0;
            -webkit-transform: rotate(180deg);
            transform: rotate(180deg)
        }

        .tippy-popper[x-placement^=top] .tippy-arrow {
            border-top: 7px solid #333;
            border-right: 7px solid transparent;
            border-left: 7px solid transparent;
            bottom: -7px;
            margin: 0 6px;
            -webkit-transform-origin: 50% 0;
            transform-origin: 50% 0
        }

        .tippy-popper[x-placement^=top] .tippy-backdrop {
            -webkit-transform-origin: 0 90%;
            transform-origin: 0 90%
        }

        .tippy-popper[x-placement^=top] .tippy-backdrop[data-state=visible] {
            -webkit-transform: scale(6) translate(-50%, 25%);
            transform: scale(6) translate(-50%, 25%);
            opacity: 1
        }

        .tippy-popper[x-placement^=top] .tippy-backdrop[data-state=hidden] {
            -webkit-transform: scale(1) translate(-50%, 25%);
            transform: scale(1) translate(-50%, 25%);
            opacity: 0
        }

        .tippy-popper[x-placement^=top] [data-animation=shift-toward][data-state=visible] {
            opacity: 1;
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px)
        }

        .tippy-popper[x-placement^=top] [data-animation=shift-toward][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateY(-20px);
            transform: translateY(-20px)
        }

        .tippy-popper[x-placement^=top] [data-animation=perspective] {
            -webkit-transform-origin: bottom;
            transform-origin: bottom
        }

        .tippy-popper[x-placement^=top] [data-animation=perspective][data-state=visible] {
            opacity: 1;
            -webkit-transform: translateY(-10px) rotateX(0);
            transform: translateY(-10px) rotateX(0)
        }

        .tippy-popper[x-placement^=top] [data-animation=perspective][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateY(0) rotateX(90deg);
            transform: translateY(0) rotateX(90deg)
        }

        .tippy-popper[x-placement^=top] [data-animation=fade][data-state=visible] {
            opacity: 1;
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px)
        }

        .tippy-popper[x-placement^=top] [data-animation=fade][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px)
        }

        .tippy-popper[x-placement^=top] [data-animation=shift-away][data-state=visible] {
            opacity: 1;
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px)
        }

        .tippy-popper[x-placement^=top] [data-animation=shift-away][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateY(0);
            transform: translateY(0)
        }

        .tippy-popper[x-placement^=top] [data-animation=scale][data-state=visible] {
            opacity: 1;
            -webkit-transform: translateY(-10px) scale(1);
            transform: translateY(-10px) scale(1)
        }

        .tippy-popper[x-placement^=top] [data-animation=scale][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateY(0) scale(0);
            transform: translateY(0) scale(0)
        }

        .tippy-popper[x-placement^=bottom] .tippy-backdrop {
            border-radius: 0 0 30% 30%
        }

        .tippy-popper[x-placement^=bottom] .tippy-roundarrow {
            top: -8px;
            -webkit-transform-origin: 50% 100%;
            transform-origin: 50% 100%
        }

        .tippy-popper[x-placement^=bottom] .tippy-roundarrow svg {
            position: absolute;
            left: 0;
            -webkit-transform: rotate(0);
            transform: rotate(0)
        }

        .tippy-popper[x-placement^=bottom] .tippy-arrow {
            border-bottom: 7px solid #333;
            border-right: 7px solid transparent;
            border-left: 7px solid transparent;
            top: -7px;
            margin: 0 6px;
            -webkit-transform-origin: 50% 100%;
            transform-origin: 50% 100%
        }

        .tippy-popper[x-placement^=bottom] .tippy-backdrop {
            -webkit-transform-origin: 0 -90%;
            transform-origin: 0 -90%
        }

        .tippy-popper[x-placement^=bottom] .tippy-backdrop[data-state=visible] {
            -webkit-transform: scale(6) translate(-50%, -125%);
            transform: scale(6) translate(-50%, -125%);
            opacity: 1
        }

        .tippy-popper[x-placement^=bottom] .tippy-backdrop[data-state=hidden] {
            -webkit-transform: scale(1) translate(-50%, -125%);
            transform: scale(1) translate(-50%, -125%);
            opacity: 0
        }

        .tippy-popper[x-placement^=bottom] [data-animation=shift-toward][data-state=visible] {
            opacity: 1;
            -webkit-transform: translateY(10px);
            transform: translateY(10px)
        }

        .tippy-popper[x-placement^=bottom] [data-animation=shift-toward][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateY(20px);
            transform: translateY(20px)
        }

        .tippy-popper[x-placement^=bottom] [data-animation=perspective] {
            -webkit-transform-origin: top;
            transform-origin: top
        }

        .tippy-popper[x-placement^=bottom] [data-animation=perspective][data-state=visible] {
            opacity: 1;
            -webkit-transform: translateY(10px) rotateX(0);
            transform: translateY(10px) rotateX(0)
        }

        .tippy-popper[x-placement^=bottom] [data-animation=perspective][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateY(0) rotateX(-90deg);
            transform: translateY(0) rotateX(-90deg)
        }

        .tippy-popper[x-placement^=bottom] [data-animation=fade][data-state=visible] {
            opacity: 1;
            -webkit-transform: translateY(10px);
            transform: translateY(10px)
        }

        .tippy-popper[x-placement^=bottom] [data-animation=fade][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateY(10px);
            transform: translateY(10px)
        }

        .tippy-popper[x-placement^=bottom] [data-animation=shift-away][data-state=visible] {
            opacity: 1;
            -webkit-transform: translateY(10px);
            transform: translateY(10px)
        }

        .tippy-popper[x-placement^=bottom] [data-animation=shift-away][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateY(0);
            transform: translateY(0)
        }

        .tippy-popper[x-placement^=bottom] [data-animation=scale][data-state=visible] {
            opacity: 1;
            -webkit-transform: translateY(10px) scale(1);
            transform: translateY(10px) scale(1)
        }

        .tippy-popper[x-placement^=bottom] [data-animation=scale][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateY(0) scale(0);
            transform: translateY(0) scale(0)
        }

        .tippy-popper[x-placement^=left] .tippy-backdrop {
            border-radius: 50% 0 0 50%
        }

        .tippy-popper[x-placement^=left] .tippy-roundarrow {
            right: -16px;
            -webkit-transform-origin: 33.33333333% 50%;
            transform-origin: 33.33333333% 50%
        }

        .tippy-popper[x-placement^=left] .tippy-roundarrow svg {
            position: absolute;
            left: 0;
            -webkit-transform: rotate(90deg);
            transform: rotate(90deg)
        }

        .tippy-popper[x-placement^=left] .tippy-arrow {
            border-left: 7px solid #333;
            border-top: 7px solid transparent;
            border-bottom: 7px solid transparent;
            right: -7px;
            margin: 3px 0;
            -webkit-transform-origin: 0 50%;
            transform-origin: 0 50%
        }

        .tippy-popper[x-placement^=left] .tippy-backdrop {
            -webkit-transform-origin: 100% 0;
            transform-origin: 100% 0
        }

        .tippy-popper[x-placement^=left] .tippy-backdrop[data-state=visible] {
            -webkit-transform: scale(6) translate(40%, -50%);
            transform: scale(6) translate(40%, -50%);
            opacity: 1
        }

        .tippy-popper[x-placement^=left] .tippy-backdrop[data-state=hidden] {
            -webkit-transform: scale(1.5) translate(40%, -50%);
            transform: scale(1.5) translate(40%, -50%);
            opacity: 0
        }

        .tippy-popper[x-placement^=left] [data-animation=shift-toward][data-state=visible] {
            opacity: 1;
            -webkit-transform: translateX(-10px);
            transform: translateX(-10px)
        }

        .tippy-popper[x-placement^=left] [data-animation=shift-toward][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateX(-20px);
            transform: translateX(-20px)
        }

        .tippy-popper[x-placement^=left] [data-animation=perspective] {
            -webkit-transform-origin: right;
            transform-origin: right
        }

        .tippy-popper[x-placement^=left] [data-animation=perspective][data-state=visible] {
            opacity: 1;
            -webkit-transform: translateX(-10px) rotateY(0);
            transform: translateX(-10px) rotateY(0)
        }

        .tippy-popper[x-placement^=left] [data-animation=perspective][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateX(0) rotateY(-90deg);
            transform: translateX(0) rotateY(-90deg)
        }

        .tippy-popper[x-placement^=left] [data-animation=fade][data-state=visible] {
            opacity: 1;
            -webkit-transform: translateX(-10px);
            transform: translateX(-10px)
        }

        .tippy-popper[x-placement^=left] [data-animation=fade][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateX(-10px);
            transform: translateX(-10px)
        }

        .tippy-popper[x-placement^=left] [data-animation=shift-away][data-state=visible] {
            opacity: 1;
            -webkit-transform: translateX(-10px);
            transform: translateX(-10px)
        }

        .tippy-popper[x-placement^=left] [data-animation=shift-away][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateX(0);
            transform: translateX(0)
        }

        .tippy-popper[x-placement^=left] [data-animation=scale][data-state=visible] {
            opacity: 1;
            -webkit-transform: translateX(-10px) scale(1);
            transform: translateX(-10px) scale(1)
        }

        .tippy-popper[x-placement^=left] [data-animation=scale][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateX(0) scale(0);
            transform: translateX(0) scale(0)
        }

        .tippy-popper[x-placement^=right] .tippy-backdrop {
            border-radius: 0 50% 50% 0
        }

        .tippy-popper[x-placement^=right] .tippy-roundarrow {
            left: -16px;
            -webkit-transform-origin: 66.66666666% 50%;
            transform-origin: 66.66666666% 50%
        }

        .tippy-popper[x-placement^=right] .tippy-roundarrow svg {
            position: absolute;
            left: 0;
            -webkit-transform: rotate(-90deg);
            transform: rotate(-90deg)
        }

        .tippy-popper[x-placement^=right] .tippy-arrow {
            border-right: 7px solid #333;
            border-top: 7px solid transparent;
            border-bottom: 7px solid transparent;
            left: -7px;
            margin: 3px 0;
            -webkit-transform-origin: 100% 50%;
            transform-origin: 100% 50%
        }

        .tippy-popper[x-placement^=right] .tippy-backdrop {
            -webkit-transform-origin: -100% 0;
            transform-origin: -100% 0
        }

        .tippy-popper[x-placement^=right] .tippy-backdrop[data-state=visible] {
            -webkit-transform: scale(6) translate(-140%, -50%);
            transform: scale(6) translate(-140%, -50%);
            opacity: 1
        }

        .tippy-popper[x-placement^=right] .tippy-backdrop[data-state=hidden] {
            -webkit-transform: scale(1.5) translate(-140%, -50%);
            transform: scale(1.5) translate(-140%, -50%);
            opacity: 0
        }

        .tippy-popper[x-placement^=right] [data-animation=shift-toward][data-state=visible] {
            opacity: 1;
            -webkit-transform: translateX(10px);
            transform: translateX(10px)
        }

        .tippy-popper[x-placement^=right] [data-animation=shift-toward][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateX(20px);
            transform: translateX(20px)
        }

        .tippy-popper[x-placement^=right] [data-animation=perspective] {
            -webkit-transform-origin: left;
            transform-origin: left
        }

        .tippy-popper[x-placement^=right] [data-animation=perspective][data-state=visible] {
            opacity: 1;
            -webkit-transform: translateX(10px) rotateY(0);
            transform: translateX(10px) rotateY(0)
        }

        .tippy-popper[x-placement^=right] [data-animation=perspective][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateX(0) rotateY(90deg);
            transform: translateX(0) rotateY(90deg)
        }

        .tippy-popper[x-placement^=right] [data-animation=fade][data-state=visible] {
            opacity: 1;
            -webkit-transform: translateX(10px);
            transform: translateX(10px)
        }

        .tippy-popper[x-placement^=right] [data-animation=fade][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateX(10px);
            transform: translateX(10px)
        }

        .tippy-popper[x-placement^=right] [data-animation=shift-away][data-state=visible] {
            opacity: 1;
            -webkit-transform: translateX(10px);
            transform: translateX(10px)
        }

        .tippy-popper[x-placement^=right] [data-animation=shift-away][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateX(0);
            transform: translateX(0)
        }

        .tippy-popper[x-placement^=right] [data-animation=scale][data-state=visible] {
            opacity: 1;
            -webkit-transform: translateX(10px) scale(1);
            transform: translateX(10px) scale(1)
        }

        .tippy-popper[x-placement^=right] [data-animation=scale][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateX(0) scale(0);
            transform: translateX(0) scale(0)
        }

        .tippy-tooltip {
            position: relative;
            color: #fff;
            border-radius: 4px;
            font-size: .9rem;
            padding: .3rem .6rem;
            text-align: center;
            will-change: transform;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            background-color: #333
        }

        .tippy-tooltip[data-size=small] {
            padding: .2rem .4rem;
            font-size: .75rem
        }

        .tippy-tooltip[data-size=large] {
            padding: .4rem .8rem;
            font-size: 1rem
        }

        .tippy-tooltip[data-animatefill] {
            overflow: hidden;
            background-color: transparent
        }

        .tippy-tooltip[data-animatefill] .tippy-content {
            transition: -webkit-clip-path cubic-bezier(.46, .1, .52, .98);
            transition: clip-path cubic-bezier(.46, .1, .52, .98);
            transition: clip-path cubic-bezier(.46, .1, .52, .98), -webkit-clip-path cubic-bezier(.46, .1, .52, .98)
        }

        .tippy-tooltip[data-interactive],
        .tippy-tooltip[data-interactive] path {
            pointer-events: auto
        }

        .tippy-tooltip[data-inertia][data-state=visible] {
            transition-timing-function: cubic-bezier(.53, 2, .36, .85)
        }

        .tippy-tooltip[data-inertia][data-state=hidden] {
            transition-timing-function: ease
        }

        .tippy-arrow,
        .tippy-roundarrow {
            position: absolute;
            width: 0;
            height: 0
        }

        .tippy-roundarrow {
            width: 24px;
            height: 8px;
            fill: #333;
            pointer-events: none
        }

        .tippy-backdrop {
            position: absolute;
            will-change: transform;
            background-color: #333;
            border-radius: 50%;
            width: 26%;
            left: 50%;
            top: 50%;
            z-index: -1;
            transition: all cubic-bezier(.46, .1, .52, .98);
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden
        }

        .tippy-backdrop:after {
            content: "";
            float: left;
            padding-top: 100%
        }

        body:not(.tippy-touch) .tippy-tooltip[data-animatefill][data-state=visible] .tippy-content {
            -webkit-clip-path: ellipse(100% 100% at 50% 50%);
            clip-path: ellipse(100% 100% at 50% 50%)
        }

        body:not(.tippy-touch) .tippy-tooltip[data-animatefill][data-state=hidden] .tippy-content {
            -webkit-clip-path: ellipse(5% 50% at 50% 50%);
            clip-path: ellipse(5% 50% at 50% 50%)
        }

        body:not(.tippy-touch) .tippy-popper[x-placement=right] .tippy-tooltip[data-animatefill][data-state=visible] .tippy-content {
            -webkit-clip-path: ellipse(135% 100% at 0 50%);
            clip-path: ellipse(135% 100% at 0 50%)
        }

        body:not(.tippy-touch) .tippy-popper[x-placement=right] .tippy-tooltip[data-animatefill][data-state=hidden] .tippy-content {
            -webkit-clip-path: ellipse(40% 100% at 0 50%);
            clip-path: ellipse(40% 100% at 0 50%)
        }

        body:not(.tippy-touch) .tippy-popper[x-placement=left] .tippy-tooltip[data-animatefill][data-state=visible] .tippy-content {
            -webkit-clip-path: ellipse(135% 100% at 100% 50%);
            clip-path: ellipse(135% 100% at 100% 50%)
        }

        body:not(.tippy-touch) .tippy-popper[x-placement=left] .tippy-tooltip[data-animatefill][data-state=hidden] .tippy-content {
            -webkit-clip-path: ellipse(40% 100% at 100% 50%);
            clip-path: ellipse(40% 100% at 100% 50%)
        }

        @media (max-width:360px) {
            .tippy-popper {
                max-width: 96%;
                max-width: calc(100% - 20px)
            }
        }

    </style>

    <!-- Basic Page Needs
    ================================================== -->
    <title>Yowza Campus</title>
    <meta charset="utf-8">
    <style data-styles="">
        ion-icon {
            visibility: hidden
        }

        .hydrated {
            visibility: inherit
        }

    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Courseplus is - Professional A unique and beautiful collection of UI elements">

    <!-- Favicon -->
    <link href="../assets/images/favicon.png" rel="icon" type="image/png">

    <link rel="stylesheet" href="{{ asset('backend/assets/css/icons.css') }}">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/uikit.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">

    <link rel="stylesheet" href="{{ secure_asset('backend/assets/css/icons.css') }}">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ secure_asset('backend/assets/css/uikit.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('backend/assets/css/style.css') }}">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <script type="module" src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.esm.js" data-stencil-namespace="ionicons"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.js" data-stencil-namespace="ionicons"></script>
</head>


<body class="bg-white">



    <div id="wrapper" class="course-watch">

        <!-- sidebar -->
        <div class="sidebar">

            <!-- slide_menu for mobile -->
            <span class="btn-close-mobi right-3 left-auto" uk-toggle="target: #wrapper ; cls: is-active"></span>

            <!-- back to home link -->
            <div class="flex justify-between lg:-ml-1 mt-1 mr-2">
                <a href="course-intro.html" class="flex items-center text-blue-500">
                    <ion-icon name="chevron-back-outline" class="md:text-lg text-2xl md hydrated" role="img" aria-label="chevron back outline"></ion-icon>
                    <span class="text-sm md:inline hidden"> back</span>
                </a>
            </div>

            <!-- title -->
            <h1 class="lg:text-2xl text-lg font-bold mt-2 line-clamp-2">Learn Responsive Web Design Essentials </h1>

            <!-- sidebar list -->
            <div class="sidebar_inner is-watch-2" data-simplebar="init">
                <div class="simplebar-wrapper" style="margin: 0px -15px -15px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: -17px; bottom: 0px;">
                            <div class="simplebar-content" style="padding: 0px 15px 15px; height: 100%; overflow: hidden scroll;">

                                <div class="lg:inline hidden">
                                    <div class="relative overflow-hidden rounded-md bg-gray-200 h-1 mt-4">
                                        <div class="w-2/4 h-full bg-green-500"></div>
                                    </div>
                                    <div class="mt-2 mb-3 text-sm border-b pb-3">
                                        <div class="progress">
                                            <div id="progress-bar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div> 0% Complete</div>
                                            <div> Last activity on April 20, 2021</div>
                                        </div>
                                        <p><strong>Note:</strong> Your progress will be automatically tracked as you view this lesson.</p>


                                    </div>
                                </div>

                                <div id="curriculum">
                                    <div uk-accordion="multiple: true" class="divide-y space-y-3 uk-accordion">

                                        <div class="uk-open">
                                            <a class="uk-accordion-title text-md mx-2 font-semibold" href="#">
                                                <div class="mb-1 text-sm font-medium"> Section 1 </div>
                                                {{ $lesson->title }}
                                            </a>
                                            <div class="uk-accordion-content mt-3" aria-hidden="false">

                                                <ul class="course-curriculum-list" uk-switcher="connect: #video_tabs; animation: animation: uk-animation-slide-right-small, uk-animation-slide-left-medium">
                                                    <li class="uk-active">
                                                        <a href="#" aria-expanded="true">
                                                            Introduction <span class="hidden"> 4 min </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" aria-expanded="false">
                                                            What is HTML <span class="hidden"> 5 min </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" aria-expanded="false">
                                                            What is a Web page? <span class="hidden"> 8 min </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" aria-expanded="false">

                                                            Your First Web Page
                                                            <span class="hidden"> 4 min </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" aria-expanded="false">

                                                            Brain Streak <span class="hidden"> 5 min </span>
                                                        </a>
                                                    </li>

                                                    <!-- Navigation buttons and lesson cards -->
                                                    <div class="space-y-4 my-5">
                                                        @if($purchased_course)
                                                        @if ($previous_lesson)
                                                        <div class="swiper-button-prev watch-prev-icon" style="left: 10px; right: initial; bottom: 0px; border-radius: 50%;">
                                                            <a href="{{ route('lessons.show', [$previous_lesson->course_id, $previous_lesson->slug]) }}">
                                                                <i class="bx bx-left-arrow-alt"></i>
                                                            </a>
                                                        </div>
                                                        @endif
                                                        @if ($next_lesson)
                                                        <div class="swiper-button-next watch-next-icon" style="right: 10px; left: initial; bottom: 0px; border-radius: 50%;">
                                                            <a href="{{ route('lessons.show', [$next_lesson->course_id, $next_lesson->slug]) }}">
                                                                <i class="bx bx-right-arrow-alt"></i>
                                                            </a>
                                                        </div>
                                                        @endif
                                                        @endif
                                                        <br>

                                                        @foreach ($lesson->course->publishedLessons as $publishedLesson)
                                                        @if ($publishedLesson->free_lesson)
                                                        <div class="bg-gray-50 border flex gap-x-4 p-4 relative rounded-md">
                                                            <img src="{{ Storage::url($publishedLesson->course->course_image) }}" alt="" class="rounded-full shadow w-12 h-12">
                                                            <div class="flex justify-center items-center absolute right-5 top-6 space-x-1 text-yellow-500">
                                                                <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>
                                                                <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>
                                                                <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>
                                                                <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>
                                                                <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>
                                                            </div>
                                                            <div>
                                                                <h4 class="text-base m-0 font-semibold">
                                                                    <a href="{{ route('lessons.show', [$publishedLesson->course_id, $publishedLesson->slug]) }}">
                                                                        {{ $publishedLesson->title }}
                                                                    </a>
                                                                </h4>
                                                                <span class="text-gray-700 text-sm"></span>
                                                            </div>
                                                        </div>
                                                        @else
                                                        @if($purchased_course)
                                                        <div class="bg-gray-50 border flex gap-x-4 p-4 relative rounded-md">
                                                            <img src="{{ Storage::url($publishedLesson->course->course_image) }}" alt="" class="rounded-full shadow w-12 h-12">
                                                            <div class="flex justify-center items-center absolute right-5 top-6 space-x-1 text-yellow-500">
                                                                <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>
                                                                <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>
                                                                <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>
                                                                <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>
                                                                <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>
                                                            </div>
                                                            <div>
                                                                <h4 class="text-base m-0 font-semibold">
                                                                    <a href="{{ route('lessons.show', [$publishedLesson->course_id, $publishedLesson->slug]) }}">
                                                                        {{ $publishedLesson->title }}
                                                                    </a>
                                                                </h4>
                                                                <span class="text-gray-700 text-sm"></span>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @endif
                                                        @endforeach
                                                    </div>
                                                </ul>


                                            </div>
                                        </div>
                                        <div class="pt-2">
                                            <a class="uk-accordion-title text-md mx-2 font-semibold" href="#">
                                                <div class="mb-1 text-sm font-medium"> Section 2 </div> Your First
                                                webpage
                                            </a>
                                            <div class="uk-accordion-content mt-3" hidden="" aria-hidden="true">

                                                <ul class="course-curriculum-list">
                                                    <li>
                                                        <a href="#modal-example" uk-toggle="">
                                                            Headings
                                                            <span> 4 min </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#modal-example" uk-toggle="">
                                                            Paragraphs
                                                            <span> 5 min </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#modal-example" uk-toggle="">
                                                            Emphasis and Strong Tag
                                                            <span> 8 min </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#modal-example" uk-toggle="">
                                                            Brain Streak
                                                            <span> 4 min </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#modal-example" uk-toggle="">
                                                            Live Preview Feature
                                                            <span> 5 min </span>
                                                        </a>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                        <div class="pt-2">
                                            <a class="uk-accordion-title text-md mx-2 font-semibold" href="#">
                                                <div class="mb-1 text-sm font-medium"> Section 3 </div> Build Complete
                                                Webste
                                            </a>
                                            <div class="uk-accordion-content mt-3" hidden="" aria-hidden="true">

                                                <ul class="course-curriculum-list font-medium">
                                                    <li>
                                                        <a href="#">
                                                            The paragraph tag
                                                            <span class="hidden"> 4 min </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            The break tag
                                                            <span class="hidden"> 5 min </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            Headings in HTML
                                                            <span class="hidden"> 8 min </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            Bold, Italics Underline
                                                            <span class="hidden"> 4 min </span>
                                                        </a>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3 class="mb-4 text-lg font-semibold"> Quizzes</h3>
                                    <ul>
                                        <li><a href="#">
                                                <ion-icon name="timer-outline" class="side-icon md hydrated" role="img" aria-label="timer outline"></ion-icon> Taking small
                                                eco-friendly steps
                                            </a></li>
                                        <li><a href="#">
                                                <ion-icon name="timer-outline" class="side-icon md hydrated" role="img" aria-label="timer outline"></ion-icon> Making your house
                                                eco-friendly
                                            </a></li>
                                        <li><a href="#">
                                                <ion-icon name="timer-outline" class="side-icon md hydrated" role="img" aria-label="timer outline"></ion-icon> Building and
                                                renovating for eco-friendly homes
                                            </a></li>
                                        <li><a href="#">
                                                <ion-icon name="log-in-outline" class="side-icon md hydrated" role="img" aria-label="log in outline"></ion-icon> Taking small
                                                eco-friendly
                                            </a>
                                            <ul>
                                                <li><a href="#"> Making your house </a></li>
                                                <li><a href="#"> Building and renovating </a></li>
                                                <li><a href="#"> Taking small </a></li>
                                            </ul>
                                        </li>
                                    </ul>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: 350px; height: 758px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;">
                    </div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                    <div class="simplebar-scrollbar" style="height: 702px; transform: translate3d(0px, 0px, 0px); visibility: visible;"></div>
                </div>
            </div>

            <!-- overly for mobile -->
            <div class="side_overly" uk-toggle="target: #wrapper ; cls: is-collapse is-active"></div>

        </div>

        <!-- Main Contents -->
        <div class="main_content">
            @yield('content')


        </div>

        <!-- This is the modal -->
        <div id="modal-example" class="lg:ml-80 uk-modal" uk-modal="">
            <div class="uk-modal-dialog uk-modal-body rounded-md shadow-xl">

                <button class="absolute block top-0 right-0 m-6 rounded-full bg-gray-100 leading-4 p-1 text-2xl uk-modal-close" type="button">
                    <i class="icon-feather-x"></i>
                </button>

                <div class="text-sm mb-2"> Section 2 </div>
                <h2 class="mb-5 font-semibold text-2xl"> Your First webpage </h2>
                <p class="text-base">Do You want to skip the rest of this chapter and chumb to next chapter.</p>

                <div class="text-right  pt-3 mt-3">
                    <a href="#" class="py-2 inline-block px-8 rounded-md hover:bg-gray-200 uk-modal-close"> Stay </a>
                    <a href="#" class="button"> Continue </a>
                </div>
            </div>
        </div>


    </div>


    <!-- Javascript
    ================================================== -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('backend/assets/js/uikit.js') }}"></script>
    <script src="{{ asset('backend/assets/js/tippy.all.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/simplebar.js') }}"></script>
    <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
    <script src="{{ asset('backendassets/js/bootstrap-select.min.js') }}"></script>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>






</body>

</html>
