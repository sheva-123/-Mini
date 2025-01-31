<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending</title>
</head>

<body>
    Menunggu Konfirmasi Admin

    <br>
    <form method="POST" action="{{ route('logout') }}" class="px-4 py-2 flex items-center">
        @csrf
        <button type="submit" onclick="logout(event)" class="flex items-center text-gray-700 hover:text-red-600">
            <i class="fas fa-sign-out-alt"></i>
            <span class="ml-3">Logout</span>
        </button>
    </form>
</body>

</html>