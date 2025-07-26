<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Etnofarmaka</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="flex items-center justify-center min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('img/background.jpg') }}');">
    <div class="bg-white bg-opacity-90 p-8 rounded-xl shadow-xl w-80 text-center">
        {{-- Logo / Judul --}}
        <div class="mb-6">
            <img src="{{ asset('img/tes.png') }}" alt="Etnofarmaka" class="w-14 h-14 mx-auto mb-2 rounded-full object-cover">
            <h1 class="text-2xl text-green-700 font-semibold tracking-wide">Etnofarmaka</h1>
            <p class="text-gray-500 text-sm">Login untuk melanjutkan</p>
        </div>

        {{-- Pesan Error --}}
        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm bg-red-100 p-3 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Pesan Status --}}
        @if (session('status'))
            <div class="mb-4 text-green-600 text-sm bg-green-100 p-3 rounded">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"
                       class="w-full p-2 rounded-full border border-green-400 bg-transparent text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-400"
                       required autofocus>
            </div>

            {{-- Password --}}
            <div class="mb-6 relative">
                <input type="password" name="password" id="password" placeholder="Password"
                       class="w-full p-2 rounded-full border border-green-400 bg-transparent text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-400"
                       required autocomplete="current-password">
                <span onclick="togglePassword()" class="absolute right-3 top-3 text-gray-500 cursor-pointer">
                    <i id="eyeIcon" class="fas fa-eye"></i>
                </span>
            </div>

            {{-- Tombol Login --}}
            <button type="submit"
                    class="w-full p-2 rounded-full border border-green-500 text-white bg-green-600 hover:bg-green-700 transition focus:outline-none focus:ring-2 focus:ring-green-400">
                Login
            </button>
        </form>

        {{-- Navigasi Register dan Lupa Password --}}
        <div class="flex justify-between mt-4 text-sm text-green-700">
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="hover:underline">Register</a>
            @endif

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="hover:underline">Lupa Password?</a>
            @endif
        </div>
    </div>

    {{-- Script untuk toggle password --}}
    <script>
        function togglePassword() {
            let passwordField = document.getElementById("password");
            let eyeIcon = document.getElementById("eyeIcon");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.classList.replace("fa-eye", "fa-eye-slash");
            } else {
                passwordField.type = "password";
                eyeIcon.classList.replace("fa-eye-slash", "fa-eye");
            }
        }
    </script>
</body>
</html>
