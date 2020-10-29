<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Document</title>
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div class="h-screen flex">
    {{-- sidebar --}}
    <div class="sidebar w-64 px-8 py-4 bg-gray-100 border-r overflow-auto">
        <a href="{{ route('tailwind.index') }}" class="hover:underline">
            <svg class="h-8 w-8 text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11530 8291" fill-rule="evenodd" text-rendering="geometricPrecision" image-rendering="optimizeQuality" clip-rule="evenodd" shape-rendering="geometricPrecision"><path d="M10724 4439c-567-31-1209 338-1388 1054-104 416-12 803 224 1101 201 254 297 516 199 883-116 436-439 685-776 814 385-116 753-377 891-864 113-398 21-718-210-990-348-409-248-1008 42-1412 204-339 582-571 1018-586zM4251 6247c983 39 1558 442 2325 1196 298 293 616 634 970 379-427-54-911-614-1301-912-646-495-1258-705-1995-663zm1078-2909c80-358-113-765-447-927-176-86-359-87-510-20 142-29 303 4 451 107 300 208 440 625 325 948-411 270-662 632-662 1029 0 609 591 1135 1443 1376-716-270-1188-730-1188-1253 0-831 1193-1505 2664-1505 104 0 207 3 308 10-11 28-24 54-40 79-99 157-265 214-431 168 234 104 480 24 591-212 131-279 23-670-241-874-134-103-281-138-412-112 119 3 245 60 354 172 183 188 260 474 203 704-238-46-492-71-755-71-633 0-1211 144-1651 380zm3168-1319c920 223 1571 773 1571 1417 0 841-1112 1523-2485 1523-737 0-1398-197-1853-509 429 194 969 310 1557 310 1395 0 2526-654 2526-1460 0-553-532-1034-1317-1282zm1362 4126c736 24 1323-290 1561-934 436-1179-465-3015-2011-4102-660-464-1331-716-1917-761 515 96 1077 337 1633 727 1559 1096 2466 2947 2027 4135-209 565-685 878-1294 934zm-8026-10C836 5831 143 5182 20 4290-205 2657 1566 829 3977 207 5006-59 5984-62 6786 149 6065 32 5235 71 4369 295 1939 923 153 2766 380 4411c108 783 652 1380 1454 1723zm5014-5047c-865-135-1831-132-2673 100-572 158-1201 462-1426 960-27 60-48 122-62 185s-21 127-21 191c-2 533 456 1006 924 1326 65 44 132 87 200 128-442-331-841-788-839-1298 0-67 8-135 22-201 15-66 36-131 65-194 236-523 896-843 1497-1008 841-232 1798-245 2671-125-120-25-239-46-358-65zM4110 4222c-108 764-753 1351-1533 1351-855 0-1549-706-1549-1577 0-533 260-1004 657-1289-292 275-474 668-474 1104 0 831 661 1504 1477 1504 676 0 1246-462 1422-1093z"/></svg>
        </a>
        <nav class="mt-8">
            <h3 class="text-xs font-semibold text-gray-600 uppercase tracking-wide">Issues</h3>
            <div class="mt-2 -mx-3">
                <a href="#" class="flex justify-between items-center px-3 py-2 bg-gray-200 rounded-lg">
                    <span class="text-sm font-medium text-gray-900">All</span>
                    <span class="text-xs font-semibold text-gray-600">36</span>
                </a>

                <a href="#" class="flex justify-between items-center px-3 py-2 rounded-lg">
                    <span class="text-sm font-medium text-gray-700">Assigned to me</span>
                    <span class="text-xs font-semibold text-gray-600">2</span>
                </a>

                <a href="#" class="flex justify-between items-center px-3 py-2 rounded-lg">
                    <span class="text-sm font-medium text-gray-700">Created by me</span>
                    <span class="text-xs font-semibold text-gray-600">1</span>
                </a>

                <a href="#" class="flex justify-between items-center px-3 py-2 rounded-lg">
                    <span class="text-sm font-medium text-gray-700">Archived</span>
                </a>
            </div>

            <h3 class="text-xs font-semibold mt-8 text-gray-600 uppercase tracking-wide">Tags</h3>
            <div class="mt-2 -mx-3">
                <a href="#" class="flex justify-between items-center px-3 py-2 rounded-lg">
                    <span class="text-sm font-medium text-gray-700">Bug</span>
                </a>

                <a href="#" class="flex justify-between items-center px-3 py-2 rounded-lg">
                    <span class="text-sm font-medium text-gray-700">Feature Request</span>
                </a>

                <a href="#" class="flex justify-between items-center px-3 py-2 rounded-lg">
                    <span class="text-sm font-medium text-gray-700">Marketing</span>
                </a>

                <a href="#" class="flex justify-between items-center px-3 py-2 rounded-lg">
                    <span class="text-sm font-medium text-gray-700">v2.0</span>
                </a>
            </div>
        </nav>
    </div>
    {{-- main --}}
    <div class="flex-1 min-w-0 flex flex-col bg-white">
        {{-- header --}}
        <div class="flex-shrink-0 border-b-2 border-gray-200">
            <header class="px-6">
                <div class="flex justify-between items-center border-b border-gray-200 py-3">
                    <div class="flex-1">
                        <div class="relative w-64">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                <svg class="h-5 w-5 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </span>
                            <input class="rounded-md border border-gray-400 text-sm pl-10 py-2 pr-4 text-gray-900 placeholder-gray-600" type="text" name="search" placeholder="Search">
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button>
                            <svg class="h-6 w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>
                        <button>
                            <img class="h-10 w-10 rounded-full object-cover" src="/images/photo-1571512599285-9ac4fdf3dba9.jpeg" alt="profile pic">
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-between py-2">
                    <div class="flex items-center">
                        <h2 class="text-2xl font-semibold text-gray-900 leading-tight">All Issues</h2>
                        <div class="flex items-center -space-x-2 ml-5">
                            <img class="h-6 w-6 rounded-full object-cover border-2 border-white" src="/images/avitar01.jpg" alt="">
                            <img class="h-6 w-6 rounded-full object-cover border-2 border-white" src="/images/avitar02.jpg" alt="">
                            <img class="h-6 w-6 rounded-full object-cover border-2 border-white" src="/images/avitar03.jpg" alt="">
                            <img class="h-6 w-6 rounded-full object-cover border-2 border-white" src="/images/avitar04.jpg" alt="">
                        </div>
                    </div>
                    <div class="flex">
                        <span class="inline-flex p-1 border bg-gray-200 rounded-md">
                            <button class="px-2 py-1 rounded">
                                <svg class="h-6 w-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                </svg>
                            </button>
                            <button class="px-2 py-1 bg-white rounded shadow">
                                <svg class="h-6 w-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                                </svg>
                            </button>
                        </span>

                        <button class="flex items-center ml-5 pl-2 pr-4 py-2 space-x-3 text-small text-white bg-gray-800 hover:bg-gray-700 rounded-lg">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <span class="ml-1">New Issue</span>
                        </button>
                    </div>
                </div>
            </header>
        </div>
        {{-- Board Content --}}
        <div class="flex-1 overflow-auto">
            <main class="p-3 inline-flex h-full overflow-hidden">
                {{-- col 1 --}}
                <div class="ml-3 flex-shrink-0 flex flex-col bg-gray-200 rounded-md" style="width: 384px">
                    <h3 class="flex-shrink-0 pt-3 px-3 text-sm font-medium text-gray-700">Backlog</h3>
                    <div class="flex-1 min-h-0 overflow-y-auto">
                    <ul class="pt-2 pb-3 px-3">
                        <li>
                            <a href="#" class="block p-5 rounded-md shadow bg-white">
                                <div class="flex justify-between items-baseline">
                                    <p class="text-sm text-gray-900 font-medium">Add discount code to checkout page</p>
                                    <span>
                                        <img class="rounded-full h-6 w-6" src="/images/avitar03.jpg" alt="">
                                    </span>
                                </div>
                                <div class="mt-2 flex justify-between">
                                    <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                    <div class="">
                                        <span class="inline-flex items-center leading-tight bg-teal-100 rounded-md px-2 py-1">
                                            <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                <circle cx="4" cy="4" r="3"/>
                                            </svg>
                                            <span class="text-xs font-medium text-teal-800 ml-2">Feature Request</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="mt-3">
                            <a href="#" class="block p-5 rounded-md shadow bg-white">
                                <div class="flex justify-between items-baseline">
                                    <p class="text-sm text-gray-900 font-medium">Provide documentation on integrations</p>
                                    <span>
                                        <img class="rounded-full h-6 w-6" src="/images/avitar04.jpg" alt="">
                                    </span>
                                </div>
                                <div class="mt-2 flex justify-between">
                                    <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                </div>
                            </a>
                        </li>

                        <li class="mt-3">
                            <a href="#" class="block p-5 rounded-md shadow bg-white">
                                <div class="flex justify-between items-baseline">
                                    <p class="text-sm text-gray-900 font-medium">Design shopping cart dropdown</p>
                                    <span>
                                        <img class="rounded-full h-6 w-6" src="/images/avitar02.jpg" alt="">
                                    </span>
                                </div>
                                <div class="mt-2 flex justify-between">
                                    <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                    <div class="">
                                        <span class="inline-flex items-center leading-tight bg-purple-100 rounded-md px-2 py-1">
                                            <svg class="h-2 w-2 text-purple-500" viewBox="0 0 8 8" fill="currentColor">
                                                <circle cx="4" cy="4" r="3"/>
                                            </svg>
                                            <span class="text-xs font-medium text-purple-800 ml-2">Design</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="mt-3">
                            <a href="#" class="block p-5 rounded-md shadow bg-white">
                                <div class="flex justify-between items-baseline">
                                    <p class="text-sm text-gray-900 font-medium">Add discount code to checkout page</p>
                                    <span>
                                        <img class="rounded-full h-6 w-6" src="/images/avitar03.jpg" alt="">
                                    </span>
                                </div>
                                <div class="mt-2 flex justify-between">
                                    <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                    <div class="">
                                        <span class="inline-flex items-center leading-tight bg-teal-100 rounded-md px-2 py-1">
                                            <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                <circle cx="4" cy="4" r="3"/>
                                            </svg>
                                            <span class="text-xs font-medium text-teal-800 ml-2">Feature Request</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    </div>
                </div>
                {{-- col 2 --}}
                <div class="ml-3 flex-shrink-0 flex flex-col bg-gray-200 rounded-md" style="width: 384px">
                    <h3 class="flex-shrink-0 pt-3 px-3 text-sm font-medium text-gray-700">In Progress</h3>
                    <div class="flex-1 min-h-0 overflow-y-auto">
                    <ul class="pt-2 pb-3 px-3">
                        <li>
                            <a href="#" class="block p-5 rounded-md shadow bg-white">
                                <div class="flex justify-between items-baseline">
                                    <p class="text-sm text-gray-900 font-medium">Add discount code to checkout page</p>
                                    <span>
                                        <img class="rounded-full h-6 w-6" src="/images/avitar03.jpg" alt="">
                                    </span>
                                </div>
                                <div class="mt-2 flex justify-between">
                                    <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                    <div class="">
                                        <span class="inline-flex items-center leading-tight bg-teal-100 rounded-md px-2 py-1">
                                            <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                <circle cx="4" cy="4" r="3"/>
                                            </svg>
                                            <span class="text-xs font-medium text-teal-800 ml-2">Feature Request</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="mt-3">
                            <a href="#" class="block p-5 rounded-md shadow bg-white">
                                <div class="flex justify-between items-baseline">
                                    <p class="text-sm text-gray-900 font-medium">Add discount code to checkout page</p>
                                    <span>
                                        <img class="rounded-full h-6 w-6" src="/images/avitar03.jpg" alt="">
                                    </span>
                                </div>
                                <div class="mt-2 flex justify-between">
                                    <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                    <div class="">
                                        <span class="inline-flex items-center leading-tight bg-teal-100 rounded-md px-2 py-1">
                                            <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                <circle cx="4" cy="4" r="3"/>
                                            </svg>
                                            <span class="text-xs font-medium text-teal-800 ml-2">Feature Request</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="mt-3">
                            <a href="#" class="block p-5 rounded-md shadow bg-white">
                                <div class="flex justify-between items-baseline">
                                    <p class="text-sm text-gray-900 font-medium">Add discount code to checkout page</p>
                                    <span>
                                        <img class="rounded-full h-6 w-6" src="/images/avitar03.jpg" alt="">
                                    </span>
                                </div>
                                <div class="mt-2 flex justify-between">
                                    <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                    <div class="">
                                        <span class="inline-flex items-center leading-tight bg-teal-100 rounded-md px-2 py-1">
                                            <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                <circle cx="4" cy="4" r="3"/>
                                            </svg>
                                            <span class="text-xs font-medium text-teal-800 ml-2">Feature Request</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="mt-3">
                            <a href="#" class="block p-5 rounded-md shadow bg-white">
                                <div class="flex justify-between items-baseline">
                                    <p class="text-sm text-gray-900 font-medium">Add discount code to checkout page</p>
                                    <span>
                                        <img class="rounded-full h-6 w-6" src="/images/avitar03.jpg" alt="">
                                    </span>
                                </div>
                                <div class="mt-2 flex justify-between">
                                    <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                    <div class="">
                                        <span class="inline-flex items-center leading-tight bg-teal-100 rounded-md px-2 py-1">
                                            <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                <circle cx="4" cy="4" r="3"/>
                                            </svg>
                                            <span class="text-xs font-medium text-teal-800 ml-2">Feature Request</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="mt-3">
                            <a href="#" class="block p-5 rounded-md shadow bg-white">
                                <div class="flex justify-between items-baseline">
                                    <p class="text-sm text-gray-900 font-medium">Add discount code to checkout page</p>
                                    <span>
                                        <img class="rounded-full h-6 w-6" src="/images/avitar03.jpg" alt="">
                                    </span>
                                </div>
                                <div class="mt-2 flex justify-between">
                                    <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                    <div class="">
                                        <span class="inline-flex items-center leading-tight bg-teal-100 rounded-md px-2 py-1">
                                            <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                <circle cx="4" cy="4" r="3"/>
                                            </svg>
                                            <span class="text-xs font-medium text-teal-800 ml-2">Feature Request</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="mt-3">
                            <a href="#" class="block p-5 rounded-md shadow bg-white">
                                <div class="flex justify-between items-baseline">
                                    <p class="text-sm text-gray-900 font-medium">Add discount code to checkout page</p>
                                    <span>
                                        <img class="rounded-full h-6 w-6" src="/images/avitar03.jpg" alt="">
                                    </span>
                                </div>
                                <div class="mt-2 flex justify-between">
                                    <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                    <div class="">
                                        <span class="inline-flex items-center leading-tight bg-teal-100 rounded-md px-2 py-1">
                                            <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                <circle cx="4" cy="4" r="3"/>
                                            </svg>
                                            <span class="text-xs font-medium text-teal-800 ml-2">Feature Request</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="mt-3">
                            <a href="#" class="block p-5 rounded-md shadow bg-white">
                                <div class="flex justify-between items-baseline">
                                    <p class="text-sm text-gray-900 font-medium">Add discount code to checkout page</p>
                                    <span>
                                        <img class="rounded-full h-6 w-6" src="/images/avitar03.jpg" alt="">
                                    </span>
                                </div>
                                <div class="mt-2 flex justify-between">
                                    <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                    <div class="">
                                        <span class="inline-flex items-center leading-tight bg-teal-100 rounded-md px-2 py-1">
                                            <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                <circle cx="4" cy="4" r="3"/>
                                            </svg>
                                            <span class="text-xs font-medium text-teal-800 ml-2">Feature Request</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="mt-3">
                            <a href="#" class="block p-5 rounded-md shadow bg-white">
                                <div class="flex justify-between items-baseline">
                                    <p class="text-sm text-gray-900 font-medium">Add discount code to checkout page</p>
                                    <span>
                                        <img class="rounded-full h-6 w-6" src="/images/avitar03.jpg" alt="">
                                    </span>
                                </div>
                                <div class="mt-2 flex justify-between">
                                    <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                    <div class="">
                                        <span class="inline-flex items-center leading-tight bg-teal-100 rounded-md px-2 py-1">
                                            <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                <circle cx="4" cy="4" r="3"/>
                                            </svg>
                                            <span class="text-xs font-medium text-teal-800 ml-2">Feature Request</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="mt-3">
                            <a href="#" class="block p-5 rounded-md shadow bg-white">
                                <div class="flex justify-between items-baseline">
                                    <p class="text-sm text-gray-900 font-medium">Add discount code to checkout page</p>
                                    <span>
                                        <img class="rounded-full h-6 w-6" src="/images/avitar03.jpg" alt="">
                                    </span>
                                </div>
                                <div class="mt-2 flex justify-between">
                                    <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                    <div class="">
                                        <span class="inline-flex items-center leading-tight bg-teal-100 rounded-md px-2 py-1">
                                            <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                <circle cx="4" cy="4" r="3"/>
                                            </svg>
                                            <span class="text-xs font-medium text-teal-800 ml-2">Feature Request</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="mt-3">
                            <a href="#" class="block p-5 rounded-md shadow bg-white">
                                <div class="flex justify-between items-baseline">
                                    <p class="text-sm text-gray-900 font-medium">Add discount code to checkout page</p>
                                    <span>
                                        <img class="rounded-full h-6 w-6" src="/images/avitar03.jpg" alt="">
                                    </span>
                                </div>
                                <div class="mt-2 flex justify-between">
                                    <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                    <div class="">
                                        <span class="inline-flex items-center leading-tight bg-teal-100 rounded-md px-2 py-1">
                                            <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                <circle cx="4" cy="4" r="3"/>
                                            </svg>
                                            <span class="text-xs font-medium text-teal-800 ml-2">Feature Request</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="mt-3">
                            <a href="#" class="block p-5 rounded-md shadow bg-white">
                                <div class="flex justify-between items-baseline">
                                    <p class="text-sm text-gray-900 font-medium">Add discount code to checkout page</p>
                                    <span>
                                        <img class="rounded-full h-6 w-6" src="/images/avitar03.jpg" alt="">
                                    </span>
                                </div>
                                <div class="mt-2 flex justify-between">
                                    <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                    <div class="">
                                        <span class="inline-flex items-center leading-tight bg-teal-100 rounded-md px-2 py-1">
                                            <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                <circle cx="4" cy="4" r="3"/>
                                            </svg>
                                            <span class="text-xs font-medium text-teal-800 ml-2">Feature Request</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="mt-3">
                            <a href="#" class="block p-5 rounded-md shadow bg-white">
                                <div class="flex justify-between items-baseline">
                                    <p class="text-sm text-gray-900 font-medium">Add discount code to checkout page</p>
                                    <span>
                                        <img class="rounded-full h-6 w-6" src="/images/avitar03.jpg" alt="">
                                    </span>
                                </div>
                                <div class="mt-2 flex justify-between">
                                    <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                    <div class="">
                                        <span class="inline-flex items-center leading-tight bg-teal-100 rounded-md px-2 py-1">
                                            <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                <circle cx="4" cy="4" r="3"/>
                                            </svg>
                                            <span class="text-xs font-medium text-teal-800 ml-2">Feature Request</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    </div>
                </div>
                {{-- col 3 --}}
                <div class="ml-3 flex-shrink-0 flex flex-col bg-gray-200 rounded-md" style="width: 384px">
                    <h3 class="flex-shrink-0 pt-3 px-3 text-sm font-medium text-gray-700">Ready For Review</h3>
                    <div class="flex-1 min-h-0 overflow-y-auto">
                    <ul class="pt-2 pb-3 px-3">
                        <li>
                            <a href="#" class="block p-5 rounded-md shadow bg-white">
                                <div class="flex justify-between items-baseline">
                                    <p class="text-sm text-gray-900 font-medium">Add discount code to checkout page</p>
                                    <span>
                                        <img class="rounded-full h-6 w-6" src="/images/avitar03.jpg" alt="">
                                    </span>
                                </div>
                                <div class="mt-2 flex justify-between">
                                    <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                    <div class="">
                                        <span class="inline-flex items-center leading-tight bg-teal-100 rounded-md px-2 py-1">
                                            <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                <circle cx="4" cy="4" r="3"/>
                                            </svg>
                                            <span class="text-xs font-medium text-teal-800 ml-2">Feature Request</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="mt-3">
                            <a href="#" class="block p-5 rounded-md shadow bg-white">
                                <div class="flex justify-between items-baseline">
                                    <p class="text-sm text-gray-900 font-medium">Add discount code to checkout page</p>
                                    <span>
                                        <img class="rounded-full h-6 w-6" src="/images/avitar03.jpg" alt="">
                                    </span>
                                </div>
                                <div class="mt-2 flex justify-between">
                                    <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                    <div class="">
                                        <span class="inline-flex items-center leading-tight bg-teal-100 rounded-md px-2 py-1">
                                            <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                <circle cx="4" cy="4" r="3"/>
                                            </svg>
                                            <span class="text-xs font-medium text-teal-800 ml-2">Feature Request</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="mt-3">
                            <a href="#" class="block p-5 rounded-md shadow bg-white">
                                <div class="flex justify-between items-baseline">
                                    <p class="text-sm text-gray-900 font-medium">Add discount code to checkout page</p>
                                    <span>
                                        <img class="rounded-full h-6 w-6" src="/images/avitar03.jpg" alt="">
                                    </span>
                                </div>
                                <div class="mt-2 flex justify-between">
                                    <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                    <div class="">
                                        <span class="inline-flex items-center leading-tight bg-teal-100 rounded-md px-2 py-1">
                                            <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                <circle cx="4" cy="4" r="3"/>
                                            </svg>
                                            <span class="text-xs font-medium text-teal-800 ml-2">Feature Request</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    </div>
                </div>
                {{-- col 4 --}}
                <div class="ml-3 flex-shrink-0 flex flex-col bg-gray-200 rounded-md" style="width: 384px">
                    <h3 class="flex-shrink-0 pt-3 px-3 text-sm font-medium text-gray-700">Done</h3>
                    <div class="flex-1 min-h-0 overflow-y-auto">
                        <ul class="pt-2 pb-3 px-3">
                            <li>
                                <a href="#" class="block p-5 rounded-md shadow bg-white">
                                    <div class="flex justify-between items-baseline">
                                        <p class="text-sm text-gray-900 font-medium">Add discount code to checkout page</p>
                                        <span>
                                            <img class="rounded-full h-6 w-6" src="/images/avitar03.jpg" alt="">
                                        </span>
                                    </div>
                                    <div class="mt-2 flex justify-between">
                                        <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                        <div class="">
                                            <span class="inline-flex items-center leading-tight bg-teal-100 rounded-md px-2 py-1">
                                                <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                    <circle cx="4" cy="4" r="3"/>
                                                </svg>
                                                <span class="text-xs font-medium text-teal-800 ml-2">Feature Request</span>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
    
                            <li class="mt-3">
                                <a href="#" class="block p-5 rounded-md shadow bg-white">
                                    <div class="flex justify-between items-baseline">
                                        <p class="text-sm text-gray-900 font-medium">Add discount code to checkout page</p>
                                        <span>
                                            <img class="rounded-full h-6 w-6" src="/images/avitar03.jpg" alt="">
                                        </span>
                                    </div>
                                    <div class="mt-2 flex justify-between">
                                        <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                        <div class="">
                                            <span class="inline-flex items-center leading-tight bg-teal-100 rounded-md px-2 py-1">
                                                <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                    <circle cx="4" cy="4" r="3"/>
                                                </svg>
                                                <span class="text-xs font-medium text-teal-800 ml-2">Feature Request</span>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
    
                            <li class="mt-3">
                                <a href="#" class="block p-5 rounded-md shadow bg-white">
                                    <div class="flex justify-between items-baseline">
                                        <p class="text-sm text-gray-900 font-medium">Add discount code to checkout page</p>
                                        <span>
                                            <img class="rounded-full h-6 w-6" src="/images/avitar03.jpg" alt="">
                                        </span>
                                    </div>
                                    <div class="mt-2 flex justify-between">
                                        <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                        <div class="">
                                            <span class="inline-flex items-center leading-tight bg-teal-100 rounded-md px-2 py-1">
                                                <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                    <circle cx="4" cy="4" r="3"/>
                                                </svg>
                                                <span class="text-xs font-medium text-teal-800 ml-2">Feature Request</span>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
    
                            <li class="mt-3">
                                <a href="#" class="block p-5 rounded-md shadow bg-white">
                                    <div class="flex justify-between items-baseline">
                                        <p class="text-sm text-gray-900 font-medium">Add discount code to checkout page</p>
                                        <span>
                                            <img class="rounded-full h-6 w-6" src="/images/avitar03.jpg" alt="">
                                        </span>
                                    </div>
                                    <div class="mt-2 flex justify-between">
                                        <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                        <div class="">
                                            <span class="inline-flex items-center leading-tight bg-teal-100 rounded-md px-2 py-1">
                                                <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                    <circle cx="4" cy="4" r="3"/>
                                                </svg>
                                                <span class="text-xs font-medium text-teal-800 ml-2">Feature Request</span>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
    
                            <li class="mt-3">
                                <a href="#" class="block p-5 rounded-md shadow bg-white">
                                    <div class="flex justify-between items-baseline">
                                        <p class="text-sm text-gray-900 font-medium">Add discount code to checkout page</p>
                                        <span>
                                            <img class="rounded-full h-6 w-6" src="/images/avitar03.jpg" alt="">
                                        </span>
                                    </div>
                                    <div class="mt-2 flex justify-between">
                                        <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                        <div class="">
                                            <span class="inline-flex items-center leading-tight bg-teal-100 rounded-md px-2 py-1">
                                                <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                    <circle cx="4" cy="4" r="3"/>
                                                </svg>
                                                <span class="text-xs font-medium text-teal-800 ml-2">Feature Request</span>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
    
                            <li class="mt-3">
                                <a href="#" class="block p-5 rounded-md shadow bg-white">
                                    <div class="flex justify-between items-baseline">
                                        <p class="text-sm text-gray-900 font-medium">Add discount code to checkout page</p>
                                        <span>
                                            <img class="rounded-full h-6 w-6" src="/images/avitar03.jpg" alt="">
                                        </span>
                                    </div>
                                    <div class="mt-2 flex justify-between">
                                        <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                        <div class="">
                                            <span class="inline-flex items-center leading-tight bg-teal-100 rounded-md px-2 py-1">
                                                <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                    <circle cx="4" cy="4" r="3"/>
                                                </svg>
                                                <span class="text-xs font-medium text-teal-800 ml-2">Feature Request</span>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
    
                            <li class="mt-3">
                                <a href="#" class="block p-5 rounded-md shadow bg-white">
                                    <div class="flex justify-between items-baseline">
                                        <p class="text-sm text-gray-900 font-medium">Add discount code to checkout page</p>
                                        <span>
                                            <img class="rounded-full h-6 w-6" src="/images/avitar03.jpg" alt="">
                                        </span>
                                    </div>
                                    <div class="mt-2 flex justify-between">
                                        <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                        <div class="">
                                            <span class="inline-flex items-center leading-tight bg-teal-100 rounded-md px-2 py-1">
                                                <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                    <circle cx="4" cy="4" r="3"/>
                                                </svg>
                                                <span class="text-xs font-medium text-teal-800 ml-2">Feature Request</span>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
    
                            <li class="mt-3">
                                <a href="#" class="block p-5 rounded-md shadow bg-white">
                                    <div class="flex justify-between items-baseline">
                                        <p class="text-sm text-gray-900 font-medium">Add discount code to checkout page</p>
                                        <span>
                                            <img class="rounded-full h-6 w-6" src="/images/avitar03.jpg" alt="">
                                        </span>
                                    </div>
                                    <div class="mt-2 flex justify-between">
                                        <time class="text-sm text-gray-600" datetime="2020-09-14">Sep 13</time>
                                        <div class="">
                                            <span class="inline-flex items-center leading-tight bg-teal-100 rounded-md px-2 py-1">
                                                <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                    <circle cx="4" cy="4" r="3"/>
                                                </svg>
                                                <span class="text-xs font-medium text-teal-800 ml-2">Feature Request</span>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
</body>
</html>