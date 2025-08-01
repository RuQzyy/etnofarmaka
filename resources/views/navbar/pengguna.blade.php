<!-- navbar.html -->
<header class="bg-white shadow-md fixed w-full z-50">
  <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">

    <!-- Logo & Menu -->
    <div class="flex items-center space-x-5">
      <button aria-label="Menu" class="text-2xl text-teal-600 hover:text-teal-800 lg:hidden">
        <i class="fas fa-bars"></i>
      </button>
      <a href="{{route('pengguna.dashboard')}}" class="flex items-center space-x-2">
        <img src="{{asset('images/logo etnofarmaka.png')}}" alt="Logo" class="h-10 w-auto rounded shadow-sm" />
        <span class="hidden sm:inline text-lg font-bold text-teal-700">Etnofarmaka Digital</span>
      </a>
    </div>

    <!-- Search Bar -->
    <form class="hidden md:flex items-center w-full max-w-md mx-6">
      <input
        type="search"
        placeholder="Ketik kata kunci pencarian"
        aria-label="Search"
        class="w-full rounded-full border border-gray-300 bg-gray-100 px-4 py-2 text-gray-600 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-600 transition"
      />
      <button
        type="submit"
        class="ml-2 rounded-full bg-teal-600 px-4 py-2 text-white hover:bg-teal-700 flex items-center space-x-2"
      >
        <i class="fas fa-search"></i>
        <span class="font-medium">Cari</span>
      </button>
    </form>

    <!-- Icons -->
    <div class="flex items-center space-x-6">
      <!-- Cart -->
      <a href="{{ route('keranjang.index') }}" class="relative text-gray-600 hover:text-teal-600">
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>

        @if(isset($jumlahItemKeranjang) && $jumlahItemKeranjang > 0)
          <span class="absolute -top-2 -right-2 flex h-5 w-5 items-center justify-center rounded-full bg-red-600 text-xs text-white">
            {{ $jumlahItemKeranjang }}
          </span>
        @endif
      </a>
      {{-- pemesanan --}}
      <a href="{{route('pemesanan.index')}}" class="text-gray-600 hover:text-gray-900 text-2xl">
        <i class="fas fa-file-invoice-dollar"></i>
      </a>

      <!-- Logout -->
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="text-gray-600 hover:text-red-600 text-sm font-semibold">
          <i class="fas fa-sign-out-alt mr-1"></i> Logout
        </button>
      </form>
    </div>
  </div>
</header>
