<header class="header-area header-sticky bg-white shadow-md">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center">
            <!-- Logo and Navigation Menu -->
            <div class="flex items-center">
                <nav class="main-nav flex items-center justify-center">
                    <!-- Logo -->
                    <a href="{{ route('home') }}" class="logo">
                        <h1 class="text-lg font-semibold text-gray-900">{{ $configurations->title }}</h1>
                    </a>

                    <!-- Menu -->
                    <ul class="nav flex space-x-4 ml-4">
                        <li>
                            <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600">Home</a>
                        </li>
                        <li>
                            <a href="#props" class="text-gray-700 hover:text-blue-600">Property Details</a>
                        </li>
                        <li>
                            <a href="#contact" class="text-gray-700 hover:text-blue-600">Contact Us</a>
                        </li>
                        <li class="text-center">
                            <div class="flex items-center">
                                @if (Route::has('login'))
                                    @auth
                                        <div class="relative dropdown">
                                            <a href="#" class="flex items-center text-gray-700 hover:text-blue-600">
                                                <i class="fa fa-user text-xl"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a href="{{ route('profile.edit') }}" class="dropdown-item text-center ">Modifier</a>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item dropdown-button text-center">
                                                        {{ __('Déconnecter') }}
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @else
                                        <a href="{{ route('login') }}" class="text-black  text-center rounded-full connect-btn">
                                            Se connecter
                                        </a>
                                    @endauth
                                @endif
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Login/Dropdown Section -->

        </div>
    </div>
</header>
