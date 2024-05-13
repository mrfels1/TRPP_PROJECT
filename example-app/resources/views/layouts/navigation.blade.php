<!-- <link href="{{ asset('allStyle.css') }}" rel="stylesheet"> -->
@vite(['resources/css/NavStyle.css'])
<script src=></script>
<!-- <script>
    document.getElementById('create-post-link').addEventListener('click', function() {
        var img = document.querySelector('.create-post-btn');
        img.src = "{{ asset('PressedCreateButton.svg') }}";
    });
</script> -->

<!-- <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700"> -->
<nav x-data="{ open: false }">
    <div class="forum-header">

        <!-- ЧЕ ЭТО ЗА ПОЕБЕНЬ БЛЯТЬ ВОЛШЕБНАЯ ТАКАЯ-->
        <div class="shrink-0 flex items-center">
            <a href="{{ route('main') }}">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
            </a>
        </div>
        <div class="forum-logo">
            <img src="{{ asset('LLLogo.png') }}" class="forum-logo" />
        </div>


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
        @if (Route::has('login'))
        <!-- Если есть метод(?) login в rotes -->
        <div class="CREATEpost">
            <!-- Проверяет залогинен ли пользователь -->
            @if (Auth::check())

            <a href="{{ route('post.createpost')}}" id="create-post-link">
                <img src="{{ asset('CreateButton.svg') }}" class="create-post-btn" alt="Create" aria-hidden="true" />
            </a>


            <!-- TODO: -->
            @else
            <div class="LoginBtn">
                <a href="{{ url('/login') }}">Login</a>
            </div>
            <div class="LoginBtn">
                <a href="{{ url('/register') }}">Register</a>
            </div>
            @endif
        </div>
        @endif

        @if (Auth::check())
        <!-- Settings Dropdown -->
        <div class="hidden sm:flex sm:items-center sm:ms-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="dropdown-button inline-flex items-center px-3 py-2 border
                             border-transparent text-sm leading-4 font-medium rounded-md
                             text-gray-500 dark:text-gray-400
                             hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none
                             transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
        @endif
        <!-- Hamburger -->
        <div class=" Responsive -me-2 flex items-center sm:hidden">
            <button @click="open = ! open" class=" Responsive inline-flex items-center justify-center p-2 rounded-md text-gray-400
                    hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none
                    focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition
                    duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <!-- </div> -->


    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

        @if (Auth::check())
        <!-- Responsive Settings Options -->
        <div class="Responsive">
            <div class="px-4">
                <div class="font-medium text-base" style="color: #fff;">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm" style="color: #fff;">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1" style="color: #fff;">
                <x-responsive-nav-link class="profile-btn" :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link class="profile-btn" :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endif
    </div>
</nav>