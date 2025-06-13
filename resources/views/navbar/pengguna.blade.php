<!-- navbar.html -->
<header class="bg-white shadow-md fixed w-full z-50">
  <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">

    <!-- Logo & Menu -->
    <div class="flex items-center space-x-5">
      <button aria-label="Menu" class="text-2xl text-teal-600 hover:text-teal-800 lg:hidden">
        <i class="fas fa-bars"></i>
      </button>
      <a href="#" class="flex items-center space-x-2">
        <img src="https://storage.googleapis.com/a1aa/image/3b6fdb0e-78fb-4269-36c8-4ed708a9fbea.jpg" alt="Logo" class="h-10 w-auto rounded shadow-sm" />
        <span class="hidden sm:inline text-lg font-bold text-teal-700">Bhumihara Farma</span>
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
      <a href="#" class="relative text-teal-600 hover:text-teal-800 text-xl">
        <i class="fas fa-shopping-cart"></i>
        <span class="absolute -top-2 -right-3 bg-red-500 text-white text-xs font-semibold rounded-full w-5 h-5 flex items-center justify-center">0</span>
      </a>

      <!-- User -->
      <a href="#" class="text-gray-600 hover:text-gray-900 text-2xl">
        <i class="fas fa-user-circle"></i>
      </a>
    </div>
  </div>
</header>
