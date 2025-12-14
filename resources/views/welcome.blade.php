<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="This is a website for Michigan developer David Defoe used for testing Laravel.">
<title>A4F5.com | Laravel Tests by David Defoe</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="bg-gray-600">

    <div class="w-full h-screen bg-center bg-no-repeat bg-cover" style="background-image: url('https://images.unsplash.com/photo-1547394765-185e1e68f34e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
        <div class="flex justify-center items-center w-full h-screen bg-opacity-50 bg-black">

            <div class="mx-4 text-center text-white">
                <h1 class="font-bold text-6xl mb-4">A4F5.com</h1>
                <h2 class="font-bold text-3xl mb-12">These are my tests!</h2>

                <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                    <div class="rounded-md shadow w-60">
                        <a href="{{ route('bitcoin-price.index') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-yellow-700 bg-yellow-100 hover:bg-yellow-200 md:py-4 md:text-lg md:px-10">
                            <svg class="h-6 w-6 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Bitcoin Price
                        </a>
                    </div>
                    <div class="mt-3 sm:mt-0 sm:ml-3 rounded-md shadow w-60">
                        <a href="{{ route('weather.index') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                            <svg class="h-6 w-6 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                            </svg>
                            Weather
                        </a>
                    </div>
                </div>

                <div class="mt-4 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                    <div class="rounded-md shadow w-60">
                        <a href="{{ route('nhtsa.index') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-700 md:py-4 md:text-lg md:px-10">
                            <svg class="h-6 w-6 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Decode A VIN
                        </a>
                    </div>
                    <div class="mt-3 sm:mt-0 sm:ml-3 rounded-md shadow w-60">
                        <a href="{{ route('tailwind.index') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200 md:py-4 md:text-lg md:px-10">
                            <svg class="h-6 w-6 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                            </svg>
                            Tailwind CSS
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between bg-gray-900 px-16 py-4 text-sm">
            <div class="text-gray-300">
                <a href="https://github.com/thetoad01">GitHub</a>
            </div>
            <div class="text-gray-300">
                Created by <a href="http://defoenet.com/">David Defoe</a> &copy; {{ now()->year }}
            </div>
            <div class="text-gray-300">
                <a href="{{ route('login') }}" class="btn btn-link ml-5">login</a>
            </div>
        </div>
    </div>

</body>
</html>
