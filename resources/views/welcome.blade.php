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
                    <div class="rounded-md shadow">
                        <a href="{{ route('weather.index') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                            <svg class="h-6 w-6 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                            </svg>
                            Weather
                        </a>
                    </div>
                    <div class="mt-3 sm:mt-0 sm:ml-3">
                        <a href="{{ route('vehicles.index') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10">
                            Cars For Sale
                        </a>
                    </div>
                </div>

                <div class="mt-4 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                    <div class="rounded-md shadow">
                        <a href="{{ route('nhtsa.index') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-700 md:py-4 md:text-lg md:px-10">
                            Decode A VIN
                        </a>
                    </div>
                    <div class="mt-3 sm:mt-0 sm:ml-3">
                        <a href="{{ route('tailwind.index') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200 md:py-4 md:text-lg md:px-10">
                            Tailwind CSS
                        </a>
                    </div>
                </div>

                <div class="mt-4 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                    <div class="rounded-md shadow">
                        <a href="{{ route('covid19.index') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-purple-500 hover:bg-purple-700 md:py-4 md:text-lg md:px-10">
                            Covid19 Stats
                        </a>
                    </div>
                    <div class="mt-3 sm:mt-0 sm:ml-3">
                        <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-yellow-700 bg-yellow-100 hover:bg-yellow-200 md:py-4 md:text-lg md:px-10">
                            Bitcoin (soon)
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
