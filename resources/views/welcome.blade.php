<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pertanian Mewah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        /* Latar belakang bergerak */
        .background-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            animation: moveBackground 60s linear infinite;
        }

        @keyframes moveBackground {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: 100% 100%;
            }
        }
    </style>
</head>

<body class="bg-gradient-to-r from-green-500 to-green-700 text-white font-sans">

    <!-- Latar belakang video bergerak bertema pertanian -->
    <video class="background-video" autoplay loop muted>
        <source src="https://www.pexels.com/id-id/video/pemandangan-udara-indah-dari-lanskap-hijau-29765630/" type="video/mp4"> <!-- Ganti dengan URL video pertanian -->
        Video tidak didukung oleh browser Anda.
    </video>

    <!-- Navbar -->
    <nav class="fixed w-full z-50 bg-transparent text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-6 py-6 flex justify-between items-center">
            <div class="text-4xl font-extrabold tracking-wider">AgriTech</div>
            <div class="space-x-10 text-lg hidden lg:flex">
                <a href="#hero" class="hover:text-yellow-500 transition duration-300">Beranda</a>
                <a href="#features" class="hover:text-yellow-500 transition duration-300">Fitur</a>
                <a href="#about" class="hover:text-yellow-500 transition duration-300">Tentang Kami</a>
                <a href="#contact" class="hover:text-yellow-500 transition duration-300">Kontak</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative h-screen bg-cover bg-center flex items-center justify-center text-center" style="background-image: url('https://source.unsplash.com/1600x900/?farm,technology');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 px-6 md:px-12">
            <h1 class="text-5xl sm:text-6xl font-bold leading-tight text-yellow-400">Transformasi Pertanian Anda dengan Teknologi Canggih</h1>
            <p class="mt-4 text-lg sm:text-2xl text-white">Solusi manajemen pertanian untuk hasil yang lebih baik dan berkelanjutan.</p>
            <a href="#contact" class="mt-8 inline-block bg-yellow-500 text-black px-8 py-4 rounded-full text-lg font-semibold shadow-xl hover:bg-yellow-400 transition duration-300">Hubungi Kami</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-24 bg-white" id="features">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold text-gray-800">Fitur Premium untuk Pertanian Modern</h2>
            <p class="mt-4 text-xl text-gray-600">Manfaatkan teknologi kami untuk mengelola pertanian Anda dengan lebih efisien.</p>
            <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
                <!-- Feature 1 -->
                <div class="bg-gray-100 p-10 rounded-2xl shadow-xl hover:shadow-2xl transition duration-300">
                    <div class="text-4xl text-green-600 mb-6">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800">Pemantauan Tanaman</h3>
                    <p class="mt-4 text-lg text-gray-600">Pantau kondisi tanaman Anda menggunakan sensor dan perangkat IoT untuk hasil yang lebih optimal.</p>
                </div>
                <!-- Feature 2 -->
                <div class="bg-gray-100 p-10 rounded-2xl shadow-xl hover:shadow-2xl transition duration-300">
                    <div class="text-4xl text-green-600 mb-6">
                        <i class="fas fa-tint"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800">Sistem Irigasi Cerdas</h3>
                    <p class="mt-4 text-lg text-gray-600">Kontrol irigasi tanaman secara otomatis untuk menghemat air dan memastikan tanaman mendapat kelembapan yang tepat.</p>
                </div>
                <!-- Feature 3 -->
                <div class="bg-gray-100 p-10 rounded-2xl shadow-xl hover:shadow-2xl transition duration-300">
                    <div class="text-4xl text-green-600 mb-6">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800">Analisis Data Pertanian</h3>
                    <p class="mt-4 text-lg text-gray-600">Dapatkan wawasan dan rekomendasi berbasis data untuk meningkatkan hasil dan keberlanjutan pertanian Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-24 bg-gray-800 text-white" id="about">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold">Tentang Kami</h2>
            <p class="mt-4 text-xl text-gray-400">Kami adalah pemimpin dalam solusi teknologi pertanian, menghadirkan inovasi yang membantu petani untuk meningkatkan hasil dan keberlanjutan pertanian.</p>
            <div class="mt-12">
                <img src="https://source.unsplash.com/1600x900/?agriculture" alt="About Us" class="w-full rounded-xl shadow-xl">
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-24 bg-green-600 text-white" id="contact">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold">Hubungi Kami</h2>
            <p class="mt-4 text-xl">Kami siap membantu Anda meningkatkan manajemen pertanian Anda. Hubungi kami untuk informasi lebih lanjut.</p>
            <a href="mailto:info@agritech.com" class="mt-8 inline-block bg-yellow-500 text-black px-8 py-4 rounded-full text-lg font-semibold shadow-xl hover:bg-yellow-400 transition duration-300">Kirim Email</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-6">
        <div class="max-w-7xl mx-auto text-center">
            <p>&copy; 2024 AgriTech. Semua hak dilindungi. <br> Dibangun dengan cinta untuk masa depan pertanian yang lebih baik.</p>
        </div>
    </footer>

</body>

</html>
