<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>@yield('title', 'Bhumihara Farma')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <style>
    .tooltip-arrow {
      width: 0;
      height: 0;
      border-style: solid;
      border-width: 6px 6px 0 6px;
      border-color: #065f46 transparent transparent transparent;
      position: absolute;
      bottom: -6px;
      left: 50%;
      transform: translateX(-50%);
    }
    .tooltip-arrow-red {
      border-color: #ff0000 transparent transparent transparent;
    }
  </style>
</head>
<body class="bg-white font-sans">
  {{-- Navbar --}}
  @include('navbar.pengguna')

  {{-- Main Content --}}
  <main class="max-w-7xl mx-auto px-6 py-10 space-y-20">
    @yield('content')
  </main>
</body>
</html>
