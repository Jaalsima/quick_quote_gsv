<nav x-data="{ open: false }" class="bg-white border-b" style="background: rgb(22,48,81); background: linear-gradient(90deg, rgba(22,48,81,1) 0%, rgba(66,87,114,1) 100%);">
    <div class="ml-4">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="/" :active="request()->routeIs('dashboard')">
                        {{ __('Inicio') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                        {{ __('Quiénes somos') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('services') }}" :active="request()->routeIs('services')">
                        {{ __('Nuestros servicios') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('blog') }}" :active="request()->routeIs('blog')">
                        {{ __('Blog') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                        {{ __('Contacto') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">


                <div class="ml-3">
                    <x-nav-link href="{{ route('login') }}" class="text-white hover:text-gray-300">
                        {{ __('Login') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('register') }}" class="btn-primary">
                        {{ __('Registrarse') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="/" :active="request()->routeIs('dashboard')">
                {{ __('Inicio') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                {{ __('Quiénes somos') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('services') }}" :active="request()->routeIs('services')">
                {{ __('Nuestros servicios') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('blog') }}" :active="request()->routeIs('blog')">
                {{ __('Blog') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                {{ __('Contacto') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('login') }}" class="text-white hover:text-gray-300">
                {{ __('Iniciar sesión') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('register') }}" class="btn-primary">
                {{ __('Registrarse') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
