@extends('layouts.master_dashboard_layout')
@section('main_content')
<div class="flex items-center justify-between py-5 lg:py-6 mt-6 flex flex-col items-center justify-between space-y-2 text-center sm:flex-row sm:space-y-0 sm:text-left">
    <div>
        <h3 class="text-xl font-semibold text-slate-700 dark:text-navy-100">
            SMME Workspace Board
        </h3>
        <p class="mt-1 hidden sm:block"></p>
    </div>
    <a href="{{ route('smme.organization-workspace.create', ['prefix' => 'admin']) }}" class="btn space-x-2 bg-primary font-medium text-white shadow-lg shadow-primary/50 hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:shadow-accent/50 dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-indigo-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
        <span> New Organization </span>
    </a>
</div>

<div class="mt-4 grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
    <div class="card group col-span-12 lg:col-span-7">
        <div class="mt-3 flex items-center justify-between px-4 sm:px-5">
            <div class="flex flex-1 items-center justify-between space-x-2 sm:flex-initial">
                <h2 class="text-sm+ font-medium tracking-wide text-slate-700 dark:text-navy-100">
                    Server traffic
                </h2>
                <div x-data="usePopper({placement:'bottom-start',offset:4})" @click.outside="isShowPopper &amp;&amp; (isShowPopper = false)" :class="!isShowPopper &amp;&amp; 'sm:opacity-0'" class="inline-flex focus-within:opacity-100 group-hover:opacity-100 sm:opacity-0">
                    <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>

                    <div x-ref="popperRoot" class="popper-root" :class="isShowPopper &amp;&amp; 'show'" style="position: fixed; inset: 0px auto auto 0px; margin: 0px; transform: translate(273px, 176px);" data-popper-placement="bottom-start">
                        <div class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                            <ul>
                                <li>
                                    <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Action</a>
                                </li>
                                <li>
                                    <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Another Action</a>
                                </li>
                                <li>
                                    <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Something else</a>
                                </li>
                            </ul>
                            <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                            <ul>
                                <li>
                                    <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Separated Link</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden justify-between space-x-4 text-xs+ sm:flex" x-data="{activeTab:'tabAll'}">
                <button @click="activeTab = 'tabRecent'" class="font-medium tracking-wide" :class="activeTab === 'tabRecent' &amp;&amp; 'text-primary dark:text-accent-light' ">
                    Last 7 days
                </button>
                <button @click="activeTab = 'tabAll'" class="font-medium tracking-wide text-primary dark:text-accent-light" :class="activeTab === 'tabAll' &amp;&amp; 'text-primary dark:text-accent-light' ">
                    All time
                </button>
            </div>
        </div>
        <div class="ax-transparent-gridline pr-2">
            <div x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.serverTraffic); $el._x_chart.render() });" style="min-height: 275px;">
                <div id="apexchartsqw19xrhg" class="apexcharts-canvas apexchartsqw19xrhg apexcharts-theme-light" style="width: 647px; height: 260px;"><svg id="SvgjsSvg1484" width="647" height="260" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                        <foreignObject x="0" y="0" width="647" height="260">
                            <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 130px;"></div>
                        </foreignObject>
                        <g id="SvgjsG1577" class="apexcharts-yaxis" rel="0" transform="translate(-8, 0)">
                            <g id="SvgjsG1578" class="apexcharts-yaxis-texts-g"></g>
                        </g>
                        <g id="SvgjsG1486" class="apexcharts-inner apexcharts-graphical" transform="translate(2, 30)">
                            <defs id="SvgjsDefs1485">
                                <linearGradient id="SvgjsLinearGradient1488" x1="0" y1="0" x2="0" y2="1">
                                    <stop id="SvgjsStop1489" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                    <stop id="SvgjsStop1490" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                    <stop id="SvgjsStop1491" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                </linearGradient>
                                <clipPath id="gridRectMaskqw19xrhg">
                                    <rect id="SvgjsRect1493" width="657" height="200.73" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                </clipPath>
                                <clipPath id="forecastMaskqw19xrhg"></clipPath>
                                <clipPath id="nonForecastMaskqw19xrhg"></clipPath>
                                <clipPath id="gridRectMarkerMaskqw19xrhg">
                                    <rect id="SvgjsRect1494" width="657" height="200.73" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                </clipPath>
                            </defs>
                            <rect id="SvgjsRect1492" width="16.325" height="196.73" x="268.3750061035156" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient1488)" class="apexcharts-xcrosshairs" y2="196.73" filter="none" fill-opacity="0.9" x1="268.3750061035156" x2="268.3750061035156"></rect>
                            <g id="SvgjsG1536" class="apexcharts-grid">
                                <g id="SvgjsG1537" class="apexcharts-gridlines-horizontal">
                                    <line id="SvgjsLine1541" x1="0" y1="32.788333333333334" x2="653" y2="32.788333333333334" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                    <line id="SvgjsLine1542" x1="0" y1="65.57666666666667" x2="653" y2="65.57666666666667" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                    <line id="SvgjsLine1543" x1="0" y1="98.36500000000001" x2="653" y2="98.36500000000001" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                    <line id="SvgjsLine1544" x1="0" y1="131.15333333333334" x2="653" y2="131.15333333333334" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                    <line id="SvgjsLine1545" x1="0" y1="163.94166666666666" x2="653" y2="163.94166666666666" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                </g>
                                <g id="SvgjsG1538" class="apexcharts-gridlines-vertical"></g>
                                <line id="SvgjsLine1548" x1="0" y1="196.73" x2="653" y2="196.73" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                <line id="SvgjsLine1547" x1="0" y1="1" x2="0" y2="196.73" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                            </g>
                            <g id="SvgjsG1539" class="apexcharts-grid-borders">
                                <line id="SvgjsLine1540" x1="0" y1="0" x2="653" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                <line id="SvgjsLine1546" x1="0" y1="196.73" x2="653" y2="196.73" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                            </g>
                            <g id="SvgjsG1495" class="apexcharts-bar-series apexcharts-plot-series">
                                <g id="SvgjsG1496" class="apexcharts-series" rel="1" seriesName="High" data:realIndex="0">
                                    <path id="SvgjsPath1501" d="M 24.4875 191.731 L 24.4875 109.92366666666668 C 24.4875 107.42366666666668 26.9875 104.92366666666668 29.4875 104.92366666666668 L 35.8125 104.92366666666668 C 38.3125 104.92366666666668 40.8125 107.42366666666668 40.8125 109.92366666666668 L 40.8125 191.731 C 40.8125 194.231 38.3125 196.731 35.8125 196.731 L 29.4875 196.731 C 26.9875 196.731 24.4875 194.231 24.4875 191.731 Z " fill="rgba(76,78,231,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqw19xrhg)" pathTo="M 24.4875 191.731 L 24.4875 109.92366666666668 C 24.4875 107.42366666666668 26.9875 104.92366666666668 29.4875 104.92366666666668 L 35.8125 104.92366666666668 C 38.3125 104.92366666666668 40.8125 107.42366666666668 40.8125 109.92366666666668 L 40.8125 191.731 C 40.8125 194.231 38.3125 196.731 35.8125 196.731 L 29.4875 196.731 C 26.9875 196.731 24.4875 194.231 24.4875 191.731 Z " pathFrom="M 24.4875 196.731 L 24.4875 196.731 L 40.8125 196.731 L 40.8125 196.731 L 40.8125 196.731 L 40.8125 196.731 L 40.8125 196.731 L 24.4875 196.731 Z" cy="104.92266666666667" cx="106.1125" j="0" val="28" barHeight="91.80733333333332" barWidth="16.325"></path>
                                    <path id="SvgjsPath1503" d="M 106.1125 191.731 L 106.1125 54.1835 C 106.1125 51.6835 108.6125 49.1835 111.1125 49.1835 L 117.4375 49.1835 C 119.9375 49.1835 122.4375 51.6835 122.4375 54.1835 L 122.4375 191.731 C 122.4375 194.231 119.9375 196.731 117.4375 196.731 L 111.1125 196.731 C 108.6125 196.731 106.1125 194.231 106.1125 191.731 Z " fill="rgba(76,78,231,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqw19xrhg)" pathTo="M 106.1125 191.731 L 106.1125 54.1835 C 106.1125 51.6835 108.6125 49.1835 111.1125 49.1835 L 117.4375 49.1835 C 119.9375 49.1835 122.4375 51.6835 122.4375 54.1835 L 122.4375 191.731 C 122.4375 194.231 119.9375 196.731 117.4375 196.731 L 111.1125 196.731 C 108.6125 196.731 106.1125 194.231 106.1125 191.731 Z " pathFrom="M 106.1125 196.731 L 106.1125 196.731 L 122.4375 196.731 L 122.4375 196.731 L 122.4375 196.731 L 122.4375 196.731 L 122.4375 196.731 L 106.1125 196.731 Z" cy="49.182500000000005" cx="187.7375" j="1" val="45" barHeight="147.54749999999999" barWidth="16.325"></path>
                                    <path id="SvgjsPath1505" d="M 187.7375 191.731 L 187.7375 86.97183333333334 C 187.7375 84.47183333333334 190.2375 81.97183333333334 192.7375 81.97183333333334 L 199.0625 81.97183333333334 C 201.5625 81.97183333333334 204.0625 84.47183333333334 204.0625 86.97183333333334 L 204.0625 191.731 C 204.0625 194.231 201.5625 196.731 199.0625 196.731 L 192.7375 196.731 C 190.2375 196.731 187.7375 194.231 187.7375 191.731 Z " fill="rgba(76,78,231,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqw19xrhg)" pathTo="M 187.7375 191.731 L 187.7375 86.97183333333334 C 187.7375 84.47183333333334 190.2375 81.97183333333334 192.7375 81.97183333333334 L 199.0625 81.97183333333334 C 201.5625 81.97183333333334 204.0625 84.47183333333334 204.0625 86.97183333333334 L 204.0625 191.731 C 204.0625 194.231 201.5625 196.731 199.0625 196.731 L 192.7375 196.731 C 190.2375 196.731 187.7375 194.231 187.7375 191.731 Z " pathFrom="M 187.7375 196.731 L 187.7375 196.731 L 204.0625 196.731 L 204.0625 196.731 L 204.0625 196.731 L 204.0625 196.731 L 204.0625 196.731 L 187.7375 196.731 Z" cy="81.97083333333333" cx="269.3625" j="2" val="35" barHeight="114.75916666666666" barWidth="16.325"></path>
                                    <path id="SvgjsPath1507" d="M 269.3625 191.731 L 269.3625 37.78933333333335 C 269.3625 35.28933333333335 271.8625 32.78933333333335 274.3625 32.78933333333335 L 280.6875 32.78933333333335 C 283.1875 32.78933333333335 285.6875 35.28933333333335 285.6875 37.78933333333335 L 285.6875 191.731 C 285.6875 194.231 283.1875 196.731 280.6875 196.731 L 274.3625 196.731 C 271.8625 196.731 269.3625 194.231 269.3625 191.731 Z " fill="rgba(76,78,231,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqw19xrhg)" pathTo="M 269.3625 191.731 L 269.3625 37.78933333333335 C 269.3625 35.28933333333335 271.8625 32.78933333333335 274.3625 32.78933333333335 L 280.6875 32.78933333333335 C 283.1875 32.78933333333335 285.6875 35.28933333333335 285.6875 37.78933333333335 L 285.6875 191.731 C 285.6875 194.231 283.1875 196.731 280.6875 196.731 L 274.3625 196.731 C 271.8625 196.731 269.3625 194.231 269.3625 191.731 Z " pathFrom="M 269.3625 196.731 L 269.3625 196.731 L 285.6875 196.731 L 285.6875 196.731 L 285.6875 196.731 L 285.6875 196.731 L 285.6875 196.731 L 269.3625 196.731 Z" cy="32.788333333333355" cx="350.9875" j="3" val="50" barHeight="163.94166666666663" barWidth="16.325"></path>
                                    <path id="SvgjsPath1509" d="M 350.9875 191.731 L 350.9875 96.80833333333334 C 350.9875 94.30833333333334 353.4875 91.80833333333334 355.9875 91.80833333333334 L 362.3125 91.80833333333334 C 364.8125 91.80833333333334 367.3125 94.30833333333334 367.3125 96.80833333333334 L 367.3125 191.731 C 367.3125 194.231 364.8125 196.731 362.3125 196.731 L 355.9875 196.731 C 353.4875 196.731 350.9875 194.231 350.9875 191.731 Z " fill="rgba(76,78,231,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqw19xrhg)" pathTo="M 350.9875 191.731 L 350.9875 96.80833333333334 C 350.9875 94.30833333333334 353.4875 91.80833333333334 355.9875 91.80833333333334 L 362.3125 91.80833333333334 C 364.8125 91.80833333333334 367.3125 94.30833333333334 367.3125 96.80833333333334 L 367.3125 191.731 C 367.3125 194.231 364.8125 196.731 362.3125 196.731 L 355.9875 196.731 C 353.4875 196.731 350.9875 194.231 350.9875 191.731 Z " pathFrom="M 350.9875 196.731 L 350.9875 196.731 L 367.3125 196.731 L 367.3125 196.731 L 367.3125 196.731 L 367.3125 196.731 L 367.3125 196.731 L 350.9875 196.731 Z" cy="91.80733333333333" cx="432.6125" j="4" val="32" barHeight="104.92266666666666" barWidth="16.325"></path>
                                    <path id="SvgjsPath1511" d="M 432.6125 191.731 L 432.6125 21.39516666666668 C 432.6125 18.89516666666668 435.1125 16.39516666666668 437.6125 16.39516666666668 L 443.9375 16.39516666666668 C 446.4375 16.39516666666668 448.9375 18.89516666666668 448.9375 21.39516666666668 L 448.9375 191.731 C 448.9375 194.231 446.4375 196.731 443.9375 196.731 L 437.6125 196.731 C 435.1125 196.731 432.6125 194.231 432.6125 191.731 Z " fill="rgba(76,78,231,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqw19xrhg)" pathTo="M 432.6125 191.731 L 432.6125 21.39516666666668 C 432.6125 18.89516666666668 435.1125 16.39516666666668 437.6125 16.39516666666668 L 443.9375 16.39516666666668 C 446.4375 16.39516666666668 448.9375 18.89516666666668 448.9375 21.39516666666668 L 448.9375 191.731 C 448.9375 194.231 446.4375 196.731 443.9375 196.731 L 437.6125 196.731 C 435.1125 196.731 432.6125 194.231 432.6125 191.731 Z " pathFrom="M 432.6125 196.731 L 432.6125 196.731 L 448.9375 196.731 L 448.9375 196.731 L 448.9375 196.731 L 448.9375 196.731 L 448.9375 196.731 L 432.6125 196.731 Z" cy="16.394166666666678" cx="514.2375" j="5" val="55" barHeight="180.3358333333333" barWidth="16.325"></path>
                                    <path id="SvgjsPath1513" d="M 514.2375 191.731 L 514.2375 126.31783333333334 C 514.2375 123.81783333333334 516.7375 121.31783333333334 519.2375 121.31783333333334 L 525.5625 121.31783333333334 C 528.0625 121.31783333333334 530.5625 123.81783333333334 530.5625 126.31783333333334 L 530.5625 191.731 C 530.5625 194.231 528.0625 196.731 525.5625 196.731 L 519.2375 196.731 C 516.7375 196.731 514.2375 194.231 514.2375 191.731 Z " fill="rgba(76,78,231,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqw19xrhg)" pathTo="M 514.2375 191.731 L 514.2375 126.31783333333334 C 514.2375 123.81783333333334 516.7375 121.31783333333334 519.2375 121.31783333333334 L 525.5625 121.31783333333334 C 528.0625 121.31783333333334 530.5625 123.81783333333334 530.5625 126.31783333333334 L 530.5625 191.731 C 530.5625 194.231 528.0625 196.731 525.5625 196.731 L 519.2375 196.731 C 516.7375 196.731 514.2375 194.231 514.2375 191.731 Z " pathFrom="M 514.2375 196.731 L 514.2375 196.731 L 530.5625 196.731 L 530.5625 196.731 L 530.5625 196.731 L 530.5625 196.731 L 530.5625 196.731 L 514.2375 196.731 Z" cy="121.31683333333334" cx="595.8625" j="6" val="23" barHeight="75.41316666666665" barWidth="16.325"></path>
                                    <path id="SvgjsPath1515" d="M 595.8625 191.731 L 595.8625 5.001 C 595.8625 2.5010000000000003 598.3625 0.001 600.8625 0.001 L 607.1875 0.001 C 609.6875 0.001 612.1875 2.501 612.1875 5.001 L 612.1875 191.731 C 612.1875 194.231 609.6875 196.731 607.1875 196.731 L 600.8625 196.731 C 598.3625 196.731 595.8625 194.231 595.8625 191.731 Z " fill="rgba(76,78,231,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqw19xrhg)" pathTo="M 595.8625 191.731 L 595.8625 5.001 C 595.8625 2.5010000000000003 598.3625 0.001 600.8625 0.001 L 607.1875 0.001 C 609.6875 0.001 612.1875 2.501 612.1875 5.001 L 612.1875 191.731 C 612.1875 194.231 609.6875 196.731 607.1875 196.731 L 600.8625 196.731 C 598.3625 196.731 595.8625 194.231 595.8625 191.731 Z " pathFrom="M 595.8625 196.731 L 595.8625 196.731 L 612.1875 196.731 L 612.1875 196.731 L 612.1875 196.731 L 612.1875 196.731 L 612.1875 196.731 L 595.8625 196.731 Z" cy="0" cx="677.4875" j="7" val="60" barHeight="196.73" barWidth="16.325"></path>
                                    <g id="SvgjsG1498" class="apexcharts-bar-goals-markers">
                                        <g id="SvgjsG1500" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskqw19xrhg)"></g>
                                        <g id="SvgjsG1502" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskqw19xrhg)"></g>
                                        <g id="SvgjsG1504" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskqw19xrhg)"></g>
                                        <g id="SvgjsG1506" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskqw19xrhg)"></g>
                                        <g id="SvgjsG1508" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskqw19xrhg)"></g>
                                        <g id="SvgjsG1510" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskqw19xrhg)"></g>
                                        <g id="SvgjsG1512" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskqw19xrhg)"></g>
                                        <g id="SvgjsG1514" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskqw19xrhg)"></g>
                                    </g>
                                    <g id="SvgjsG1499" class="apexcharts-bar-shadows apexcharts-hidden-element-shown"></g>
                                </g>
                                <g id="SvgjsG1516" class="apexcharts-series" rel="2" seriesName="Low" data:realIndex="1">
                                    <path id="SvgjsPath1521" d="M 40.8125 191.731 L 40.8125 155.82733333333334 C 40.8125 153.32733333333334 43.3125 150.82733333333334 45.8125 150.82733333333334 L 52.1375 150.82733333333334 C 54.6375 150.82733333333334 57.1375 153.32733333333334 57.1375 155.82733333333334 L 57.1375 191.731 C 57.1375 194.231 54.6375 196.731 52.1375 196.731 L 45.8125 196.731 C 43.3125 196.731 40.8125 194.231 40.8125 191.731 Z " fill="rgba(14,165,233,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskqw19xrhg)" pathTo="M 40.8125 191.731 L 40.8125 155.82733333333334 C 40.8125 153.32733333333334 43.3125 150.82733333333334 45.8125 150.82733333333334 L 52.1375 150.82733333333334 C 54.6375 150.82733333333334 57.1375 153.32733333333334 57.1375 155.82733333333334 L 57.1375 191.731 C 57.1375 194.231 54.6375 196.731 52.1375 196.731 L 45.8125 196.731 C 43.3125 196.731 40.8125 194.231 40.8125 191.731 Z " pathFrom="M 40.8125 196.731 L 40.8125 196.731 L 57.1375 196.731 L 57.1375 196.731 L 57.1375 196.731 L 57.1375 196.731 L 57.1375 196.731 L 40.8125 196.731 Z" cy="150.82633333333334" cx="122.4375" j="0" val="14" barHeight="45.90366666666666" barWidth="16.325"></path>
                                    <path id="SvgjsPath1523" d="M 122.4375 191.731 L 122.4375 119.76016666666668 C 122.4375 117.26016666666668 124.9375 114.76016666666668 127.4375 114.76016666666668 L 133.7625 114.76016666666668 C 136.2625 114.76016666666668 138.7625 117.26016666666668 138.7625 119.76016666666668 L 138.7625 191.731 C 138.7625 194.231 136.2625 196.731 133.7625 196.731 L 127.4375 196.731 C 124.9375 196.731 122.4375 194.231 122.4375 191.731 Z " fill="rgba(14,165,233,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskqw19xrhg)" pathTo="M 122.4375 191.731 L 122.4375 119.76016666666668 C 122.4375 117.26016666666668 124.9375 114.76016666666668 127.4375 114.76016666666668 L 133.7625 114.76016666666668 C 136.2625 114.76016666666668 138.7625 117.26016666666668 138.7625 119.76016666666668 L 138.7625 191.731 C 138.7625 194.231 136.2625 196.731 133.7625 196.731 L 127.4375 196.731 C 124.9375 196.731 122.4375 194.231 122.4375 191.731 Z " pathFrom="M 122.4375 196.731 L 122.4375 196.731 L 138.7625 196.731 L 138.7625 196.731 L 138.7625 196.731 L 138.7625 196.731 L 138.7625 196.731 L 122.4375 196.731 Z" cy="114.75916666666667" cx="204.0625" j="1" val="25" barHeight="81.97083333333332" barWidth="16.325"></path>
                                    <path id="SvgjsPath1525" d="M 204.0625 191.731 L 204.0625 136.15433333333334 C 204.0625 133.65433333333334 206.5625 131.15433333333334 209.0625 131.15433333333334 L 215.3875 131.15433333333334 C 217.8875 131.15433333333334 220.3875 133.65433333333334 220.3875 136.15433333333334 L 220.3875 191.731 C 220.3875 194.231 217.8875 196.731 215.3875 196.731 L 209.0625 196.731 C 206.5625 196.731 204.0625 194.231 204.0625 191.731 Z " fill="rgba(14,165,233,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskqw19xrhg)" pathTo="M 204.0625 191.731 L 204.0625 136.15433333333334 C 204.0625 133.65433333333334 206.5625 131.15433333333334 209.0625 131.15433333333334 L 215.3875 131.15433333333334 C 217.8875 131.15433333333334 220.3875 133.65433333333334 220.3875 136.15433333333334 L 220.3875 191.731 C 220.3875 194.231 217.8875 196.731 215.3875 196.731 L 209.0625 196.731 C 206.5625 196.731 204.0625 194.231 204.0625 191.731 Z " pathFrom="M 204.0625 196.731 L 204.0625 196.731 L 220.3875 196.731 L 220.3875 196.731 L 220.3875 196.731 L 220.3875 196.731 L 220.3875 196.731 L 204.0625 196.731 Z" cy="131.15333333333334" cx="285.6875" j="2" val="20" barHeight="65.57666666666665" barWidth="16.325"></path>
                                    <path id="SvgjsPath1527" d="M 285.6875 191.731 L 285.6875 119.76016666666668 C 285.6875 117.26016666666668 288.1875 114.76016666666668 290.6875 114.76016666666668 L 297.0125 114.76016666666668 C 299.5125 114.76016666666668 302.0125 117.26016666666668 302.0125 119.76016666666668 L 302.0125 191.731 C 302.0125 194.231 299.5125 196.731 297.0125 196.731 L 290.6875 196.731 C 288.1875 196.731 285.6875 194.231 285.6875 191.731 Z " fill="rgba(14,165,233,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskqw19xrhg)" pathTo="M 285.6875 191.731 L 285.6875 119.76016666666668 C 285.6875 117.26016666666668 288.1875 114.76016666666668 290.6875 114.76016666666668 L 297.0125 114.76016666666668 C 299.5125 114.76016666666668 302.0125 117.26016666666668 302.0125 119.76016666666668 L 302.0125 191.731 C 302.0125 194.231 299.5125 196.731 297.0125 196.731 L 290.6875 196.731 C 288.1875 196.731 285.6875 194.231 285.6875 191.731 Z " pathFrom="M 285.6875 196.731 L 285.6875 196.731 L 302.0125 196.731 L 302.0125 196.731 L 302.0125 196.731 L 302.0125 196.731 L 302.0125 196.731 L 285.6875 196.731 Z" cy="114.75916666666667" cx="367.3125" j="3" val="25" barHeight="81.97083333333332" barWidth="16.325"></path>
                                    <path id="SvgjsPath1529" d="M 367.3125 191.731 L 367.3125 162.385 C 367.3125 159.885 369.8125 157.385 372.3125 157.385 L 378.6375 157.385 C 381.1375 157.385 383.6375 159.885 383.6375 162.385 L 383.6375 191.731 C 383.6375 194.231 381.1375 196.731 378.6375 196.731 L 372.3125 196.731 C 369.8125 196.731 367.3125 194.231 367.3125 191.731 Z " fill="rgba(14,165,233,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskqw19xrhg)" pathTo="M 367.3125 191.731 L 367.3125 162.385 C 367.3125 159.885 369.8125 157.385 372.3125 157.385 L 378.6375 157.385 C 381.1375 157.385 383.6375 159.885 383.6375 162.385 L 383.6375 191.731 C 383.6375 194.231 381.1375 196.731 378.6375 196.731 L 372.3125 196.731 C 369.8125 196.731 367.3125 194.231 367.3125 191.731 Z " pathFrom="M 367.3125 196.731 L 367.3125 196.731 L 383.6375 196.731 L 383.6375 196.731 L 383.6375 196.731 L 383.6375 196.731 L 383.6375 196.731 L 367.3125 196.731 Z" cy="157.384" cx="448.9375" j="4" val="12" barHeight="39.346" barWidth="16.325"></path>
                                    <path id="SvgjsPath1531" d="M 448.9375 191.731 L 448.9375 136.15433333333334 C 448.9375 133.65433333333334 451.4375 131.15433333333334 453.9375 131.15433333333334 L 460.2625 131.15433333333334 C 462.7625 131.15433333333334 465.2625 133.65433333333334 465.2625 136.15433333333334 L 465.2625 191.731 C 465.2625 194.231 462.7625 196.731 460.2625 196.731 L 453.9375 196.731 C 451.4375 196.731 448.9375 194.231 448.9375 191.731 Z " fill="rgba(14,165,233,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskqw19xrhg)" pathTo="M 448.9375 191.731 L 448.9375 136.15433333333334 C 448.9375 133.65433333333334 451.4375 131.15433333333334 453.9375 131.15433333333334 L 460.2625 131.15433333333334 C 462.7625 131.15433333333334 465.2625 133.65433333333334 465.2625 136.15433333333334 L 465.2625 191.731 C 465.2625 194.231 462.7625 196.731 460.2625 196.731 L 453.9375 196.731 C 451.4375 196.731 448.9375 194.231 448.9375 191.731 Z " pathFrom="M 448.9375 196.731 L 448.9375 196.731 L 465.2625 196.731 L 465.2625 196.731 L 465.2625 196.731 L 465.2625 196.731 L 465.2625 196.731 L 448.9375 196.731 Z" cy="131.15333333333334" cx="530.5625" j="5" val="20" barHeight="65.57666666666665" barWidth="16.325"></path>
                                    <path id="SvgjsPath1533" d="M 530.5625 191.731 L 530.5625 152.5485 C 530.5625 150.0485 533.0625 147.5485 535.5625 147.5485 L 541.8875 147.5485 C 544.3875 147.5485 546.8875 150.0485 546.8875 152.5485 L 546.8875 191.731 C 546.8875 194.231 544.3875 196.731 541.8875 196.731 L 535.5625 196.731 C 533.0625 196.731 530.5625 194.231 530.5625 191.731 Z " fill="rgba(14,165,233,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskqw19xrhg)" pathTo="M 530.5625 191.731 L 530.5625 152.5485 C 530.5625 150.0485 533.0625 147.5485 535.5625 147.5485 L 541.8875 147.5485 C 544.3875 147.5485 546.8875 150.0485 546.8875 152.5485 L 546.8875 191.731 C 546.8875 194.231 544.3875 196.731 541.8875 196.731 L 535.5625 196.731 C 533.0625 196.731 530.5625 194.231 530.5625 191.731 Z " pathFrom="M 530.5625 196.731 L 530.5625 196.731 L 546.8875 196.731 L 546.8875 196.731 L 546.8875 196.731 L 546.8875 196.731 L 546.8875 196.731 L 530.5625 196.731 Z" cy="147.54749999999999" cx="612.1875" j="6" val="15" barHeight="49.1825" barWidth="16.325"></path>
                                    <path id="SvgjsPath1535" d="M 612.1875 191.731 L 612.1875 136.15433333333334 C 612.1875 133.65433333333334 614.6875 131.15433333333334 617.1875 131.15433333333334 L 623.5125 131.15433333333334 C 626.0125 131.15433333333334 628.5125 133.65433333333334 628.5125 136.15433333333334 L 628.5125 191.731 C 628.5125 194.231 626.0125 196.731 623.5125 196.731 L 617.1875 196.731 C 614.6875 196.731 612.1875 194.231 612.1875 191.731 Z " fill="rgba(14,165,233,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskqw19xrhg)" pathTo="M 612.1875 191.731 L 612.1875 136.15433333333334 C 612.1875 133.65433333333334 614.6875 131.15433333333334 617.1875 131.15433333333334 L 623.5125 131.15433333333334 C 626.0125 131.15433333333334 628.5125 133.65433333333334 628.5125 136.15433333333334 L 628.5125 191.731 C 628.5125 194.231 626.0125 196.731 623.5125 196.731 L 617.1875 196.731 C 614.6875 196.731 612.1875 194.231 612.1875 191.731 Z " pathFrom="M 612.1875 196.731 L 612.1875 196.731 L 628.5125 196.731 L 628.5125 196.731 L 628.5125 196.731 L 628.5125 196.731 L 628.5125 196.731 L 612.1875 196.731 Z" cy="131.15333333333334" cx="693.8125" j="7" val="20" barHeight="65.57666666666665" barWidth="16.325"></path>
                                    <g id="SvgjsG1518" class="apexcharts-bar-goals-markers">
                                        <g id="SvgjsG1520" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskqw19xrhg)"></g>
                                        <g id="SvgjsG1522" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskqw19xrhg)"></g>
                                        <g id="SvgjsG1524" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskqw19xrhg)"></g>
                                        <g id="SvgjsG1526" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskqw19xrhg)"></g>
                                        <g id="SvgjsG1528" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskqw19xrhg)"></g>
                                        <g id="SvgjsG1530" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskqw19xrhg)"></g>
                                        <g id="SvgjsG1532" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskqw19xrhg)"></g>
                                        <g id="SvgjsG1534" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskqw19xrhg)"></g>
                                    </g>
                                    <g id="SvgjsG1519" class="apexcharts-bar-shadows apexcharts-hidden-element-shown"></g>
                                </g>
                                <g id="SvgjsG1497" class="apexcharts-datalabels apexcharts-hidden-element-shown" data:realIndex="0"></g>
                                <g id="SvgjsG1517" class="apexcharts-datalabels apexcharts-hidden-element-shown" data:realIndex="1"></g>
                            </g>
                            <line id="SvgjsLine1549" x1="0" y1="0" x2="653" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                            <line id="SvgjsLine1550" x1="0" y1="0" x2="653" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                            <g id="SvgjsG1551" class="apexcharts-xaxis" transform="translate(0, 0)">
                                <g id="SvgjsG1552" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text id="SvgjsText1554" font-family="Helvetica, Arial, sans-serif" x="40.8125" y="225.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                        <tspan id="SvgjsTspan1555">Jan</tspan>
                                        <title>Jan</title>
                                    </text><text id="SvgjsText1557" font-family="Helvetica, Arial, sans-serif" x="122.4375" y="225.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                        <tspan id="SvgjsTspan1558">Feb</tspan>
                                        <title>Feb</title>
                                    </text><text id="SvgjsText1560" font-family="Helvetica, Arial, sans-serif" x="204.0625" y="225.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                        <tspan id="SvgjsTspan1561">Mar</tspan>
                                        <title>Mar</title>
                                    </text><text id="SvgjsText1563" font-family="Helvetica, Arial, sans-serif" x="285.6875" y="225.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                        <tspan id="SvgjsTspan1564">Apr</tspan>
                                        <title>Apr</title>
                                    </text><text id="SvgjsText1566" font-family="Helvetica, Arial, sans-serif" x="367.3125" y="225.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                        <tspan id="SvgjsTspan1567">May</tspan>
                                        <title>May</title>
                                    </text><text id="SvgjsText1569" font-family="Helvetica, Arial, sans-serif" x="448.9375" y="225.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                        <tspan id="SvgjsTspan1570">Jun</tspan>
                                        <title>Jun</title>
                                    </text><text id="SvgjsText1572" font-family="Helvetica, Arial, sans-serif" x="530.5625" y="225.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                        <tspan id="SvgjsTspan1573">Jul</tspan>
                                        <title>Jul</title>
                                    </text><text id="SvgjsText1575" font-family="Helvetica, Arial, sans-serif" x="612.1875" y="225.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                        <tspan id="SvgjsTspan1576">Aug</tspan>
                                        <title>Aug</title>
                                    </text></g>
                            </g>
                            <g id="SvgjsG1579" class="apexcharts-yaxis-annotations"></g>
                            <g id="SvgjsG1580" class="apexcharts-xaxis-annotations"></g>
                            <g id="SvgjsG1581" class="apexcharts-point-annotations"></g>
                        </g>
                    </svg>
                    <div class="apexcharts-tooltip apexcharts-theme-light" style="left: 278.538px; top: 25px;">
                        <div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">Apr</div>
                        <div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgba(76, 78, 231, 0.85);"></span>
                            <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">High: </span><span class="apexcharts-tooltip-text-y-value">50</span></div>
                                <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                            </div>
                        </div>
                        <div class="apexcharts-tooltip-series-group" style="order: 2; display: none;"><span class="apexcharts-tooltip-marker" style="background-color: rgba(76, 78, 231, 0.85);"></span>
                            <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">High: </span><span class="apexcharts-tooltip-text-y-value">50</span></div>
                                <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                        <div class="apexcharts-yaxistooltip-text"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="order-first col-span-12 grid grid-cols-2 gap-4 sm:order-none sm:gap-5 lg:col-span-5 lg:gap-6">
        <div class="card row-span-2 justify-between py-5 px-2 text-center">
            <p class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                CPU Usage
            </p>

            <div class="ax-transparent-gridline pr-1">
                <div x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.cpuUsage); $el._x_chart.render() });" style="min-height: 102px;">
                    <div id="apexchartspo7r71py" class="apexcharts-canvas apexchartspo7r71py apexcharts-theme-light" style="width: 199px; height: 102px;"><svg id="SvgjsSvg1582" width="199" height="102" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                            <foreignObject x="0" y="0" width="199" height="102">
                                <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml"></div>
                            </foreignObject>
                            <g id="SvgjsG1584" class="apexcharts-inner apexcharts-graphical" transform="translate(-10.5, 1)">
                                <defs id="SvgjsDefs1583">
                                    <clipPath id="gridRectMaskpo7r71py">
                                        <rect id="SvgjsRect1585" width="226" height="204" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                    </clipPath>
                                    <clipPath id="forecastMaskpo7r71py"></clipPath>
                                    <clipPath id="nonForecastMaskpo7r71py"></clipPath>
                                    <clipPath id="gridRectMarkerMaskpo7r71py">
                                        <rect id="SvgjsRect1586" width="224" height="202" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                    </clipPath>
                                </defs>
                                <g id="SvgjsG1587" class="apexcharts-radialbar">
                                    <g id="SvgjsG1588">
                                        <g id="SvgjsG1589" class="apexcharts-tracks">
                                            <g id="SvgjsG1590" class="apexcharts-radialbar-track apexcharts-track" rel="1">
                                                <path id="apexcharts-radialbarTrack-0" d="M 47.134146341463406 98.99999999999999 A 62.865853658536594 62.865853658536594 0 0 1 172.8658536585366 99 " fill="none" fill-opacity="1" stroke="rgba(242,242,242,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="18.571951219512197" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 47.134146341463406 98.99999999999999 A 62.865853658536594 62.865853658536594 0 0 1 172.8658536585366 99 "></path>
                                            </g>
                                        </g>
                                        <g id="SvgjsG1592">
                                            <g id="SvgjsG1596" class="apexcharts-series apexcharts-radial-series" seriesName="AveragexResults" rel="1" data:realIndex="0">
                                                <path id="SvgjsPath1597" d="M 47.134146341463406 98.99999999999999 A 62.865853658536594 62.865853658536594 0 0 1 155.97717477861983 56.12559090094902 " fill="none" fill-opacity="0.85" stroke="rgba(14,165,233,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="19.146341463414636" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="137" data:value="76" index="0" j="0" data:pathOrig="M 47.134146341463406 98.99999999999999 A 62.865853658536594 62.865853658536594 0 0 1 155.97717477861983 56.12559090094902 "></path>
                                            </g>
                                            <circle id="SvgjsCircle1593" r="48.57987804878049" cx="110" cy="99" class="apexcharts-radialbar-hollow" fill="transparent"></circle>
                                            <g id="SvgjsG1594" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)" style="opacity: 1;"><text id="SvgjsText1595" font-family="Helvetica, Arial, sans-serif" x="110" y="97" text-anchor="middle" dominant-baseline="auto" font-size="18px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-datalabel-value" style="font-family: Helvetica, Arial, sans-serif;">76%</text></g>
                                        </g>
                                    </g>
                                </g>
                                <line id="SvgjsLine1598" x1="0" y1="0" x2="220" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                <line id="SvgjsLine1599" x1="0" y1="0" x2="220" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                            </g>
                        </svg></div>
                </div>
            </div>

            <p class="mt-4 text-xs+">
                Daily usage is
                <span class="font-medium text-slate-700 dark:text-navy-100">Good</span>
            </p>
        </div>
        <div class="card justify-center p-4">
            <div class="flex items-center space-x-3">
                <div>
                    <div x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.storageUsage); $el._x_chart.render() });" style="min-height: 50.7px;">
                        <div id="apexchartswum61el9" class="apexcharts-canvas apexchartswum61el9 apexcharts-theme-light" style="width: 50px; height: 50.7px;"><svg id="SvgjsSvg1448" width="50" height="50.7" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                <foreignObject x="0" y="0" width="50" height="50.7">
                                    <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml"></div>
                                </foreignObject>
                                <g id="SvgjsG1450" class="apexcharts-inner apexcharts-graphical" transform="translate(-15, -15)">
                                    <defs id="SvgjsDefs1449">
                                        <clipPath id="gridRectMaskwum61el9">
                                            <rect id="SvgjsRect1451" width="86" height="118" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="forecastMaskwum61el9"></clipPath>
                                        <clipPath id="nonForecastMaskwum61el9"></clipPath>
                                        <clipPath id="gridRectMarkerMaskwum61el9">
                                            <rect id="SvgjsRect1452" width="84" height="116" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                    </defs>
                                    <g id="SvgjsG1453" class="apexcharts-radialbar">
                                        <g id="SvgjsG1454">
                                            <g id="SvgjsG1455" class="apexcharts-tracks">
                                                <g id="SvgjsG1456" class="apexcharts-radialbar-track apexcharts-track" rel="1">
                                                    <path id="apexcharts-radialbarTrack-0" d="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 1 1 39.99617740968999 18.098171065291247 " fill="none" fill-opacity="1" stroke="rgba(242,242,242,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="3.9592560975609774" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 1 1 39.99617740968999 18.098171065291247 "></path>
                                                </g>
                                            </g>
                                            <g id="SvgjsG1458">
                                                <g id="SvgjsG1462" class="apexcharts-series apexcharts-radial-series" seriesName="series-1" rel="1" data:realIndex="0">
                                                    <path id="SvgjsPath1463" d="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 0 1 46.768037451801064 60.829877444393674 " fill="none" fill-opacity="0.85" stroke="rgba(76,78,231,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="4.081707317073173" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="162" data:value="45" index="0" j="0" data:pathOrig="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 0 1 46.768037451801064 60.829877444393674 "></path>
                                                </g>
                                                <circle id="SvgjsCircle1459" r="14.9222012195122" cx="40" cy="40" class="apexcharts-radialbar-hollow" fill="transparent"></circle>
                                                <g id="SvgjsG1460" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)" style="opacity: 1;"><text id="SvgjsText1461" font-family="Helvetica, Arial, sans-serif" x="40" y="45" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-datalabel-value" style="font-family: Helvetica, Arial, sans-serif;">45%</text></g>
                                            </g>
                                        </g>
                                    </g>
                                    <line id="SvgjsLine1464" x1="0" y1="0" x2="80" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine1465" x1="0" y1="0" x2="80" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                </g>
                            </svg></div>
                    </div>
                </div>
                <div class="text-xs+ font-medium text-slate-700 dark:text-navy-100">
                    Storage Usage
                </div>
            </div>
        </div>
        <div class="card justify-center p-4">
            <div class="flex items-center space-x-3">
                <div>
                    <div x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.memoryUsage); $el._x_chart.render() });" style="min-height: 50.7px;">
                        <div id="apexchartscdgmi28k" class="apexcharts-canvas apexchartscdgmi28k apexcharts-theme-light" style="width: 50px; height: 50.7px;"><svg id="SvgjsSvg1466" width="50" height="50.7" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                <foreignObject x="0" y="0" width="50" height="50.7">
                                    <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml"></div>
                                </foreignObject>
                                <g id="SvgjsG1468" class="apexcharts-inner apexcharts-graphical" transform="translate(-15, -15)">
                                    <defs id="SvgjsDefs1467">
                                        <clipPath id="gridRectMaskcdgmi28k">
                                            <rect id="SvgjsRect1469" width="86" height="118" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="forecastMaskcdgmi28k"></clipPath>
                                        <clipPath id="nonForecastMaskcdgmi28k"></clipPath>
                                        <clipPath id="gridRectMarkerMaskcdgmi28k">
                                            <rect id="SvgjsRect1470" width="84" height="116" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                    </defs>
                                    <g id="SvgjsG1471" class="apexcharts-radialbar">
                                        <g id="SvgjsG1472">
                                            <g id="SvgjsG1473" class="apexcharts-tracks">
                                                <g id="SvgjsG1474" class="apexcharts-radialbar-track apexcharts-track" rel="1">
                                                    <path id="apexcharts-radialbarTrack-0" d="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 1 1 39.99617740968999 18.098171065291247 " fill="none" fill-opacity="1" stroke="rgba(242,242,242,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="3.9592560975609774" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 1 1 39.99617740968999 18.098171065291247 "></path>
                                                </g>
                                            </g>
                                            <g id="SvgjsG1476">
                                                <g id="SvgjsG1480" class="apexcharts-series apexcharts-radial-series" seriesName="series-1" rel="1" data:realIndex="0">
                                                    <path id="SvgjsPath1481" d="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 0 1 46.768037451801064 60.829877444393674 " fill="none" fill-opacity="0.85" stroke="rgba(14,165,233,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="4.081707317073173" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="162" data:value="45" index="0" j="0" data:pathOrig="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 0 1 46.768037451801064 60.829877444393674 "></path>
                                                </g>
                                                <circle id="SvgjsCircle1477" r="14.9222012195122" cx="40" cy="40" class="apexcharts-radialbar-hollow" fill="transparent"></circle>
                                                <g id="SvgjsG1478" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)" style="opacity: 1;"><text id="SvgjsText1479" font-family="Helvetica, Arial, sans-serif" x="40" y="45" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-datalabel-value" style="font-family: Helvetica, Arial, sans-serif;">45%</text></g>
                                            </g>
                                        </g>
                                    </g>
                                    <line id="SvgjsLine1482" x1="0" y1="0" x2="80" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine1483" x1="0" y1="0" x2="80" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                </g>
                            </svg></div>
                    </div>
                </div>
                <div class="text-xs+ font-medium text-slate-700 dark:text-navy-100">
                    Memory Usage
                </div>
            </div>
        </div>
        <div class="card flex-row overflow-hidden">
            <div class="h-full w-1 shrink-0 bg-primary dark:bg-accent"></div>
            <div class="p-4 font-inter">
                <div class="flex items-baseline space-x-2">
                    <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">
                        4.54
                    </p>
                    <p class="text-xs">/12 GB</p>
                </div>
                <p class="text-xs">Daily traffic</p>
            </div>
        </div>
        <div class="card flex-row overflow-hidden">
            <div class="h-full w-1 shrink-0 bg-info"></div>
            <div class="p-4 font-inter">
                <div class="flex items-baseline space-x-2">
                    <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">
                        14.54
                    </p>
                    <p class="text-xs">/12 GB</p>
                </div>
                <p class="text-xs">Hourly traffic</p>
            </div>
        </div>
    </div>
