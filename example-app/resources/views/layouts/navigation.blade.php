<link href="{{ asset('allStyle.css') }}" rel="stylesheet">
<link href="{{ asset('css/NavStyle.css') }}" rel="stylesheet">
@vite(['resources/css/app.css', 'resources/js/app.js','resources/css/NavStyle.css'])



<nav x-data="{ open: false }">
    <div class="forum-header">
        <!-- Primary Navigation Menu -->

        <!-- ЧЕ ЭТО ЗА ПОЕБЕНЬ БЛЯТЬ ВОЛШЕБНАЯ ТАКАЯ-->

        <a href="{{ route('main') }}">
            <div class="forum-logo">
                <img src="{{ asset('LLLogo.png') }}" class="forum-logo" />
            </div>
        </a>


        <!-- Поиск -->
        <div class="big-search-container">
            <form action="{{route('posts')}}" method="GET">
                <div class="search-container">
                    <img src="{{ asset('search.png') }}" alt="User" class="user-icon" />
                    <input class="search-input" name="search" placeholder="Search..." type="text">
                </div>

                <div>
                    <input type="radio" id="dateChoice" name="sortBy" value="date" />
                    <label style="color:white;" for="dateChoice">Date</label>

                    <input type="radio" id="upChoice" name="sortBy" value="up" />
                    <label style="color:white;" for="upChoice">▲</label>

                    <input type="radio" id="upChoice" name="sortBy" value="down" />
                    <label style="color:white;" for="upChoice">▼</label>
                </div>

            </form>
        </div>



        <!-- Settings Dropdown -->

        @if (Auth::check())
        <div class="dropdown">
            <button class="dropdown-button" type="button" id="dropdownMenuButton">
                {{ Auth::user()->name }}
            </button>
            <div class="dropdown-menu show">
                <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                <form class="dropdown-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <input type="submit" class="logout" value="Log Out">
                </form>
            </div>
        </div>
        @else
        <a class="dropdown-button login-dropdown-button" href="{{ route('login') }}">Login</a>
        @endif
    </div>
</nav>