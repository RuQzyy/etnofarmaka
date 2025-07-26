<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Etnofarmaka</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="flex items-center justify-center min-h-screen bg-cover bg-center"style="background-image: url('{{ asset('img/background.jpg') }}');">

    <div class="bg-white bg-opacity-90 p-8 rounded-xl shadow-xl w-96 text-center">
        <div class="mb-6">
            <img src="{{ asset('img/logo-etnofarmaka.png') }}" alt="Logo Etnofarmaka" class="w-14 h-14 mx-auto mb-2 rounded-full object-cover">
            <h1 class="text-2xl font-semibold text-green-700">Daftar Akun</h1>
            <p class="text-gray-500 text-sm">Gabung dan nikmati kemudahan belanja herbal</p>
        </div>

        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm bg-red-100 p-3 rounded text-left">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="text-left space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                       class="mt-1 block w-full px-4 py-2 border border-green-400 rounded-full bg-transparent text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                       class="mt-1 block w-full px-4 py-2 border border-green-400 rounded-full bg-transparent text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>

            <!-- Role -->
            <div>
                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                <select id="role" name="role"
                        class="mt-1 block w-full px-4 py-2 border border-green-400 rounded-full bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-400">
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="pengguna" {{ old('role') == 'pengguna' ? 'selected' : '' }}>Pengguna</option>
                </select>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required
                       class="mt-1 block w-full px-4 py-2 border border-green-400 rounded-full bg-transparent text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                       class="mt-1 block w-full px-4 py-2 border border-green-400 rounded-full bg-transparent text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>

            <!-- Submit -->
            <div class="pt-2">
                <button type="submit"
                        class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-full transition focus:outline-none focus:ring-2 focus:ring-green-400">
                    Daftar
                </button>
            </div>

            <!-- Link Login -->
            <div class="mt-4 text-center text-sm text-gray-600">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-green-600 hover:underline">Masuk di sini</a>
            </div>
        </form>
    </div>
</body>
</html>
