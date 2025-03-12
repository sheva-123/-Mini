<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menunggu Konfirmasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen flex flex-col justify-center items-center bg-cover bg-center"
    style="background-image: url('assets/images/pending.png');">

    <!-- Animasi Loading -->
    <div class="flex items-center justify-center space-x-2 mb-4">
        <div class="w-4 h-4 bg-green-800 rounded-full animate-bounce"></div>
        <div class="w-4 h-4 bg-yellow-500 rounded-full animate-bounce delay-150"></div>
        <div class="w-4 h-4 bg-green-800 rounded-full animate-bounce delay-300"></div>
    </div>

    <!-- Teks -->
    <h2 class="text-dark text-lg font-semibold">Menunggu Konfirmasi</h2>

    <!-- Tombol Logout -->
    <form method="POST" action="{{ route('logout') }}" class="mt-6">
        @csrf
        <button type="submit" onclick="logout(event)"
            class="bg-white text-gray-700 px-6 py-2 rounded-full shadow-md hover:bg-red-600 hover:text-white transition">
            Logout
        </button>
    </form>

</body>

</html>
