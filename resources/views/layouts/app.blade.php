<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen">
            <header class="bg-white shadow-md sticky top-0 z-40">
                <div class="container mx-auto px-4">
                    <div class="flex items-center justify-between h-16">
                        <a href="{{ route('home') }}" class="text-2xl font-bold text-indigo-600">
                            DesaGoMarket
                        </a>

                        <div class="hidden md:block flex-1 max-w-xl mx-4">
                            <div class="relative">
                                <input type="search" placeholder="Cari produk di DesaGoMarket..." class="w-full border-gray-300 rounded-md pl-10 focus:ring-indigo-500 focus:border-indigo-500">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            {{-- Ikon Keranjang (sudah kita perbaiki sebelumnya) --}}
                            <a href="{{ route('cart.index') }}" class="relative text-gray-700 hover:text-indigo-600">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                                @auth
                                    @if(Cart::count() > 0)
                                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">{{ Cart::count() }}</span>
                                    @endif
                                @endauth
                            </a>

                            @auth
                                {{-- Dropdown untuk pengguna yang sudah login --}}
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                            <div>{{ Auth::user()->name }}</div>
                                            <div class="ms-1"><svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg></div>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        @if(Auth::user()->role === 'pembeli')
                                            <x-dropdown-link :href="route('dashboard')">{{ __('Dashboard') }}</x-dropdown-link>
                                        @elseif(Auth::user()->role === 'penjual')
                                             <x-dropdown-link :href="route('penjual.dashboard')">{{ __('Dashboard') }}</x-dropdown-link>
                                        @elseif(Auth::user()->role === 'admin')
                                             <x-dropdown-link :href="route('admin.dashboard')">{{ __('Dashboard') }}</x-dropdown-link>
                                        @endif
                                        <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            @else
                                {{-- Tombol untuk tamu --}}
                                <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-indigo-600">Log in</a>
                                <a href="{{ route('register') }}" class="text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-md">Register</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </header>

            <main class="py-8">
                {{ $slot }}
            </main>
        </div>

        <footer class="bg-gray-800 text-white">
            <div class="container mx-auto px-4 py-6 text-center">
                <p>&copy; {{ date('Y') }} DesaGoMarket. Diberdayakan oleh Kelompok KKN Desa Sukamakmur.</p>
            </div>
        </footer>

        @livewireScripts
        @stack('scripts')
    </body>
</html>