@extends('layouts.tailwind')

@section('title', 'Laravel Storage Tests')

@section('heads')
@endsection

@section('content')
<div class="container mx-auto">
    <header class="container mx-auto pb-4 text-gray-100">
        <div class="flex items-center justify-between px-4 pt-4">
            <a class="text-left hover:text-blue-700" href="/" title="home">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </a>

            <a href="{{ route('s3.index') }}" class="flex items-center hover:text-blue-700 hover:underline">
                <span class="pr-2">back</span>
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M3 12l6.414 6.414a2 2 0 001.414.586H19a2 2 0 002-2V7a2 2 0 00-2-2h-8.172a2 2 0 00-1.414.586L3 12z" />
                </svg>
            </a>
        </div>
    </header>
</div>

<div class="container mx-auto mb-6 p-4 bg-gray-200">
    <h1 class="text-3xl font-bolder text-indigo-800">Storage Tests</h1>

    <div class="py-6">
        <a href="{{ route('s3.create') }}" class="text-bold text-blue-700">Upload An Image</a>
    </div>
</div>
@endsection

@section('scripts')
@endsection
