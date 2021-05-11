<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Tailwind Blog Layout</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<style>
.toggle-checkbox:checked {
  @apply: right-0 border-green-400;
  right: 0;
  border-color: #68D391;
}
.toggle-checkbox:checked + .toggle-label {
  @apply: bg-green-400;
  background-color: #68D391;
}
</style>
</head>
<body>
    <section class="px-6 pb-8">
        <nav class="flex items-center justify-between">
            <div>
                <a href="{{ route('tailwind.blog') }}">
                    <img src="/images/lorem-logo.png" alt="Logo">
                </a>
            </div>

            <div>
                <a href="{{ route('tailwind.index') }}" class="text-xs text-gray-900 font-bold uppercase">Home Page</a>
                <a href="#" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-2 px-3">Subscript for Updates</a>
            </div>
        </nav>

        <header class="max-w-4xl mx-auto text-center mt-2">
            <div class="max-w-xl mx-auto">
                <h1 class="text-4xl">
                    Latest <span class="text-blue-700">A4F5</span> Blog Posts
                </h1>

                <div class="text-sm mt-6">
                    Another year, another update!  Refreshing more content using Tailwind CSS and improving layout skills.  Keep looking back for more.
                </div>

                <div class="flex justify-center space-x-4 mt-8">
                    {{-- category --}}
                    <span class="relative inline-flex items-center bg-gray-200 inline-block rounded-xl">
                        <select name="category" id="category" class="appearance-none bg-transparent py-2 pl-3 pr-8 text-sm text-gray-90 font-semibold">
                            <option value="category" disabled selected>Category</option>
                            <option value="personal">Personal</option>
                            <option value="bitcoin">Bitcoin</option>
                            <option value="music">Music</option>
                            <option value="photography">Photography</option>
                        </select>
                        <svg class="w-4 h-4 absolute pointer-events-none right-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                    {{-- other filters --}}
                    <span class="relative inline-flex items-center bg-gray-200 inline-block rounded-xl">
                        <select name="category" id="category" class="appearance-none bg-transparent py-2 pl-3 pr-8 text-sm text-gray-90 font-semibold">
                            <option value="category" disabled selected>Other Filters</option>
                            <option value="foo">Foo</option>
                            <option value="bar">Bar</option>
                            <option value="baz">Baz</option>
                        </select>
                        <svg class="w-4 h-4 absolute pointer-events-none right-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                    {{-- search --}}
                    <span class="relative inline-flex items-center bg-gray-200 inline-block rounded-xl px-3 py-2">
                        <form action="#" method="GET">
                            <input type="text" name="search" class="bg-transparent placeholder-gray-900 text-sm font-semibold focus:outline-none focus:border-transparent focus:ring-2 focus:ring-gray-300" placeholder="Find something">
                        </form>
                    </span>
                </div>
            </div>
        </header>
    </section>

    <main class="max-w-6xl mx-auto space-y-6">
        <article class="transition-colors duration-300 hover:bg-gray-100 rounded-xl border border-black border-opacity-0 hover:border-opacity-5">
            <div class="p-3 flex">
                <div class="flex-1 mr-8">
                    <img class="rounded-xl" src="/images/blog/roberto-carlos-roman-don-Xz8zOfGNaTI-unsplash.jpg" alt="Article 1 image">
                </div>

                <div class="flex-1 flex flex-col justify-between">
                    <header>
                        <div class="space-x-3">
                            <a href="#" class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold">Photography</a>
                            <a href="#" class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold">Updates</a>
                        </div>

                        <div class="mt-2">
                            <h1 class="text-3xl">Here's Some Informaton About Some Stuff</h1>
                            <span class="mt-2 block text-gray-400 text-xs">
                                Published <time>1 day ago</time>
                            </span>
                        </div>
                    </header>

                    <div class="text-sm mt-2">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, incidunt in iste, obcaecati consequuntur
                            officia assumenda repellendus impedit cumque labore debitis nisi quisquam inventore?
                        </p>
                    </div>

                    <footer class="flex items-center justify-between mt-4">
                        <div class="flex items-center text-sm text-gray-600 space-x-2">
                            <img class="rounded-full h-8 w-8" src="/images/avitar03.jpg" alt="Yellow Lover Dude">
                            <h5 class="font-bold">Yellow Lover Dude</h5>
                        </div>

                        <div>
                            <a href="#" class="text-xs fond-semibold bg-gray-200 rounded-full px-3 py-2">Read More</a>
                        </div>
                    </footer>
                </div>
            </div>
        </article>

        <div class="grid grid-cols-2">
            <article class="transition-colors duration-300 hover:bg-gray-100 rounded-xl border border-black border-opacity-0 hover:border-opacity-5">
                <div class="p-3">
                    <div class="mb-4">
                        <img class="rounded-xl" src="/images/blog/alex-conradt-v-E3Q2fBbAA-unsplash.jpg" alt="Article 1 image">
                    </div>
    
                    <div class="flex-1 flex flex-col justify-between">
                        <header>
                            <div class="space-x-3">
                                <a href="#" class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold">Photography</a>
                                <a href="#" class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold">Updates</a>
                            </div>
    
                            <div class="mt-2">
                                <h1 class="text-3xl">Here's Some Informaton About Some Stuff</h1>
                                <span class="mt-2 block text-gray-400 text-xs">
                                    Published <time>1 day ago</time>
                                </span>
                            </div>
                        </header>
    
                        <div class="text-sm mt-2">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, incidunt in iste, obcaecati consequuntur
                                officia assumenda repellendus impedit cumque labore debitis nisi quisquam inventore?
                            </p>
                        </div>
    
                        <footer class="flex items-center justify-between mt-4">
                            <div class="flex items-center text-sm text-gray-600 space-x-2">
                                <img class="rounded-full h-8 w-8" src="/images/avitar03.jpg" alt="Yellow Lover Dude">
                                <h5 class="font-bold">Yellow Lover Dude</h5>
                            </div>
    
                            <div>
                                <a href="#" class="text-xs fond-semibold bg-gray-200 rounded-full px-3 py-2">Read More</a>
                            </div>
                        </footer>
                    </div>
                </div>
            </article>
            
            <article class="transition-colors duration-300 hover:bg-gray-100 rounded-xl border border-black border-opacity-0 hover:border-opacity-5">
                <div class="p-3">
                    <div class="mb-4">
                        <img class="rounded-xl" src="/images/blog/annie-spratt-pBffXSf0GNc-unsplash.jpg" alt="Article 1 image">
                    </div>
    
                    <div class="flex-1 flex flex-col justify-between">
                        <header>
                            <div class="space-x-3">
                                <a href="#" class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold">Photography</a>
                                <a href="#" class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold">Updates</a>
                            </div>
    
                            <div class="mt-2">
                                <h1 class="text-3xl">Here's Some Informaton About Some Stuff</h1>
                                <span class="mt-2 block text-gray-400 text-xs">
                                    Published <time>1 day ago</time>
                                </span>
                            </div>
                        </header>
    
                        <div class="text-sm mt-2">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, incidunt in iste, obcaecati consequuntur
                                officia assumenda repellendus impedit cumque labore debitis nisi quisquam inventore?
                            </p>
                        </div>
    
                        <footer class="flex items-center justify-between mt-4">
                            <div class="flex items-center text-sm text-gray-600 space-x-2">
                                <img class="rounded-full h-8 w-8" src="/images/avitar03.jpg" alt="Yellow Lover Dude">
                                <h5 class="font-bold">Yellow Lover Dude</h5>
                            </div>
    
                            <div>
                                <a href="#" class="text-xs fond-semibold bg-gray-200 rounded-full px-3 py-2">Read More</a>
                            </div>
                        </footer>
                    </div>
                </div>
            </article>
        </div>

        <div class="grid grid-cols-3">
            <article class="transition-colors duration-300 hover:bg-gray-100 rounded-xl border border-black border-opacity-0 hover:border-opacity-5">
                <div class="p-3">
                    <div class="mb-4">
                        <img class="rounded-xl" src="/images/blog/roberto-carlos-roman-don-Xz8zOfGNaTI-unsplash.jpg" alt="Article 1 image">
                    </div>
    
                    <div class="flex-1 flex flex-col justify-between">
                        <header>
                            <div class="space-x-3">
                                <a href="#" class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold">Photography</a>
                                <a href="#" class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold">Updates</a>
                            </div>
    
                            <div class="mt-2">
                                <h1 class="text-3xl">Here's Some Informaton About Some Stuff</h1>
                                <span class="mt-2 block text-gray-400 text-xs">
                                    Published <time>1 day ago</time>
                                </span>
                            </div>
                        </header>
    
                        <div class="text-sm mt-2">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, incidunt in iste, obcaecati consequuntur
                                officia assumenda repellendus impedit cumque labore debitis nisi quisquam inventore?
                            </p>
                        </div>
    
                        <footer class="flex items-center justify-between mt-4">
                            <div class="flex items-center text-sm text-gray-600 space-x-2">
                                <img class="rounded-full h-8 w-8" src="/images/avitar03.jpg" alt="Yellow Lover Dude">
                                <h5 class="font-bold">Yellow Lover Dude</h5>
                            </div>
    
                            <div>
                                <a href="#" class="text-xs fond-semibold bg-gray-200 rounded-full px-3 py-2">Read More</a>
                            </div>
                        </footer>
                    </div>
                </div>
            </article>
            
            <article class="transition-colors duration-300 hover:bg-gray-100 rounded-xl border border-black border-opacity-0 hover:border-opacity-5">
                <div class="p-3">
                    <div class="mb-4">
                        <img class="rounded-xl" src="/images/blog/roberto-carlos-roman-don-Xz8zOfGNaTI-unsplash.jpg" alt="Article 1 image">
                    </div>
    
                    <div class="flex-1 flex flex-col justify-between">
                        <header>
                            <div class="space-x-3">
                                <a href="#" class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold">Photography</a>
                                <a href="#" class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold">Updates</a>
                            </div>
    
                            <div class="mt-2">
                                <h1 class="text-3xl">Here's Some Informaton About Some Stuff</h1>
                                <span class="mt-2 block text-gray-400 text-xs">
                                    Published <time>1 day ago</time>
                                </span>
                            </div>
                        </header>
    
                        <div class="text-sm mt-2">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, incidunt in iste, obcaecati consequuntur
                                officia assumenda repellendus impedit cumque labore debitis nisi quisquam inventore?
                            </p>
                        </div>
    
                        <footer class="flex items-center justify-between mt-4">
                            <div class="flex items-center text-sm text-gray-600 space-x-2">
                                <img class="rounded-full h-8 w-8" src="/images/avitar03.jpg" alt="Yellow Lover Dude">
                                <h5 class="font-bold">Yellow Lover Dude</h5>
                            </div>
    
                            <div>
                                <a href="#" class="text-xs fond-semibold bg-gray-200 rounded-full px-3 py-2">Read More</a>
                            </div>
                        </footer>
                    </div>
                </div>
            </article>
            
            <article class="transition-colors duration-300 hover:bg-gray-100 rounded-xl border border-black border-opacity-0 hover:border-opacity-5">
                <div class="p-3">
                    <div class="mb-4">
                        <img class="rounded-xl" src="/images/blog/roberto-carlos-roman-don-Xz8zOfGNaTI-unsplash.jpg" alt="Article 1 image">
                    </div>
    
                    <div class="flex-1 flex flex-col justify-between">
                        <header>
                            <div class="space-x-3">
                                <a href="#" class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold">Photography</a>
                                <a href="#" class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold">Updates</a>
                            </div>
    
                            <div class="mt-2">
                                <h1 class="text-3xl">Here's Some Informaton About Some Stuff</h1>
                                <span class="mt-2 block text-gray-400 text-xs">
                                    Published <time>1 day ago</time>
                                </span>
                            </div>
                        </header>
    
                        <div class="text-sm mt-2">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, incidunt in iste, obcaecati consequuntur
                                officia assumenda repellendus impedit cumque labore debitis nisi quisquam inventore?
                            </p>
                        </div>
    
                        <footer class="flex items-center justify-between mt-4">
                            <div class="flex items-center text-sm text-gray-600 space-x-2">
                                <img class="rounded-full h-8 w-8" src="/images/avitar03.jpg" alt="Yellow Lover Dude">
                                <h5 class="font-bold">Yellow Lover Dude</h5>
                            </div>
    
                            <div>
                                <a href="#" class="text-xs fond-semibold bg-gray-200 rounded-full px-3 py-2">Read More</a>
                            </div>
                        </footer>
                    </div>
                </div>
            </article>
        </div>
    </main>

    <footer class="max-w-6xl mx-auto transition-colors duration-300 bg-gray-100 rounded-xl border border-black border-opacity-5 my-8">
        <div class="p-4 flex items-center space-x-2">
            <label for="toggle" class="text-sm text-gray-700">Show Average: </label>
            <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                <input type="checkbox" name="toggle" id="toggle" class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                <label for="toggle" class="toggle-label block overflow-hidden h-5 rounded-full bg-gray-300 cursor-pointer"></label>
            </div>
            <div id="average" class="text-sm"></div>
        </div>
    </footer>

<script>
$(function() {
    $('#toggle').change(function() {
        if (this.checked) {
            $('#average').text('This is the average text.')
        }

        if (!this.checked) {
            $('#average').text('')
        }
    });
});
</script>
</body>
</html>