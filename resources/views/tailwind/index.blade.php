@extends('layouts.tailwind')

@section('title', 'Tailwind CSS Re-Creations')

@section('heads')
@endsection

@section('content')
{{-- navigation --}}
<header class="container mx-auto pt-4 pb-2">
    <div class="flex items-center justify-between">
        <a class="text-left pl-4 hover:text-blue-700" href="/" title="home">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
        </a>
        <h1 class="text-2xl text-center">Tailwind CSS Re-Creations & Tests</h1>
        <div class="text-right px-4"></div>
    </div>
</header>
{{-- content --}}
<section class="container mx-auto p-4 bg-gray-100 rounded-lg shadow-md">
    <a href="{{ route('tailwind.tweet') }}" class="flex text-center hover:bg-gray-200">
        <img class="w-10 h-10 mr-2" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pjxzdmcgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDggNDg7IiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA0OCA0OCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+PGcgaWQ9Ikljb25zIj48ZyBpZD0iSWNvbnNfMTVfIj48Zz48cGF0aCBkPSJNMjMuNTU4MjEsMjUuNDkyOTZjMCwwLDEuNDMwNCwwLjMyNTEsNC4xNjEyLTAuODQ1MnMyLjczMDgtMy4wNTU5LDIuNzMwOC0zLjA1NTkgICAgIGMtMS40MzA0LDAuNTg1Mi0yLjY2NTgtMC4zMjUxLTIuNjY1OC0wLjMyNTFsMS4xNzAzLTAuNTg1MWMyLjIxMDctMC40NTUyLDQuNjgxNC0yLjczMDgsNS4xMzY1LTMuMTIwOSAgICAgczEuMTA1My0xLjYyNTUtMC4xOTUxLTEuMTcwNGMtMS4zMDAzLDAuNDU1Mi0yLjc5NTgsMC4xMzAxLTIuNzk1OCwwLjEzMDFsMC43ODAzLTAuNjUwMiAgICAgYzMuODM2MS0yLjM0MDcsNC40ODYyLTQuNjE2MywzLjgzNjEtNS4wMDY0Yy0wLjY1MDItMC4zOTAxLTIuMTkwNiwxLTIuMTkwNiwxYy0xNy4xMjEyLDEwLjQ4NDQtMTguOTc2NiwyNC42ODE5LTE4Ljk3NjYsMjQuNjgxOSAgICAgcy0wLjExOTMsMC43MTU1LDAuNzc1MSwwLjY1NTlDMTYuMjE4OTEsMzcuMTQxOTYsMTUuMzkyMTEsMzEuNTc3MzYsMjMuNTU4MjEsMjUuNDkyOTZ6IiBzdHlsZT0iZmlsbDojNEFBMEVDOyIvPjxnPjxwYXRoIGQ9Ik0xMi40MTMxMSwyNC41Nzc5NmMtMC4xOTM0LDAtMC4zNTAxLTAuMTU2My0wLjM1MDEtMC4zNDk3di01LjE4ODQgICAgICBjMC0xLjc1MSwxLjQyNDMtMy4xNzQ4LDMuMTc1My0zLjE3NDhoNS4xNTkxYzAuMTkzNCwwLDAuMzUwMSwwLjE1NjIsMC4zNTAxLDAuMzQ5NmMwLDAuMTkzMy0wLjE1NjcsMC4zNDk2LTAuMzUwMSwwLjM0OTYgICAgICBoLTUuMTU5MWMtMS4zNjQ4LDAtMi40NzUxLDEuMTEwMy0yLjQ3NTEsMi40NzU2djUuMTg4NEMxMi43NjMyMSwyNC40MjE2NiwxMi42MDY0MSwyNC41Nzc5NiwxMi40MTMxMSwyNC41Nzc5NnoiIHN0eWxlPSJmaWxsOiM0QUEwRUM7Ii8+PC9nPjxnPjxwYXRoIGQ9Ik0zMS4zNTQ1MSwzNS40MDk5NmgtNS40ODM0Yy0wLjE5MzQsMC0wLjM1MDEtMC4xNTYzLTAuMzUwMS0wLjM0OTYgICAgICBjMC0wLjE5MzQsMC4xNTY3LTAuMzQ5NiwwLjM1MDEtMC4zNDk2aDUuNDgzNGMxLjM2NDcsMCwyLjQ3NTEtMS4xMTA0LDIuNDc1MS0yLjQ3NTZ2LTUuMTYwMiAgICAgIGMwLTAuMTkzMywwLjE1NjctMC4zNDk2LDAuMzUwMS0wLjM0OTZjMC4xOTMzLDAsMC4zNTAxLDAuMTU2MywwLjM1MDEsMC4zNDk2djUuMTYwMiAgICAgIEMzNC41Mjk4MSwzMy45ODYxNiwzMy4xMDU0MSwzNS40MDk5NiwzMS4zNTQ1MSwzNS40MDk5NnoiIHN0eWxlPSJmaWxsOiM0QUEwRUM7Ii8+PC9nPjwvZz48L2c+PC9nPjwvc3ZnPg==">
        <span class="pt-2 text-lg">A single tweet clone</span>
    </a>

    <a href="{{ route('tailwind.github') }}" class="flex text-center hover:bg-gray-200">
        <img class="w-10 h-10 mr-2" src="data:image/png;base64,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">
        <span class="pt-2 text-lg">Github clone</span>
    </a>

    <a href="{{ route('tailwind.kanban') }}" class="flex text-center hover:bg-gray-200">
        <img class="w-10 h-10 mr-2" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaWQ9IkxhZ2VyXzEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDEyOCAxMjg7IiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB4bWw6c3BhY2U9InByZXNlcnZlIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48c3R5bGUgdHlwZT0idGV4dC9jc3MiPgoJLnN0MHtmaWxsOiMwMDc5QkY7fQoJLnN0MXtmaWxsOiNGRkZGRkY7fQo8L3N0eWxlPjxnPjxnPjxnPjxnPjxjaXJjbGUgY2xhc3M9InN0MCIgY3g9IjY0IiBjeT0iNjQiIHI9IjUwIi8+PC9nPjwvZz48L2c+PC9nPjxwYXRoIGNsYXNzPSJzdDEiIGQ9Ik04Mi40LDM5LjVINDUuNmMtMy40LDAtNi4xLDIuNy02LjEsNi4xdjM2LjdjMCwzLjQsMi43LDYuMSw2LjEsNi4xaDM2LjdjMy40LDAsNi4xLTIuNyw2LjEtNi4xVjQ1LjYgIEM4OC41LDQyLjIsODUuOCwzOS41LDgyLjQsMzkuNXogTTYwLjgsNzcuOWMwLDEuNi0xLjMsMi45LTIuOSwyLjloLTkuMWMtMS42LDAtMi45LTEuMy0yLjktMi45VjUwLjFjMC0xLjYsMS4zLTIuOSwyLjktMi45aDkuMSAgYzEuNiwwLDIuOSwxLjMsMi45LDIuOVY3Ny45eiBNODIuMSw2NS43YzAsMS42LTEuMywyLjktMi45LDIuOWgtOS4xYy0xLjYsMC0yLjktMS4zLTIuOS0yLjlWNTAuMWMwLTEuNiwxLjMtMi45LDIuOS0yLjloOS4xICBjMS42LDAsMi45LDEuMywyLjksMi45VjY1Ljd6Ii8+PC9zdmc+">
        <span class="pt-2 text-lg">Kanban Board</span>
    </a>

    <a href="{{ route('covid19.index') }}" class="flex text-center hover:bg-gray-200">
        <img class="w-10 h-10 mr-2" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDY0IDY0IiBoZWlnaHQ9IjY0cHgiIHZlcnNpb249IjEuMSIgdmlld0JveD0iMCAwIDY0IDY0IiB3aWR0aD0iNjRweCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+PGcgaWQ9IkNvcm9uYV92aXJ1c194MkNfX0NvdmlkLTE5XzFfIj48cGF0aCBkPSJNMTUuMzg3LDI4LjM3NmwtMC45NzgtMC4yMTJjMC4zNTgtMS42NDgsMC45NDctMy4yMzgsMS43NTMtNC43MjdsMC44NzksMC40NzcgICBDMTYuMjgxLDI1LjMxOSwxNS43MjUsMjYuODIsMTUuMzg3LDI4LjM3NnoiIGZpbGw9IiMzNzQ3NEYiLz48cGF0aCBkPSJNMTQuMjM3LDM0LjkzMkMxNC4wOCwzMy45NjksMTQsMzIuOTgyLDE0LDMyYzAtMC43MTcsMC4wNDItMS40MzgsMC4xMjYtMi4xNDNsMC45OTMsMC4xMTggICBDMTUuMDQsMzAuNjQxLDE1LDMxLjMyMywxNSwzMmMwLDAuOTI4LDAuMDc2LDEuODYxLDAuMjI1LDIuNzcxTDE0LjIzNywzNC45MzJ6IiBmaWxsPSIjMzc0NzRGIi8+PHBhdGggZD0iTTE3LjUwMiw0Mi42NjljLTEuMzM5LTEuODE2LTIuMzEzLTMuODM4LTIuODkzLTYuMDFsMC45NjYtMC4yNThjMC41NDgsMi4wNSwxLjQ2NywzLjk1OSwyLjczMSw1LjY3NCAgIEwxNy41MDIsNDIuNjY5eiIgZmlsbD0iIzM3NDc0RiIvPjxwYXRoIGQ9Ik0yMy4zMjksNDcuNzc3Yy0xLjgwNy0wLjk5NS0zLjQxOS0yLjI4My00Ljc5Mi0zLjgzbDAuNzQ4LTAuNjY0YzEuMjk3LDEuNDYxLDIuODIsMi42NzgsNC41MjcsMy42MTggICBMMjMuMzI5LDQ3Ljc3N3oiIGZpbGw9IiMzNzQ3NEYiLz48cGF0aCBkPSJNMzIsNTBjLTIuMzUzLDAtNC42NDEtMC40NDctNi44LTEuMzI5bDAuMzc4LTAuOTI2QzI3LjYxNyw0OC41NzgsMjkuNzc3LDQ5LDMyLDQ5ICAgYzUuMDAyLDAsOS43MjktMi4xOSwxMi45NjgtNi4wMDhsMC43NjMsMC42NDZDNDIuMzAxLDQ3LjY4MiwzNy4yOTYsNTAsMzIsNTB6IiBmaWxsPSIjMzc0NzRGIi8+PHBhdGggZD0iTTQ2Ljk3MSw0MS45OTdsLTAuODMxLTAuNTU2QzQ4LjAxMSwzOC42NDQsNDksMzUuMzc5LDQ5LDMyYzAtMi41MjUtMC41NDEtNC45NTYtMS42MDYtNy4yMjNsMC45MDUtMC40MjYgICBDNDkuNDI4LDI2Ljc1Myw1MCwyOS4zMjcsNTAsMzJDNTAsMzUuNTc4LDQ4Ljk1MywzOS4wMzUsNDYuOTcxLDQxLjk5N3oiIGZpbGw9IiMzNzQ3NEYiLz48cGF0aCBkPSJNNDYuMzI4LDIyLjg0OGMtMS4xODktMS44NTgtMi43MDYtMy40NDktNC41MDktNC43MjhsMC41NzgtMC44MTVjMS45MDksMS4zNTMsMy41MTUsMy4wMzcsNC43NzQsNS4wMDQgICBMNDYuMzI4LDIyLjg0OHoiIGZpbGw9IiMzNzQ3NEYiLz48cGF0aCBkPSJNNDAuMjU5LDE3LjEzOGMtMS4yMTgtMC42NzgtMi41MTYtMS4yMDQtMy44NTgtMS41NjNsMC4yNTgtMC45NjZjMS40MjIsMC4zOCwyLjc5NywwLjkzNyw0LjA4NiwxLjY1NCAgIEw0MC4yNTksMTcuMTM4eiIgZmlsbD0iIzM3NDc0RiIvPjxwYXRoIGQ9Ik0yOC4wMiwxNS40NjlsLTAuMjMzLTAuOTczYzIuMzA4LTAuNTUzLDQuNzY1LTAuNjQ0LDcuMTA2LTAuMjY1bC0wLjE1OSwwLjk4NyAgIEMzMi41MjEsMTQuODYxLDMwLjE5OCwxNC45NDYsMjguMDIsMTUuNDY5eiIgZmlsbD0iIzM3NDc0RiIvPjxwYXRoIGQ9Ik0yMi4yODYsMTguMDQ3bC0wLjU3Mi0wLjgyYzEuMzYyLTAuOTUsMi44NDgtMS43MDcsNC40MTYtMi4yNDhsMC4zMjYsMC45NDUgICBDMjQuOTc2LDE2LjQzNSwyMy41NzMsMTcuMTQ5LDIyLjI4NiwxOC4wNDd6IiBmaWxsPSIjMzc0NzRGIi8+PHBhdGggZD0iTTE4LjAzNSwyMi4zMDNsLTAuODIxLTAuNTcxYzAuODQ1LTEuMjE0LDEuODM5LTIuMzIzLDIuOTU0LTMuMjk2bDAuNjU3LDAuNzUzICAgQzE5Ljc3MiwyMC4xMDgsMTguODMzLDIxLjE1NiwxOC4wMzUsMjIuMzAzeiIgZmlsbD0iIzM3NDc0RiIvPjxnPjxwYXRoIGQ9Ik0zMy41LDQzYy0xLjM3OCwwLTIuNS0xLjEyMi0yLjUtMi41czEuMTIyLTIuNSwyLjUtMi41czIuNSwxLjEyMiwyLjUsMi41UzM0Ljg3OCw0MywzMy41LDQzeiBNMzMuNSwzOSAgICBjLTAuODI3LDAtMS41LDAuNjczLTEuNSwxLjVzMC42NzMsMS41LDEuNSwxLjVzMS41LTAuNjczLDEuNS0xLjVTMzQuMzI3LDM5LDMzLjUsMzl6IiBmaWxsPSIjMzc0NzRGIi8+PC9nPjxnPjxwYXRoIGQ9Ik0yNC41LDI1LjVjLTEuMzc4LDAtMi41LTEuMTIyLTIuNS0yLjVzMS4xMjItMi41LDIuNS0yLjVTMjcsMjEuNjIyLDI3LDIzUzI1Ljg3OCwyNS41LDI0LjUsMjUuNXogICAgIE0yNC41LDIxLjVjLTAuODI3LDAtMS41LDAuNjczLTEuNSwxLjVzMC42NzMsMS41LDEuNSwxLjVTMjYsMjMuODI3LDI2LDIzUzI1LjMyNywyMS41LDI0LjUsMjEuNXoiIGZpbGw9IiMzNzQ3NEYiLz48L2c+PGc+PHBhdGggZD0iTTI0LjUsMzdjLTEuMzc4LDAtMi41LTEuMTIyLTIuNS0yLjVzMS4xMjItMi41LDIuNS0yLjVzMi41LDEuMTIyLDIuNSwyLjVTMjUuODc4LDM3LDI0LjUsMzd6IE0yNC41LDMzICAgIGMtMC44MjcsMC0xLjUsMC42NzMtMS41LDEuNXMwLjY3MywxLjUsMS41LDEuNXMxLjUtMC42NzMsMS41LTEuNVMyNS4zMjcsMzMsMjQuNSwzM3oiIGZpbGw9IiMzNzQ3NEYiLz48L2c+PGc+PHBhdGggZD0iTTM4LjUsMjdjLTEuMzc4LDAtMi41LTEuMTIyLTIuNS0yLjVzMS4xMjItMi41LDIuNS0yLjVzMi41LDEuMTIyLDIuNSwyLjVTMzkuODc4LDI3LDM4LjUsMjd6IE0zOC41LDIzICAgIGMtMC44MjcsMC0xLjUsMC42NzMtMS41LDEuNXMwLjY3MywxLjUsMS41LDEuNXMxLjUtMC42NzMsMS41LTEuNVMzOS4zMjcsMjMsMzguNSwyM3oiIGZpbGw9IiMzNzQ3NEYiLz48L2c+PGc+PHBhdGggZD0iTTQwLDM3Yy0xLjY1NCwwLTMtMS4zNDYtMy0zczEuMzQ2LTMsMy0zczMsMS4zNDYsMywzUzQxLjY1NCwzNyw0MCwzN3ogTTQwLDMyYy0xLjEwMywwLTIsMC44OTctMiwyICAgIHMwLjg5NywyLDIsMnMyLTAuODk3LDItMlM0MS4xMDMsMzIsNDAsMzJ6IiBmaWxsPSIjMzc0NzRGIi8+PC9nPjxnPjxwYXRoIGQ9Ik0zMiwzMmMtMS42NTQsMC0zLTEuMzQ2LTMtM3MxLjM0Ni0zLDMtM3MzLDEuMzQ2LDMsM1MzMy42NTQsMzIsMzIsMzJ6IE0zMiwyN2MtMS4xMDMsMC0yLDAuODk3LTIsMiAgICBzMC44OTcsMiwyLDJzMi0wLjg5NywyLTJTMzMuMTAzLDI3LDMyLDI3eiIgZmlsbD0iIzM3NDc0RiIvPjwvZz48ZyBpZD0iWE1MSURfMjJfIj48Zz48cGF0aCBkPSJNMjQuMzEzLDEyLjIwMWMtMS4zMjcsMC0yLjQ3OS0wLjg1My0yLjg2Ny0yLjEyMmMtMC40ODQtMS41ODEsMC40MDgtMy4yNjIsMS45ODktMy43NDYgICAgIGMwLjI4Ny0wLjA4NywwLjU4Mi0wLjEzMiwwLjg3OS0wLjEzMmMxLjMyNywwLDIuNDc5LDAuODUzLDIuODY3LDIuMTIyYzAuMjM1LDAuNzY2LDAuMTU3LDEuNTc4LTAuMjE5LDIuMjg1ICAgICBjLTAuMzc2LDAuNzA4LTEuMDA1LDEuMjI3LTEuNzcxLDEuNDYxQzI0LjkwNiwxMi4xNTcsMjQuNjEsMTIuMjAxLDI0LjMxMywxMi4yMDF6IE0yNC4zMTQsNy4yMDEgICAgIGMtMC4xOTgsMC0wLjM5NSwwLjAyOS0wLjU4NiwwLjA4OGMtMS4wNTQsMC4zMjMtMS42NDksMS40NDMtMS4zMjYsMi40OTdjMC4zMTYsMS4wMzUsMS40NDcsMS42NDcsMi40OTcsMS4zMjcgICAgIGMwLjUxMS0wLjE1NiwwLjkzLTAuNTAyLDEuMTgxLTAuOTc0czAuMzAyLTEuMDEzLDAuMTQ2LTEuNTIzQzI1Ljk2Nyw3Ljc3LDI1LjE5OSw3LjIwMSwyNC4zMTQsNy4yMDF6IiBmaWxsPSIjMzc0NzRGIi8+PC9nPjxnPjxyZWN0IGZpbGw9IiMzNzQ3NEYiIGhlaWdodD0iMSIgdHJhbnNmb3JtPSJtYXRyaXgoMC4yOTQ4IDAuOTU1NSAtMC45NTU1IDAuMjk0OCAzMi43NDAzIC0xNC4zNikiIHdpZHRoPSI4LjE0MSIgeD0iMjIuMDI5IiB5PSIxNC41MDMiLz48L2c+PC9nPjxnIGlkPSJYTUxJRF8yM18iPjxnPjxwYXRoIGQ9Ik0zNC4xODUsNTkuMjQ4Yy0xLjEyOSwwLTIuMTIyLTAuNzYyLTIuNDE0LTEuODU0Yy0wLjM1Ni0xLjMzMiwwLjQzNy0yLjcwNSwxLjc2OC0zLjA2MiAgICAgYzEuMzEtMC4zNTQsMi43MTMsMC40NjUsMy4wNjIsMS43NjhjMC4zNTYsMS4zMzItMC40MzcsMi43MDUtMS43NjgsMy4wNjJDMzQuNjIxLDU5LjIxOSwzNC40MDIsNTkuMjQ4LDM0LjE4NSw1OS4yNDh6ICAgICAgTTM0LjE4Nyw1NS4yNDdjLTAuMTMsMC0wLjI2MiwwLjAxOC0wLjM5LDAuMDUyYy0wLjc5OSwwLjIxNC0xLjI3NCwxLjAzOC0xLjA2MSwxLjgzN2MwLjIwOSwwLjc4MiwxLjA0OCwxLjI3MiwxLjgzNywxLjA2MSAgICAgYzAuNzk5LTAuMjE0LDEuMjc0LTEuMDM5LDEuMDYxLTEuODM3QzM1LjQ1OCw1NS43MDQsMzQuODYzLDU1LjI0NywzNC4xODcsNTUuMjQ3eiIgZmlsbD0iIzM3NDc0RiIvPjwvZz48Zz48cmVjdCBmaWxsPSIjMzc0NzRGIiBoZWlnaHQ9IjEiIHRyYW5zZm9ybT0ibWF0cml4KDAuMDc4OCAwLjk5NjkgLTAuOTk2OSAwLjA3ODggODEuMTQzNiAxMy4zNzY1KSIgd2lkdGg9IjguNDY3IiB4PSIyOS4xIiB5PSI1MC4wOTUiLz48L2c+PC9nPjxnIGlkPSJYTUxJRF8yNF8iPjxnPjxwYXRoIGQ9Ik0zOC41MjUsMTAuMTUyYy0wLjIxOCwwLTAuNDM2LTAuMDI5LTAuNjQ4LTAuMDg2Yy0xLjMzMS0wLjM1Ni0yLjEyNC0xLjczLTEuNzY4LTMuMDYyICAgICBjMC4zNDgtMS4zMDIsMS43NTEtMi4xMTgsMy4wNjItMS43NjhjMS4zMzIsMC4zNTcsMi4xMjUsMS43MywxLjc2OCwzLjA2MkM0MC42NDYsOS4zOSwzOS42NTQsMTAuMTUyLDM4LjUyNSwxMC4xNTJ6ICAgICAgTTM4LjUyMyw2LjE1MWMtMC42NzcsMC0xLjI3MiwwLjQ1Ny0xLjQ0OCwxLjExMmMtMC4yMTQsMC43OTksMC4yNjIsMS42MjMsMS4wNjEsMS44MzdjMC43ODksMC4yMTEsMS42MjctMC4yOCwxLjgzNy0xLjA2MSAgICAgYzAuMjE0LTAuNzk5LTAuMjYyLTEuNjIzLTEuMDYxLTEuODM3QzM4Ljc4NSw2LjE2OCwzOC42NTMsNi4xNTEsMzguNTIzLDYuMTUxeiIgZmlsbD0iIzM3NDc0RiIvPjwvZz48Zz48cmVjdCBmaWxsPSIjMzc0NzRGIiBoZWlnaHQ9IjEwLjIwNyIgdHJhbnNmb3JtPSJtYXRyaXgoMC45NjU5IDAuMjU4OCAtMC4yNTg4IDAuOTY1OSA1LjAwNjMgLTkuMDAwMykiIHdpZHRoPSIxIiB4PSIzNi4xODYiIHk9IjkuNDEiLz48L2c+PC9nPjxnIGlkPSJYTUxJRF8yNV8iPjxnPjxwYXRoIGQ9Ik0yMi44MDUsNTYuODk4Yy0wLjMzNiwwLTAuNjY0LTAuMDY3LTAuOTc2LTAuMTk5Yy0xLjI2OS0wLjUzOS0xLjg2My0yLjAwOS0xLjMyNS0zLjI3OCAgICAgYzAuNTI1LTEuMjM1LDIuMDM4LTEuODUxLDMuMjc4LTEuMzI1YzAuNjE1LDAuMjYxLDEuMDkxLDAuNzQ2LDEuMzQxLDEuMzY1YzAuMjUsMC42MTksMC4yNDQsMS4yOTgtMC4wMTcsMS45MTMgICAgIEMyNC43MTUsNTYuMywyMy44MTEsNTYuODk4LDIyLjgwNSw1Ni44OTh6IE0yMi44MDcsNTIuODk3Yy0wLjYwNCwwLTEuMTQ2LDAuMzU5LTEuMzgxLDAuOTE1ICAgICBjLTAuMzIzLDAuNzYxLDAuMDM0LDEuNjQ0LDAuNzk1LDEuOTY3YzAuNzQ5LDAuMzE3LDEuNjUyLTAuMDU0LDEuOTY2LTAuNzk1YzAuMTU3LTAuMzY5LDAuMTYtMC43NzYsMC4wMS0xLjE0OCAgICAgYy0wLjE1LTAuMzcyLTAuNDM2LTAuNjYyLTAuODA1LTAuODE4QzIzLjIwNSw1Mi45MzgsMjMuMDA4LDUyLjg5NywyMi44MDcsNTIuODk3eiIgZmlsbD0iIzM3NDc0RiIvPjwvZz48Zz48cmVjdCBmaWxsPSIjMzc0NzRGIiBoZWlnaHQ9IjEwLjIwNyIgdHJhbnNmb3JtPSJtYXRyaXgoMC45MjA2IDAuMzkwNSAtMC4zOTA1IDAuOTIwNiAyMC43MTk3IC02LjE4OTQpIiB3aWR0aD0iMSIgeD0iMjUuMDgiIHk9IjQyLjc1NSIvPjwvZz48L2c+PGcgaWQ9IlhNTElEXzI2XyI+PGc+PHBhdGggZD0iTTQ2LjQxOCwxNC45MjRjLTAuNjY4LDAtMS4yOTYtMC4yNi0xLjc2OC0wLjczMmMtMC40NzItMC40NzItMC43MzItMS4xLTAuNzMyLTEuNzY4ICAgICBzMC4yNi0xLjI5NiwwLjczMi0xLjc2OGMwLjk0My0wLjk0NCwyLjU5Mi0wLjk0NCwzLjUzNSwwYzAuNDcyLDAuNDcyLDAuNzMyLDEuMSwwLjczMiwxLjc2OHMtMC4yNiwxLjI5Ni0wLjczMiwxLjc2OCAgICAgQzQ3LjcxNCwxNC42NjQsNDcuMDg2LDE0LjkyNCw0Ni40MTgsMTQuOTI0eiBNNDYuNDE4LDEwLjkyNGMtMC40MDEsMC0wLjc3NywwLjE1Ni0xLjA2MSwwLjQzOXMtMC40MzksMC42Ni0wLjQzOSwxLjA2MSAgICAgczAuMTU2LDAuNzc3LDAuNDM5LDEuMDYxYzAuNTY2LDAuNTY2LDEuNTU1LDAuNTY2LDIuMTIxLDBjMC4yODMtMC4yODMsMC40MzktMC42NiwwLjQzOS0xLjA2MXMtMC4xNTYtMC43NzctMC40MzktMS4wNjEgICAgIFM0Ni44MTksMTAuOTI0LDQ2LjQxOCwxMC45MjR6IiBmaWxsPSIjMzc0NzRGIi8+PC9nPjxnPjxyZWN0IGZpbGw9IiMzNzQ3NEYiIGhlaWdodD0iNS4zMzciIHRyYW5zZm9ybT0ibWF0cml4KDAuNzk4OCAwLjYwMTYgLTAuNjAxNiAwLjc5ODggMTguMzM4MyAtMjIuODk1KSIgd2lkdGg9IjEiIHg9IjQyLjkiIHk9IjEzLjMwMiIvPjwvZz48L2c+PGcgaWQ9IlhNTElEXzI3XyI+PGc+PHBhdGggZD0iTTEyLjM4NSw1Mi4zMDJjLTAuODAyLDAtMS41NTUtMC4zMTMtMi4xMjEtMC44NzljLTEuMTY5LTEuMTY5LTEuMTY5LTMuMDczLDAtNC4yNDMgICAgIGMxLjEzMy0xLjEzMywzLjEwOS0xLjEzMyw0LjI0MywwYzEuMTY5LDEuMTcsMS4xNjksMy4wNzMsMCw0LjI0M0MxMy45MzksNTEuOTksMTMuMTg2LDUyLjMwMiwxMi4zODUsNTIuMzAyeiBNMTIuMzg1LDQ3LjMwMiAgICAgYy0wLjUzNCwwLTEuMDM3LDAuMjA4LTEuNDE0LDAuNTg1Yy0wLjc4LDAuNzgtMC43OCwyLjA0OSwwLDIuODI5YzAuNzU1LDAuNzU2LDIuMDczLDAuNzU2LDIuODI5LDBjMC43OC0wLjc4LDAuNzgtMi4wNDksMC0yLjgyOSAgICAgQzEzLjQyMSw0Ny41MSwxMi45MTksNDcuMzAyLDEyLjM4NSw0Ny4zMDJ6IiBmaWxsPSIjMzc0NzRGIi8+PC9nPjxnPjxyZWN0IGZpbGw9IiMzNzQ3NEYiIGhlaWdodD0iNy4xNDkiIHRyYW5zZm9ybT0ibWF0cml4KDAuNjE0MyAwLjc4OTEgLTAuNzg5MSAwLjYxNDMgNDIuNDY3NiA0LjUwOTYpIiB3aWR0aD0iMSIgeD0iMTYuMTIxIiB5PSI0Mi4xMiIvPjwvZz48L2c+PGcgaWQ9IlhNTElEXzI4XyI+PGc+PHBhdGggZD0iTTU1LjM0NywyNC41Yy0xLjM1NCwwLTIuNTQ1LTAuOTE1LTIuODk2LTIuMjI0Yy0wLjIwOC0wLjc3NC0wLjEwMS0xLjU4MiwwLjI5OS0yLjI3NiAgICAgYzAuNDAxLTAuNjk0LDEuMDQ3LTEuMTksMS44MjEtMS4zOTdjMS41NzQtMC40MjIsMy4yNTUsMC41NTksMy42NzMsMi4xMjFjMC4yMDgsMC43NzQsMC4xMDEsMS41ODItMC4yOTksMi4yNzYgICAgIGMtMC40LDAuNjk0LTEuMDQ3LDEuMTktMS44MjEsMS4zOTdDNTUuODcxLDI0LjQ2NSw1NS42MDgsMjQuNSw1NS4zNDcsMjQuNXogTTU1LjM1LDE5LjVjLTAuMTc0LDAtMC4zNDksMC4wMjMtMC41MTksMC4wNjkgICAgIGMtMC41MTYsMC4xMzgtMC45NDcsMC40NjktMS4yMTQsMC45MzFjLTAuMjY3LDAuNDYzLTAuMzM4LDEuMDAxLTAuMiwxLjUxOGMwLjI3OSwxLjA0MSwxLjM5NiwxLjY5NSwyLjQ0OSwxLjQxNCAgICAgYzAuNTE2LTAuMTM4LDAuOTQ3LTAuNDY5LDEuMjE0LTAuOTMxYzAuMjY3LTAuNDYzLDAuMzM4LTEuMDAxLDAuMi0xLjUxOEM1Ny4wNDYsMjAuMTEsNTYuMjUyLDE5LjUsNTUuMzUsMTkuNXoiIGZpbGw9IiMzNzQ3NEYiLz48L2c+PGc+PHJlY3QgZmlsbD0iIzM3NDc0RiIgaGVpZ2h0PSIxMS40MyIgdHJhbnNmb3JtPSJtYXRyaXgoMC40MDYxIDAuOTEzOCAtMC45MTM4IDAuNDA2MSA1MC44NjM4IC0yOS41ODY2KSIgd2lkdGg9IjEiIHg9IjQ3LjY5NSIgeT0iMTguNjI1Ii8+PC9nPjwvZz48ZyBpZD0iWE1MSURfMjlfIj48Zz48cGF0aCBkPSJNNy42NTEsNDEuMDI0Yy0xLjEyOSwwLTIuMTIyLTAuNzYyLTIuNDE0LTEuODU0Yy0wLjM1Ni0xLjMzMiwwLjQzNy0yLjcwNSwxLjc2OC0zLjA2MiAgICAgYzEuMzE0LTAuMzUxLDIuNzEzLDAuNDY2LDMuMDYyLDEuNzY4YzAuMzU3LDEuMzMxLTAuNDM2LDIuNzA1LTEuNzY4LDMuMDYyQzguMDg2LDQwLjk5Niw3Ljg2OSw0MS4wMjQsNy42NTEsNDEuMDI0eiAgICAgIE03LjY1MywzNy4wMjRjLTAuMTMsMC0wLjI2MSwwLjAxNy0wLjM4OSwwLjA1MWMtMC43OTksMC4yMTQtMS4yNzUsMS4wMzgtMS4wNjEsMS44MzdjMC4yMSwwLjc4MSwxLjA0NiwxLjI3MywxLjgzNywxLjA2MSAgICAgYzAuNzk5LTAuMjE0LDEuMjc1LTEuMDM5LDEuMDYxLTEuODM3QzguOTI1LDM3LjQ4MSw4LjMzLDM3LjAyNCw3LjY1MywzNy4wMjR6IiBmaWxsPSIjMzc0NzRGIi8+PC9nPjxnPjxyZWN0IGZpbGw9IiMzNzQ3NEYiIGhlaWdodD0iMTAuMjA3IiB0cmFuc2Zvcm09Im1hdHJpeCgwLjI1ODggMC45NjU5IC0wLjk2NTkgMC4yNTg4IDQ2LjE5MjUgMTMuMTcyKSIgd2lkdGg9IjEiIHg9IjE0LjAxMyIgeT0iMzEuNTgyIi8+PC9nPjwvZz48ZyBpZD0iWE1MSURfMzBfIj48Zz48cGF0aCBkPSJNNTUuODQ5LDQyLjUyNGMtMC4yMTgsMC0wLjQzNi0wLjAyOS0wLjY0OC0wLjA4NWMtMS4zMzItMC4zNTctMi4xMjUtMS43MzEtMS43NjgtMy4wNjIgICAgIGMwLjM0OC0xLjMwMiwxLjc0Ny0yLjExOCwzLjA2Mi0xLjc2OGMwLjY0NSwwLjE3MywxLjE4NCwwLjU4NiwxLjUxOCwxLjE2NXMwLjQyMiwxLjI1MiwwLjI1LDEuODk3ICAgICBDNTcuOTcxLDQxLjc2Miw1Ni45NzgsNDIuNTI0LDU1Ljg0OSw0Mi41MjR6IE01NS44NDcsMzguNTI0Yy0wLjY3NywwLTEuMjcyLDAuNDU3LTEuNDQ4LDEuMTEyICAgICBjLTAuMjE0LDAuNzk5LDAuMjYyLDEuNjIzLDEuMDYxLDEuODM3YzAuNzkzLDAuMjEzLDEuNjI4LTAuMjgsMS44MzctMS4wNjFjMC4xMDQtMC4zODcsMC4wNTEtMC43OTEtMC4xNS0xLjEzOCAgICAgYy0wLjItMC4zNDctMC41MjMtMC41OTUtMC45MTEtMC42OTlDNTYuMTA4LDM4LjU0MSw1NS45NzgsMzguNTI0LDU1Ljg0NywzOC41MjR6IiBmaWxsPSIjMzc0NzRGIi8+PC9nPjxnPjxyZWN0IGZpbGw9IiMzNzQ3NEYiIGhlaWdodD0iMSIgdHJhbnNmb3JtPSJtYXRyaXgoMC45NjQ1IDAuMjY0MSAtMC4yNjQxIDAuOTY0NSAxMi4wNTA3IC0xMi4xMzY1KSIgd2lkdGg9IjUuNzA0IiB4PSI0OC4zMTQiIHk9IjM4LjI1MyIvPjwvZz48L2c+PGcgaWQ9IlhNTElEXzMxXyI+PGc+PHBhdGggZD0iTTkuODk3LDMxLjVjLTAuMjE4LDAtMC40MzYtMC4wMjktMC42NDgtMC4wODVjLTEuMzMyLTAuMzU3LTIuMTI1LTEuNzMxLTEuNzY4LTMuMDYyICAgICBjMC4zNDgtMS4zMDIsMS43NTEtMi4xMTksMy4wNjItMS43NjhjMS4zMzIsMC4zNTcsMi4xMjUsMS43MywxLjc2OCwzLjA2MkMxMi4wMTksMzAuNzM4LDExLjAyNiwzMS41LDkuODk3LDMxLjV6IE05Ljg5NSwyNy41ICAgICBjLTAuNjc3LDAtMS4yNzIsMC40NTctMS40NDgsMS4xMTJjLTAuMjE0LDAuNzk5LDAuMjYyLDEuNjIzLDEuMDYxLDEuODM3YzAuNzg3LDAuMjExLDEuNjI4LTAuMjgsMS44MzctMS4wNjEgICAgIGMwLjIxNC0wLjc5OS0wLjI2Mi0xLjYyMy0xLjA2MS0xLjgzN0MxMC4xNTcsMjcuNTE3LDEwLjAyNSwyNy41LDkuODk1LDI3LjV6IiBmaWxsPSIjMzc0NzRGIi8+PC9nPjxnPjxyZWN0IGZpbGw9IiMzNzQ3NEYiIGhlaWdodD0iMSIgdHJhbnNmb3JtPSJtYXRyaXgoMC45ODk1IDAuMTQ0MyAtMC4xNDQzIDAuOTg5NSA0LjQzNDggLTEuNjMzOSkiIHdpZHRoPSIzLjM0NCIgeD0iMTEuODExIiB5PSIyOS4yNTkiLz48L2c+PC9nPjxnIGlkPSJYTUxJRF8zMl8iPjxnPjxwYXRoIGQ9Ik03Ljg5NywyMi41Yy0wLjIxOCwwLTAuNDM2LTAuMDI5LTAuNjQ4LTAuMDg1Yy0xLjMzMi0wLjM1Ny0yLjEyNS0xLjczMS0xLjc2OC0zLjA2MiAgICAgYzAuMzQ5LTEuMzAyLDEuNzUtMi4xMiwzLjA2Mi0xLjc2OGMxLjMzMiwwLjM1NywyLjEyNSwxLjczLDEuNzY4LDMuMDYyQzEwLjAxOSwyMS43MzgsOS4wMjYsMjIuNSw3Ljg5NywyMi41eiBNNy44OTUsMTguNSAgICAgYy0wLjY3NywwLTEuMjcyLDAuNDU3LTEuNDQ4LDEuMTEyYy0wLjIxNCwwLjc5OSwwLjI2MiwxLjYyMywxLjA2MSwxLjgzN2MwLjc4OSwwLjIxMSwxLjYyNy0wLjI4LDEuODM3LTEuMDYxICAgICBjMC4yMTQtMC43OTktMC4yNjItMS42MjMtMS4wNjEtMS44MzdDOC4xNTcsMTguNTE3LDguMDI1LDE4LjUsNy44OTUsMTguNXoiIGZpbGw9IiMzNzQ3NEYiLz48L2c+PGc+PHJlY3QgZmlsbD0iIzM3NDc0RiIgaGVpZ2h0PSIxIiB0cmFuc2Zvcm09Im1hdHJpeCgwLjkwNjMgMC40MjI1IC0wLjQyMjUgMC45MDYzIDEwLjk4NzIgLTQuMDUyNikiIHdpZHRoPSIxMC42MDgiIHg9IjkuMzMxIiB5PSIyMi4yNTkiLz48L2c+PC9nPjxnIGlkPSJYTUxJRF8zM18iPjxnPjxwYXRoIGQ9Ik01MS4zOTIsNTAuODAyYy0wLjYsMC0xLjE4LTAuMjE2LTEuNjM0LTAuNjA4Yy0wLjUwNS0wLjQzNy0wLjgxLTEuMDQ0LTAuODU5LTEuNzEgICAgIHMwLjE2NS0xLjMxMSwwLjYwMi0xLjgxNmMwLjg2OC0xLjAwMiwyLjUyMi0xLjEyNiwzLjUyNi0wLjI1N2MxLjA0MywwLjkwMSwxLjE1OCwyLjQ4MywwLjI1NywzLjUyNiAgICAgQzUyLjgwOSw1MC40ODcsNTIuMTE5LDUwLjgwMiw1MS4zOTIsNTAuODAyeiBNNTEuMzk0LDQ2LjgwMmMtMC40MzcsMC0wLjg1MSwwLjE4OS0xLjEzNiwwLjUyYy0wLjI2MiwwLjMwMy0wLjM5LDAuNjktMC4zNjEsMS4wOSAgICAgYzAuMDI5LDAuMzk5LDAuMjEyLDAuNzY0LDAuNTE1LDEuMDI2YzAuNjAzLDAuNTIxLDEuNTk2LDAuNDQ4LDIuMTE2LTAuMTU0YzAuNTQxLTAuNjI1LDAuNDcyLTEuNTc1LTAuMTU0LTIuMTE2ICAgICBDNTIuMTAyLDQ2LjkzMiw1MS43NTMsNDYuODAyLDUxLjM5NCw0Ni44MDJ6IiBmaWxsPSIjMzc0NzRGIi8+PC9nPjxnPjxyZWN0IGZpbGw9IiMzNzQ3NEYiIGhlaWdodD0iMSIgdHJhbnNmb3JtPSJtYXRyaXgoMC43NzYyIDAuNjMwNSAtMC42MzA1IDAuNzc2MiAzOC4wNzk4IC0xOS4yNzU3KSIgd2lkdGg9IjkuNTA3IiB4PSI0MS40MzYiIHk9IjQzLjQ5NyIvPjwvZz48L2c+PGcgaWQ9IlhNTElEXzM0XyI+PGc+PHBhdGggZD0iTTE1LjE3OCwxNS42OThjLTAuNjY4LDAtMS4yOTYtMC4yNi0xLjc2OC0wLjczMmMtMC40NzItMC40NzItMC43MzItMS4xLTAuNzMyLTEuNzY4ICAgICBzMC4yNi0xLjI5NiwwLjczMi0xLjc2OGMwLjk0My0wLjk0NCwyLjU5Mi0wLjk0NCwzLjUzNSwwYzAuNDcyLDAuNDcyLDAuNzMyLDEuMSwwLjczMiwxLjc2OGMwLDAuNjY3LTAuMjYsMS4yOTUtMC43MzIsMS43NjggICAgIEMxNi40NzQsMTUuNDM4LDE1Ljg0NiwxNS42OTgsMTUuMTc4LDE1LjY5OHogTTE1LjE3OCwxMS42OThjLTAuNDAxLDAtMC43NzcsMC4xNTYtMS4wNjEsMC40MzlzLTAuNDM5LDAuNjYtMC40MzksMS4wNjEgICAgIHMwLjE1NiwwLjc3NywwLjQzOSwxLjA2MWMwLjU2NiwwLjU2NiwxLjU1NSwwLjU2NiwyLjEyMSwwYzAuMjgzLTAuMjgzLDAuNDM5LTAuNjYsMC40MzktMS4wNjFjMC0wLjQwMS0wLjE1Ni0wLjc3Ny0wLjQzOS0xLjA2MSAgICAgUzE1LjU3OSwxMS42OTgsMTUuMTc4LDExLjY5OHoiIGZpbGw9IiMzNzQ3NEYiLz48L2c+PGc+PHJlY3QgZmlsbD0iIzM3NDc0RiIgaGVpZ2h0PSIxIiB0cmFuc2Zvcm09Im1hdHJpeCgwLjY3MjcgMC43Mzk5IC0wLjczOTkgMC42NzI3IDE4LjYzMDUgLTguMjkwMikiIHdpZHRoPSI2LjIyNyIgeD0iMTUuNTczIiB5PSIxNi40MTUiLz48L2c+PC9nPjxyZWN0IGZpbGw9IiMzNzQ3NEYiIGhlaWdodD0iMSIgd2lkdGg9IjEiIHg9IjQyIiB5PSIyMSIvPjxyZWN0IGZpbGw9IiMzNzQ3NEYiIGhlaWdodD0iMSIgd2lkdGg9IjEiIHg9IjI5IiB5PSIzNSIvPjxyZWN0IGZpbGw9IiMzNzQ3NEYiIGhlaWdodD0iMSIgd2lkdGg9IjEiIHg9IjI0IiB5PSI0MyIvPjxyZWN0IGZpbGw9IiMzNzQ3NEYiIGhlaWdodD0iMSIgd2lkdGg9IjEiIHg9IjIxIiB5PSI0MCIvPjxyZWN0IGZpbGw9IiMzNzQ3NEYiIGhlaWdodD0iMSIgd2lkdGg9IjEiIHg9IjI0IiB5PSIzOSIvPjxyZWN0IGZpbGw9IiMzNzQ3NEYiIGhlaWdodD0iMSIgd2lkdGg9IjEiIHg9IjM4IiB5PSI0MyIvPjxyZWN0IGZpbGw9IiMzNzQ3NEYiIGhlaWdodD0iMSIgd2lkdGg9IjEiIHg9IjM5IiB5PSI0MCIvPjxyZWN0IGZpbGw9IiMzNzQ3NEYiIGhlaWdodD0iMSIgd2lkdGg9IjEiIHg9IjQ2IiB5PSIzNCIvPjxyZWN0IGZpbGw9IiMzNzQ3NEYiIGhlaWdodD0iMSIgd2lkdGg9IjEiIHg9IjQ1IiB5PSIzMCIvPjxyZWN0IGZpbGw9IiMzNzQ3NEYiIGhlaWdodD0iMSIgd2lkdGg9IjEiIHg9IjI5IiB5PSIyMyIvPjxyZWN0IGZpbGw9IiMzNzQ3NEYiIGhlaWdodD0iMSIgd2lkdGg9IjEiIHg9IjMyIiB5PSIyMSIvPjxyZWN0IGZpbGw9IiMzNzQ3NEYiIGhlaWdodD0iMSIgd2lkdGg9IjEiIHg9IjMxIiB5PSIxOSIvPjxyZWN0IGZpbGw9IiMzNzQ3NEYiIGhlaWdodD0iMSIgd2lkdGg9IjEiIHg9IjMzIiB5PSIzNCIvPjxyZWN0IGZpbGw9IiMzNzQ3NEYiIGhlaWdodD0iMSIgd2lkdGg9IjEiIHg9IjE4IiB5PSIzMCIvPjxyZWN0IGZpbGw9IiMzNzQ3NEYiIGhlaWdodD0iMSIgd2lkdGg9IjEiIHg9IjIxIiB5PSIyNyIvPjxnIGlkPSJYTUxJRF8zNV8iPjxnPjxwYXRoIGQ9Ik00Mi45OTksNTUuMTIzYy0xLjEyOSwwLTIuMTIyLTAuNzYyLTIuNDE0LTEuODU0Yy0wLjM1Ni0xLjMzMiwwLjQzNy0yLjcwNSwxLjc2OC0zLjA2MiAgICAgYzEuMzEtMC4zNTMsMi43MTMsMC40NjUsMy4wNjIsMS43NjhjMC4zNTYsMS4zMzItMC40MzcsMi43MDUtMS43NjgsMy4wNjJDNDMuNDM1LDU1LjA5NCw0My4yMTcsNTUuMTIzLDQyLjk5OSw1NS4xMjN6ICAgICAgTTQzLjAwMSw1MS4xMjJjLTAuMTMsMC0wLjI2MiwwLjAxOC0wLjM5LDAuMDUyYy0wLjc5OSwwLjIxNC0xLjI3NSwxLjAzOC0xLjA2MSwxLjgzN2MwLjIxLDAuNzgxLDEuMDQ5LDEuMjczLDEuODM3LDEuMDYxICAgICBjMC43OTktMC4yMTQsMS4yNzUtMS4wMzksMS4wNjEtMS44MzdDNDQuMjczLDUxLjU3OSw0My42NzgsNTEuMTIyLDQzLjAwMSw1MS4xMjJ6IiBmaWxsPSIjMzc0NzRGIi8+PC9nPjxnPjxyZWN0IGZpbGw9IiMzNzQ3NEYiIGhlaWdodD0iMSIgdHJhbnNmb3JtPSJtYXRyaXgoMC41MTQ3IDAuODU3NCAtMC44NTc0IDAuNTE0NyA2Mi4xMDk2IC0xMS4yNTg2KSIgd2lkdGg9IjMuODg3IiB4PSIzOS4wNTYiIHk9IjQ4LjczMyIvPjwvZz48L2c+PGcgaWQ9IlhNTElEXzM2XyI+PGc+PHBhdGggZD0iTTU0LjExMSwzMy43Yy0xLjMzMSwwLTIuNDI3LTEuMDQyLTIuNDk1LTIuMzczYy0wLjAzNC0wLjY2NywwLjE5NC0xLjMwNywwLjY0Mi0xLjgwMyAgICAgYzAuNDQ3LTAuNDk2LDEuMDYxLTAuNzg3LDEuNzI4LTAuODIxbDAuMTI5LTAuMDAzYzEuMzMxLDAsMi40MjcsMS4wNDIsMi40OTUsMi4zNzNjMC4wMzQsMC42NjctMC4xOTQsMS4zMDctMC42NDEsMS44MDMgICAgIGMtMC40NDgsMC40OTYtMS4wNjIsMC43ODctMS43MjksMC44MjFMNTQuMTExLDMzLjd6IE01NC4xMTUsMjkuN2MtMC40NzksMC4wMjItMC44NDcsMC4xOTctMS4xMTUsMC40OTUgICAgIHMtMC40MDUsMC42ODEtMC4zODUsMS4wODJjMC4wNDEsMC43OTgsMC42OTgsMS40MjMsMS40OTYsMS40MjNsMC4wNzgtMC4wMDJjMC40LTAuMDIsMC43NjktMC4xOTUsMS4wMzctMC40OTMgICAgIHMwLjQwNS0wLjY4MSwwLjM4NC0xLjA4MUM1NS41NywzMC4zMjUsNTQuOTEzLDI5LjcsNTQuMTE1LDI5Ljd6IiBmaWxsPSIjMzc0NzRGIi8+PC9nPjxnPjxyZWN0IGZpbGw9IiMzNzQ3NEYiIGhlaWdodD0iMSIgdHJhbnNmb3JtPSJtYXRyaXgoMC45OTk0IDAuMDM0MiAtMC4wMzQyIDAuOTk5NCAxLjA5NzcgLTEuNzE1OSkiIHdpZHRoPSIyLjc0MyIgeD0iNDkuMzczIiB5PSIzMC43NTUiLz48L2c+PC9nPjwvZz48L3N2Zz4=">
        <span class="pt-2 text-lg">Covid19 Data (This is not a clone of anything ... that I know of)</span>
    </a>

    <a href="{{ route('tailwind.blog') }}" class="flex text-center hover:bg-gray-200">
        <svg class="w-10 h-10 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
        <span class="pl-2 pt-2 text-lg">Blog Layout</span>
    </a>
</section>
{{-- footer --}}
@endsection

@section('scripts')
@endsection
