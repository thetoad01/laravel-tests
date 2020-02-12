<nav class="navbar navbar-dark bg-dark mx-n4">
    <a class="navbar-brand pl-3" href="/"><i class="fa fa-home"></i></a>
    @auth
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link text-white">Dashboard</a>
            </li>
        </ul>
    @endauth

    @auth
    <div class="float-right pr-4">
        <a href="{{ route('logout') }}" class="text-light" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Logout</a>
        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
    </div>
    @endauth
</nav>
