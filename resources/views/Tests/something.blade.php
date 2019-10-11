<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Something</title>
<link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <div class="container-fluid border-bottom mb-4">
        @include('layouts.navigation')
    </div>

    <h1 class="text-center">Yes, you can route something.php!</h1>
    <p class="text-center">
        Route::view('/something.php', 'Tests.something');
    </p>

    <p class="text-center">
        <span class="text-danger">However, it doesn't work with Nginx!</span>
    </p>
</body>
</html>