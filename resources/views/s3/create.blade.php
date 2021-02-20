@extends('layouts.tailwind')

@section('title', 'Laravel Storage Tests | Update An Image')

@section('heads')
@livewireStyles
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
    <h1 class="text-2xl font-bolder text-indigo-800">Upload an Image</h1>

    <div class="my-4 flex items-center">
        {{-- <livewire:photo-upload :photo="$photo ?? ''" /> --}}
        <form action="{{ route('s3.store') }}" method="post" enctype="multipart/form-data">
            @csrf
    
            <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:mt-px sm:pt-2">
                <label for="photo" class="block text-sm leading-5 font-medium text-gray-700 sm:mt-px sm:pt-2">Upload Photo</label>
                <div class="mt-2 sm:mt-0 sm:col-span-2">
                    <input type="file" name="photo">
                    @error('photo')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
    
                    <div class="mt-4">
                        @isset($photo->name)
                            <img src="{{ Storage::url($photo->name) }}" alt="uploaded photo">
                        @endisset
                    </div>
                </div>
            </div>

            <div class="my-4">
                <button type="submit" class="px-4 py-2 text-white bg-blue-800">Upload</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
@livewireScripts
@endsection
