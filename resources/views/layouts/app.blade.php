<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title')</title>
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@yield('heads')
</head>
<body>

<div class="container-fluid">
@include('layouts.navigation')

@yield('content')
</div>

@yield('scripts')
{{-- <!-- Global site tag (gtag.js) - Google Analytics --> --}}
{{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-73943836-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-73943836-1');
</script> --}}
</body>
</html>
