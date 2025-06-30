<div x-show="sidebarOpen" class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden" @click="sidebarOpen = false"></div>

<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-gray-900 lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex items-center justify-center mt-8">
        <div class="flex items-center">
            <span class="text-white text-2xl mx-2 font-semibold">DesaGoMarket</span>
        </div>
    </div>

    <nav class="mt-10">
        {{-- MENU UNTUK ADMIN --}}
        @if(auth()->check() && auth()->user()->role == 'admin')
        <a class="flex items-center mt-4 py-2 px-6 text-gray-100 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700 bg-opacity-25' : '' }}" href="{{ route('admin.dashboard') }}">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
            </svg>
            <span class="mx-3">Dashboard</span>
        </a>
        
        <p class="px-6 pt-4 text-gray-400 text-xs uppercase">General</p>
            <a class="flex items-center mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ request()->routeIs('admin.categories.index') ? 'bg-gray-700 bg-opacity-25' : '' }}" href="{{ route('admin.categories.index') }}">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" /><path stroke-linecap="round" stroke-linejoin="round" d="M6 9h.008v.008H6V9z" /></svg>
                <span class="mx-3">Categories</span>
            </a>
        <a class="flex items-center mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="#">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c.51 0 .962-.343 1.087-.835l.383-1.437M7.5 14.25V5.106c0-.612.501-1.106 1.106-1.106H15.894c.612 0 1.106.501 1.106 1.106v9.144M7.5 14.25h11.218c.51 0 .962-.343 1.087-.835l.383-1.437M15 5.25h.008v.008H15V5.25z" />
            </svg>
            <span class="mx-3">Products</span>
        </a>

        {{-- MENU UNTUK PENJUAL --}}
        @elseif(auth()->check() && auth()->user()->role == 'penjual')
        <a class="flex items-center mt-4 py-2 px-6 text-gray-100 {{ request()->routeIs('penjual.dashboard') ? 'bg-gray-700 bg-opacity-25' : '' }}" href="{{ route('penjual.dashboard') }}">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" /></svg>
            <span class="mx-3">Dashboard</span>
        </a>
        <a class="flex items-center mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ request()->routeIs('admin.categories.index') ? 'bg-gray-700 bg-opacity-25' : '' }}" 
        href="{{ route('admin.categories.index') }}">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 9h.008v.008H6V9z" />
            </svg>
            <span class="mx-3">Categories</span>
        </a>
        <a class="flex items-center mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 ... {{ request()->routeIs('penjual.products.index') ? 'bg-gray-700 bg-opacity-25' : '' }}" href="{{ route('penjual.products.index') }}">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c.51 0 .962-.343 1.087-.835l.383-1.437M7.5 14.25V5.106c0-.612.501-1.106 1.106-1.106H15.894c.612 0 1.106.501 1.106 1.106v9.144M7.5 14.25h11.218c.51 0 .962-.343 1.087-.835l.383-1.437M15 5.25h.008v.008H15V5.25z" /></svg>
            <span class="mx-3">Produk Saya</span>
        </a>

        <a class="flex items-center mt-4 py-2 px-6 ... {{ request()->routeIs('penjual.products.create') ? '...' : '' }}" href="{{ route('penjual.products.create') }}">... Tambah Produk</a>
        <a class="flex items-center mt-4 py-2 px-6 ... {{ request()->routeIs('penjual.orders.index') ? '...' : '' }}" href="{{ route('penjual.orders.index') }}">... Pesanan Masuk</a>
        <a class="flex items-center mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 ... {{ request()->routeIs('penjual.orders.index') ? 'bg-gray-700 ...' : '' }}" 
        href="{{ route('penjual.orders.index') }}"> {{-- <-- UBAH INI --}}
            {{-- ... ikon dan teks ... --}}
        </a>
        @endif
    </nav>
</div>