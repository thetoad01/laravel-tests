<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modal</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/mdb.min.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="container-fluid">
            @include('layouts.navigation')
        </div>
    </div>

    <div id="app" class="relative flex flex-col items-center p-8 pb-5 vh-100">
        <h1 class="text-2xl font-bold mb-8">Modal</h1>

        <p>
            <a href="#cancel-modal">Open Modal</a>
        </p>

        <modal name="cancel-modal">
            <h1 class="mb-2 border-bottom">Leaving so soon?</h1>

            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil odit rerum mollitia. Aliquam dicta cupiditate architecto, 
                alias vero ipsam aspernatur explicabo, quibusdam, labore corrupti odio facere eius rerum! Harum, delectus.
            </p>

            <template v-slot:footer>
                <div class="mt-2 text-right">
                    <a href="#" class="btn btn-sm btn-danger">Cancel</a>
                    <a href="#" class="btn btn-sm btn-success">Continue</a>
                </div>
            </template>
        </modal>
    </div>

</div>
<script src="/js/app.js"></script>
</body>
</html>