<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>Nature Thing Green</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');
    body {
      font-family: 'Montserrat', sans-serif;
    }
    .bg-overlay {
      background-color: rgba(0, 0, 0, 0.5);
    }
  </style>
</head>
<body class="m-0 p-0">
  <div class="min-h-screen flex flex-col relative">
    <img alt="Close-up photo of fresh green herbal plants with natural sunlight"
         class="absolute inset-0 w-full h-full object-cover brightness-75"
         src="https://storage.googleapis.com/a1aa/image/cbf95115-18aa-43ed-c95c-936a178c0a0e.jpg"/>
    <div class="absolute inset-0 bg-overlay"></div>

    <header class="relative z-10 flex justify-between items-center px-6 py-4">
      <div class="text-white font-bold text-lg tracking-wide">YOUR LOGO</div>
      <nav class="hidden md:flex space-x-6 text-white text-sm font-normal">
        <a class="hover:underline" href="{{ url('/landing') }}">Home</a>
        <a class="hover:underline" href="{{ url('/tentang') }}">About Us</a>
      </nav>
        <!-- Logout -->
  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit"class="hidden md:block bg-white text-gray-800 text-xs font-normal px-4 py-1 rounded-sm hover:bg-gray-100 transition">
      <i class="fas fa-sign-out-alt mr-1"></i> Login
    </button>
  </form>
    </header>

    <main class="relative z-10 flex flex-1 flex-col justify-center items-start px-6 md:px-20 py-20 max-w-4xl mx-auto text-white">
      <h2 class="text-4xl font-light tracking-wide mb-2">NATURE</h2>
      <h1 class="text-6xl font-extrabold tracking-wide mb-8">THING GREEN</h1>
      <p class="text-base font-normal leading-relaxed mb-10 max-w-xl">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate.
      </p>
      <div class="flex items-center space-x-6">
        <a href="/login" class="bg-white text-gray-800 text-sm font-semibold px-8 py-3 rounded-full shadow-md hover:bg-gray-100 transition">
          Lakukan Pembelian
        </a>
        <span class="text-white text-sm font-normal">or contact</span>
      </div>
    </main>
  </div>
</body>
</html>
