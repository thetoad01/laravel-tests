<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/mdb.min.css">
</head>
<body>
<div class="container-fluid">
@include('layouts.navigation')
</div>

<div id="app" class="container mt-4">

    <h1>Smooth Scroll</h1>

    <scroll-link href="#categories" class="btn btn-success">Go To Testimonials</scroll-link>

    <div style="height: 2000px"></div>

    <div id="categories" class="mb-4">
        <h2 class="mb-4 lead">Testimonials</h2>

        <div class="row border">
            <div class="col bg-warning p-4">
                {{-- <a href="#app" class="text-default">Go Back Up</a> --}}
                <scroll-link href="#app" class="text-default"><i class="fa fa-arrow-alt-circle-up"></i> Back to Top</scroll-link>
            </div>
            <div class="col p-4">Stuff</div>
            <div class="col p-4 bg-secondary">Stuff</div>
        </div>
    </div>

</div>

<script src="/js/app.js"></script>
</body>
</html>