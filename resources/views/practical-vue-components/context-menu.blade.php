<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laracasts Vue Components - Context Menu</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/mdb.min.css">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
@include('layouts.navigation')
</div>
    <div id="app" class="flex flex-col items-center p-8">
        <h1 class="text-2xl font-bold mb-8">Context Menu</h1>

        <div>
            <div class="bg-gray-400 w-64 h-64 flex items-center justify-center">
                <dropdown>
                    <template v-slot:trigger>
                        <button>.....</button>
                    </template>

                    <li><a href="#" class="pl-2 pr-8 text-xs block hover:bg-gray-600">Edit</a></li>
                    <li><a href="#" class="pl-2 pr-8 text-xs block hover:bg-gray-600">Delete</a></li>
                    <li><a href="#" class="pl-2 pr-8 text-xs block hover:bg-gray-600">Report</a></li>
                    <li><a href="#" class="pl-2 pr-8 text-xs block hover:bg-gray-600">Another Link</a></li>
                </dropdown>
            </div>
        </div>

        <hr>

        <dropdown>
            <template v-slot:trigger>
                <button class="btn btn-sm">Click Me For More Options</button>
            </template>

            <li><a href="#" class="pl-2 pr-6 text-xs block hover:bg-gray-600">Edit</a></li>
            <li><a href="#" class="pl-2 pr-6 text-xs block hover:bg-gray-600">Delete</a></li>
            <li><a href="#" class="pl-2 pr-6 text-xs block hover:bg-gray-600">Report</a></li>
            <li><a href="#" class="pl-2 pr-6 text-xs block hover:bg-gray-600">Another Link</a></li>
        </dropdown>
    </div>

    <script src="/js/app.js"></script>
</body>
</html>