</div>
<div class="mt-4 sm:mt-5 lg:mt-6">
    <div class="flex items-center justify-between">
        <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
            Monitoring Workspaces
        </h2>
        <div class="flex">
            <div class="flex items-center" x-data="{isInputActive:false}">
                <label class="block">
                    <input x-effect="isInputActive === true &amp;&amp; $nextTick(() => { $el.focus()});" :class="isInputActive ? 'w-32 lg:w-48' : 'w-0'" class="form-input bg-transparent px-1 text-right transition-all duration-100 placeholder:text-slate-500 dark:placeholder:text-navy-200 w-0" placeholder="Search here..." type="text">
                </label>
                <button @click="isInputActive = !isInputActive" class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </div>
            <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="isShowPopper &amp;&amp; (isShowPopper = false)" class="inline-flex">
                <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                    </svg>
                </button>
                <div x-ref="popperRoot" class="popper-root" :class="isShowPopper &amp;&amp; 'show'" style="position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate(-64px, 365px);" data-popper-placement="bottom-end">
                    <div class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                        <ul>
                            <li>
                                <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Action</a>
                            </li>
                            <li>
                                <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Another Action</a>
                            </li>
                            <li>
                                <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Something else</a>
                            </li>
                        </ul>
                        <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                        <ul>
                            <li>
                                <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Separated Link</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6">

        @if ($workspaces->isEmpty())
        <p>No workspaces found.</p>
        @else
        @foreach ($workspaces as $workspace)
        <div class="card space-y-6 p-4 sm:px-5">

            <div class="flex items-center justify-between">
                <div>
                    <p class="text-lg font-semibold uppercase text-primary dark:text-accent-light">
                        Id: 5988745
                    </p>
                </div>
                <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="isShowPopper &amp;&amp; (isShowPopper = false)" class="inline-flex">
                    <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn -mr-1.5 size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>

                    <div x-ref="popperRoot" class="popper-root" :class="isShowPopper &amp;&amp; 'show'" style="position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate(-854px, 425px);" data-popper-placement="bottom-end">
                        <div class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                            <ul>
                                <li>
                                    <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Action</a>
                                </li>
                                <li>
                                    <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Another Action</a>
                                </li>
                                <li>
                                    <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Something else</a>
                                </li>
                            </ul>
                            <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                            <ul>
                                <li>
                                    <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Separated Link</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex grow flex-col items-center px-4 pb-5 sm:px-5">
                @if($workspace->smme_logo)
                <div class="avatar size-20">
                    <img class="rounded-full" src="{{ Storage::url($workspace->smme_logo) }}" alt="avatar">
                </div>
                @else
                <div class="avatar size-20">
                    <img class="rounded-full" src="{{ asset('backend/images/Yowza_Icon_400px.png') }}" alt="avatar">
                </div>
                @endif
                <div class="flex grow justify-between space-x-2">
                    <div>
                        <p class="text-xs+ text-slate-400 dark:text-navy-300">
                            Total Member
                        </p>
                        <p class="text-lg font-semibold text-slate-700 dark:text-navy-100">
                            {{ $workspace->users_count }}
                        </p>
                    </div>
                    <div>
                        <p class="text-xs+ text-slate-400 dark:text-navy-300">
                            Rank
                        </p>
                        <p class="text-lg font-semibold text-slate-700 dark:text-navy-100">
                            3.4
                        </p>
                    </div>
                    <div>
                        <p class="text-xs+ text-slate-400 dark:text-navy-300">
                            Memory
                        </p>
                        <p class="text-lg font-semibold text-slate-700 dark:text-navy-100">
                            14 GB
                        </p>
                    </div>
                </div>
                <h3 class="pt-3 text-lg font-medium text-slate-700 dark:text-navy-100">
                    {{ $workspace->smme_business_name }}
                </h3>
                <p class="text-xs+">{{ $workspace->industry }}</p>

                <div class="mt-6 grid w-full grid-cols-2 gap-2">
                    <form method="POST" action="{{ route('smme.workspaces.join', ['prefix' => 'admin', 'workspace' => $workspace]) }}">
                        @csrf
                        <button type="submit" class="btn space-x-2 bg-primary font-medium text-white shadow-lg shadow-primary/50 hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:shadow-accent/50 dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">

                            <span>Join Workspace</span>
                        </button>
                    </form>
                    <button class="btn space-x-2 bg-slate-150 px-0 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                            </path>
                        </svg>
                        <span> Chat </span>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
        @endif

    </div>
</div>
@endsection
