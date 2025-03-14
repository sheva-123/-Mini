<x-guest-layout>
    <!-- nav bar section -->
    <nav id="navbar" class="fixed top-0 w-full z-10 transition duration-300 bg-transparent text-white">
        <div class="flex items-center justify-between py-3 px-5">
            <!-- Logo di kiri -->
            <div>
                <a href="#home">
                    <img src="assets/images/bg/LOGO MANAJEMEN.png" alt="logo nav"
                        class="mix-blend-multiply w-12 h-auto object-cover" />
                </a>
            </div>

            <!-- Navlinks di tengah -->
            <div class="hidden md:flex space-x-4 text-sm">
                <a href="#home"
                    class="text-black hover:text-green-600 border-b-2 border-transparent hover:border-green-600">Beranda</a>
                <a href="#services"
                    class="text-black hover:text-green-600 border-b-2 border-transparent hover:border-green-600">Tanaman</a>
                <a href="#aboutus"
                    class="text-black hover:text-green-600 border-b-2 border-transparent hover:border-green-600">Tentang
                    Kami</a>
                <a href="#gallery"
                    class="text-black hover:text-green-600 border-b-2 border-transparent hover:border-green-600">Galeri</a>
                <a href="#contactUs"
                    class="text-black hover:text-green-600 border-b-2 border-transparent hover:border-green-600">Hubungi
                    Kami</a>

            </div>

            <!-- Button Register & Login di kanan -->
            <div class="hidden md:flex space-x-2">
                <a href="/register" class="bg-[#047857] hover:bg-[#047857] text-white font-inter px-6 py-2 rounded-md">
                    Daftar
                </a>
                <a href="/login"
                    class="text-[#047857] border border-[#047857] hover:text-[#047857] hover:border-[#047857] font-medium px-6 py-2 rounded-md">
                    Masuk
                </a>
            </div>

            <!-- Hamburger menu untuk mobile -->
            <div class="md:hidden">
                <button id="hamburger">
                    <img src="https://img.icons8.com/fluent-systems-regular/2x/menu-squared-2.png" width="40"
                        height="40" />
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero section -->
    <div class="relative w-full h-auto" id="home">
        <img src="assets/images/LP.png" alt="Background Image"
            class="w-full h-auto">
        <!-- Efek gradasi bawah -->
        <div class="absolute inset-x-0 bottom-0 h-56 bg-gradient-to-b from-transparent to-[#f8f8f8]"></div>
    </div>

    <script>
        window.addEventListener("scroll", function() {
            var navbar = document.getElementById("navbar");
            if (window.scrollY > 50) {
                navbar.classList.add("bg-white", "text-black", "backdrop-blur-md", "shadow-md");
                navbar.classList.remove("bg-transparent", "text-white");
            } else {
                navbar.classList.add("bg-transparent", "text-white");
                navbar.classList.remove("bg-white", "text-black", "backdrop-blur-md", "shadow-md");
            }
        });
    </script>


    <div class="absolute inset-9 flex flex-col md:flex-row items-center justify-between">
        <div class="md:w-1/2 mb-4 md:mb-0 mt-10">
            <h1 class="text-[#FFD836] font-medium text-4xl md:text-5xl leading-tight mb-2">Manajemen Pertanian</h1>
            <h1 class="text-[#ffffff] font-medium text-4xl md:text-5xl leading-tight mb-2">Pertanian Cerdas dan
                Berkelanjutan</h1>
            <p class="font-regular text-xs mt-2 text-[#ffffff]">Pengelolaan sumber daya dalam sektor pertanian untuk
                mencapai efisiensi dan produktivitas yang optimal. Kami menghadirkan inovasi teknologi terkini,
                metode pertanian berkelanjutan, dan dukungan ahli untuk meningkatkan hasil panen Anda secara
                signifikan.</p>
        </div>
    </div>
    </div>

    <!-- our services section -->
    <section class="py-10" id="services">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-[#067857] mb-8 text-center mt-10">Tanaman</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="assets/images/jagung.jpg" alt="jagung" class="w-full h-64 object-cover">
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-medium text-gray-800 mb-2">Penanaman Jagung</h3>
                        <p class="text-gray-700 text-base">Penanaman jagung (Zea mays) adalah salah satu bentuk budidaya
                            tanaman pangan yang penting di dunia.
                            <span class="hidden" id="moreText1">
                                Jagung memiliki banyak kegunaan, baik sebagai makanan pokok, pakan ternak, maupun bahan
                                baku industri.
                            </span>
                        </p>
                        <button onclick="toggleReadMore('moreText1', this)"
                            class="mt-3 text-[#067857] font-semibold hover:text-[#b58a44] transition duration-300">Selengkapnya</button>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="assets/images/padi.jpg" alt="padi" class="w-full h-64 object-cover">
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-medium text-gray-800 mb-2">Penanaman Padi</h3>
                        <p class="text-gray-700 text-base">Pertanian padi adalah salah satu bentuk budidaya tanaman
                            pangan yang berfokus pada penanaman padi.
                            <span class="hidden" id="moreText2">
                                Padi merupakan bahan pokok bagi lebih dari setengah populasi dunia.
                            </span>
                        </p>
                        <button onclick="toggleReadMore('moreText2', this)"
                            class="mt-3 text-[#067857] font-semibold hover:text-[#b58a44] transition duration-300">Selengkapnya</button>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="assets/images/tomat.jpg" alt="tomat" class="w-full h-64 object-cover">
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-medium text-gray-800 mb-2">Kebun Tomat</h3>
                        <p class="text-gray-700 text-base">Pertanian kebun tomat adalah salah satu bentuk budidaya
                            hortikultura yang fokus pada penanaman tanaman tomat.
                            <span class="hidden" id="moreText3">
                                Tomat memiliki nilai ekonomis tinggi dan mudah dibudidayakan.
                            </span>
                        </p>
                        <button onclick="toggleReadMore('moreText3', this)"
                            class="mt-3 text-[#067857] font-semibold hover:text-[#b58a44] transition duration-300">Selengkapnya</button>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="assets/images/teh.jpg" alt="teh" class="w-full h-64 object-cover">
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-medium text-gray-800 mb-2">Perkebunan Teh</h3>
                        <p class="text-gray-700 text-base">Teh adalah tanaman yang populer di berbagai negara tropis dan
                            subtropis.
                            <span class="hidden" id="moreText4">
                                Perkebunan teh menghasilkan berbagai jenis teh yang banyak dikonsumsi masyarakat dunia.
                            </span>
                        </p>
                        <button onclick="toggleReadMore('moreText4', this)"
                            class="mt-3 text-[#067857] font-semibold hover:text-[#b58a44] transition duration-300">Selengkapnya</button>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="assets/images/kopi.jpg" alt="kopi" class="w-full h-64 object-cover">
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-medium text-gray-800 mb-2">Perkebunan Kopi</h3>
                        <p class="text-gray-700 text-base">Kopi merupakan salah satu komoditas ekspor unggulan di banyak
                            negara.
                            <span class="hidden" id="moreText5">
                                Kopi memiliki banyak varietas yang unik dan khas dari tiap daerah penghasilnya.
                            </span>
                        </p>
                        <button onclick="toggleReadMore('moreText5', this)"
                            class="mt-3 text-[#067857] font-semibold hover:text-[#b58a44] transition duration-300">Selengkapnya</button>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="assets/images/sawit.jpg" alt="kelapa sawit" class="w-full h-64 object-cover">
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-medium text-gray-800 mb-2">Perkebunan Kelapa Sawit</h3>
                        <p class="text-gray-700 text-base">Kelapa sawit adalah tanaman penghasil minyak yang penting
                            dalam industri pangan.
                            <span class="hidden" id="moreText6">
                                Minyak kelapa sawit banyak digunakan dalam makanan, kosmetik, dan produk rumah tangga.
                            </span>
                        </p>
                        <button onclick="toggleReadMore('moreText6', this)"
                            class="mt-3 text-[#067857] font-semibold hover:text-[#b58a44] transition duration-300">Selengkapnya</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function toggleReadMore(id, button) {
            var content = document.getElementById(id);
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                button.textContent = 'Tutup';
            } else {
                content.classList.add('hidden');
                button.textContent = 'Baca Selengkapnya';
            }
        }
    </script>


    <script>
        function toggleReadMore(id) {
            var content = document.getElementById(id);
            var button = content.previousElementSibling;
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                button.textContent = 'Tutup';
            } else {
                content.classList.add('hidden');
                button.textContent = 'Baca Selengkapnya';
            }
        }
    </script>


    <!-- about us -->
    <section class="bg-gray-100" id="aboutus">
        <div class="container mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
                <div class="max-w-lg">
                    <h1 class="text-3xl font-bold text-[#067857] mb-8 text-center mt-5">Tentang Kami</h1>
                    <p class="mt-4 text-gray-600 text-lg">
                        Manajemen Pertanian adalah penyedia layanan dan solusi manajemen pertanian yang
                        berfokus pada pengelolaan sumber daya pertanian secara efisien dan berkelanjutan. Kami hadir
                        untuk membantu petani, pemilik lahan, dan pelaku industri agribisnis meningkatkan produktivitas,
                        mengoptimalkan hasil panen, dan menjaga kelestarian lingkungan.

                        Dengan menggabungkan teknologi modern, analisis data, dan praktik terbaik dalam manajemen
                        pertanian, kami percaya bahwa pertanian dapat menjadi lebih cerdas, efisien, dan ramah
                        lingkungan.</p>
                </div>
                <div class="mt-12 md:mt-0">
                    <img src="https://i.pinimg.com/736x/19/3c/66/193c66c75dd83e96956334a62ea11ec6.jpg"
                        alt="About Us Image" class="object-cover rounded-lg shadow-md">
                </div>
            </div>
        </div>
    </section>

    <!-- gallery -->
    <section class="text-gray-700 body-font mt-20" id="gallery">
        <div class="flex justify-center text-3xl font-bold text-[#067857] text-center py-10 mt-20">
            Galeri
        </div>

        <div class="flex justify-center gap-6 px-10 flex-wrap">
            <!-- Kartu Galeri -->
            <div class="relative w-64 h-80 rounded-2xl overflow-hidden shadow-lg group">
                <img src="assets/images/g1.jpg"
                    class="w-full h-full object-cover transition duration-300 group-hover:scale-105" alt="Gambar 1">
                <div
                    class="absolute bottom-0 left-0 right-0 bg-black/50 opacity-0 group-hover:opacity-100 transition duration-300 p-2 text-center">
                    <button onclick="openModal1()" class="text-white font-semibold">Selengkapnya →</button>
                </div>
            </div>

            <div class="relative w-64 h-80 rounded-2xl overflow-hidden shadow-lg group">
                <img src="assets/images/g2.jpg"
                    class="w-full h-full object-cover transition duration-300 group-hover:scale-105" alt="Gambar 2">
                <div
                    class="absolute bottom-0 left-0 right-0 bg-black/50 opacity-0 group-hover:opacity-100 transition duration-300 p-2 text-center">
                    <button onclick="openModal2()" class="text-white font-semibold">Selengkapnya →</button>
                </div>
            </div>

            <div class="relative w-64 h-80 rounded-2xl overflow-hidden shadow-lg group">
                <img src="assets/images/g3.jpg"
                    class="w-full h-full object-cover transition duration-300 group-hover:scale-105" alt="Gambar 3">
                <div
                    class="absolute bottom-0 left-0 right-0 bg-black/50 opacity-0 group-hover:opacity-100 transition duration-300 p-2 text-center">
                    <button onclick="openModal3()" class="text-white font-semibold">Selengkapnya →</button>
                </div>
            </div>

            <div class="relative w-64 h-80 rounded-2xl overflow-hidden shadow-lg group">
                <img src="assets/images/g4.jpg"
                    class="w-full h-full object-cover transition duration-300 group-hover:scale-105" alt="Gambar 4">
                <div
                    class="absolute bottom-0 left-0 right-0 bg-black/50 opacity-0 group-hover:opacity-100 transition duration-300 p-2 text-center">
                    <button onclick="openModal4()" class="text-white font-semibold">Selengkapnya →</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Popup Modal gambar1-->
    <div id="modal1" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden">
        <div class="bg-green-800 text-white p-6 rounded-xl w-[90%] md:w-2/3 lg:w-1/2 shadow-lg relative">
            <button onclick="closeModal1()"
                class="absolute top-2 right-2 text-white text-xl font-bold">&times;</button>
            <div class="flex gap-6">
                <img src="assets/images/g1.jpg" class="w-1/2 rounded-xl object-cover" alt="Detail Gambar">
                <p class="w-1/2">
                    Di ladang hijau yang subur, para pekerja kami dengan teliti memanen hasil pertanian terbaik.
                    Setiap tanaman dirawat dengan penuh perhatian untuk memastikan kualitas yang optimal. Dalam suasana
                    sejuk yang diselimuti kabut, mereka bekerja dengan dedikasi tinggi, mulai dari memetik hasil panen
                    hingga mengemasnya dengan standar terbaik. Dengan sistem pertanian yang terorganisir, kami
                    memastikan bahwa setiap produk yang kami hasilkan segar, berkualitas, dan siap didistribusikan
                    kepada pelanggan. komitmen kami adalah menghadirkan produk terbaik melalui proses panen yang efisien
                    dan penuh tanggung jawab.
                </p>
            </div>
        </div>
    </div>

    <!-- Popup Modal gambar2-->
    <div id="modal2" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden">
        <div class="bg-green-800 text-white p-6 rounded-xl w-[90%] md:w-2/3 lg:w-1/2 shadow-lg relative">
            <button onclick="closeModal2()"
                class="absolute top-2 right-2 text-white text-xl font-bold">&times;</button>
            <div class="flex gap-6">
                <img src="assets/images/g2.jpg" class="w-1/2 rounded-xl object-cover" alt="Detail Gambar">
                <p class="w-1/2">
                    Kami menerapkan sistem pertanian modern dengan greenhouse untuk memastikan tanaman tumbuh dengan
                    optimal. Dengan lingkungan yang terkontrol, setiap tanaman mendapatkan perlindungan dari cuaca
                    ekstrem serta serangan hama, sehingga menghasilkan panen yang berkualitas tinggi. Teknologi ini
                    memungkinkan kami untuk menjaga kesegaran, meningkatkan efisiensi produksi, dan menyediakan produk
                    sehat serta berkualitas bagi pelanggan. Komitmen kami adalah menghadirkan hasil pertanian terbaik
                    melalui inovasi dan metode budidaya yang berkelanjutan.
                </p>
            </div>
        </div>
    </div>
    <!-- Popup Modal gambar3-->
    <div id="modal3" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden">
        <div class="bg-green-800 text-white p-6 rounded-xl w-[90%] md:w-2/3 lg:w-1/2 shadow-lg relative">
            <button onclick="closeModal3()"
                class="absolute top-2 right-2 text-white text-xl font-bold">&times;</button>
            <div class="flex gap-6">
                <img src="assets/images/g3.jpg" class="w-1/2 rounded-xl object-cover" alt="Detail Gambar">
                <p class="w-1/2">
                    Kami mengelola lahan pertanian yang luas dan subur untuk menghasilkan produk berkualitas tinggi.
                    Dengan sistem pertanian yang berkelanjutan, kami memastikan setiap tanaman tumbuh dengan optimal di
                    lingkungan yang sehat dan alami. Keindahan hamparan hijau ini mencerminkan dedikasi kami dalam
                    menjaga kesuburan tanah dan berkelanjutan ekosistem. Melalui metode pertanian modern dan alami, kami
                    berkomitmen untuk menyediakan hasil panen terbaik yang segar dan bernutrisi bagi pelanggan.
                </p>
            </div>
        </div>
    </div>
    <!-- Popup Modal gambar4-->
    <div id="modal4" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden">
        <div class="bg-green-800 text-white p-6 rounded-xl w-[90%] md:w-2/3 lg:w-1/2 shadow-lg relative">
            <button onclick="closeModal4()"
                class="absolute top-2 right-2 text-white text-xl font-bold">&times;</button>
            <div class="flex gap-6">
                <img src="assets/images/g4.jpg" class="w-1/2 rounded-xl object-cover" alt="Detail Gambar">
                <p class="w-1/2">
                    Kami berkomitmen untuk mendukung ketahanan pangan melalui budidaya tanaman yang berkualitas. Dengan
                    menerapkan teknik pertanian terbaik, kami memastikan hasil panen yang optimal dan bernutrisi. Jagung
                    yang kami tanam tumbuh secara alami di lahan yang subur, siap untuk memenuhi kebutuhan pasar
                    dengan produk berkualitas tinggi. Setiap langkah dalam proses pertanian kami dilakukan dengan penuh
                    dedikasi, dari pemilihan benih unggul hingga panen yang tepat waktu, demi menghasilkan produk
                    terbaik bagi pelanggan.
                </p>
            </div>
        </div>
    </div>

    <script>
        function openModal1() {
            document.getElementById('modal1').classList.remove('hidden');
        }

        function closeModal1() {
            document.getElementById('modal1').classList.add('hidden');
        }

        function openModal2() {
            document.getElementById('modal2').classList.remove('hidden');
        }

        function closeModal2() {
            document.getElementById('modal2').classList.add('hidden');
        }

        function openModal3() {
            document.getElementById('modal3').classList.remove('hidden');
        }

        function closeModal3() {
            document.getElementById('modal3').classList.add('hidden');
        }

        function openModal4() {
            document.getElementById('modal4').classList.remove('hidden');
        }

        function closeModal4() {
            document.getElementById('modal4').classList.add('hidden');
        }
    </script>



    <!-- Visit us section -->
    <section class="bg-gray-100">
        <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:py-20 lg:px-8">
            <div class="max-w-2xl lg:max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-extrabold text-[#067857]" id="contactUs">Kunjungi Tempat Kami</h2>
                <p class="mt-3 text-lg text-gray-500">Biarkan Kami Melayanimu Sebaik Mungkin</p>
            </div>
            <div class="mt-8 lg:mt-20">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <div class="max-w-full mx-auto rounded-lg overflow-hidden">
                            <div class="border-t border-gray-200 px-6 py-4">
                                <h3 class="text-lg font-bold text-gray-900">Kontak</h3>
                                <p class="mt-1 font-bold text-gray-600"><a href="tel:+123">Phone: +91
                                        123456789</a></p>
                                <a class="flex m-1" href="tel:+919823331842">
                                    <div class="flex-shrink-0">
                                        <div
                                            class="flex items-center justify-between h-10 w-30 rounded-md bg-[#067857] hover:bg-[#067857] text-white p-2">
                                            <!-- Heroicon name: phone -->
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                            </svg>
                                            Hubungi Sekarang
                                        </div>
                                    </div>

                                </a>
                            </div>
                            <div class="px-6 py-4">
                                <h3 class="text-lg font-medium text-gray-900">Alamat Kami</h3>
                                <p class="mt-1 text-gray-600">Sale galli, 60 foot road, Latur</p>
                            </div>
                            <div class="border-t border-gray-200 px-6 py-4">
                                <h3 class="text-lg font-medium text-gray-900">Jam Buka</h3>
                                <p class="mt-1 text-gray-600">Minggu - Senin : 14.00 - 21.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-lg overflow-hidden order-none sm:order-first">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3785.7850672491236!2d76.58802159999999!3d18.402630699999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcf83ca88e84341%3A0x841e547bf3ad066d!2zQmFwcGEgZmxvdXIgbWlsbCB8IOCkrOCkquCljeCkquCkviDgpKrgpYDgpKAg4KSX4KS_4KSw4KSj4KWALCDgpK7gpL_gpLDgpJrgpYAg4KSV4KS-4KSC4KSh4KSqIOCkhuCko-CkvyDgpLbgpYfgpLXgpL7gpK_gpL4!5e0!3m2!1sen!2sin!4v1713433597892!5m2!1sen!2sin"
                            class="w-full" width="600" height="450" style="border:0;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- footer -->
    <section>
        <footer class="bg-[#067857] text-white py-4 px-3">
            <div class="container mx-auto flex flex-wrap items-center justify-between">
                <div class="w-full md:w-1/2 md:text-center md:mb-4 mb-8">
                    <p class="text-xs text-gray-400 md:text-sm">Copyright 2024 &copy; All Rights Reserved</p>
                </div>
                <div class="w-full md:w-1/2 md:text-center md:mb-0 mb-8">
                    <ul class="list-reset flex justify-center flex-wrap text-xs md:text-sm gap-3">
                        <li><a href="#contactUs" class="text-gray-400 hover:text-white">Contact</a></li>
                        <li class="mx-4"><a href="/privacy" class="text-gray-400 hover:text-white">Privacy
                                Policy</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </section>

    <script>
        document.getElementById("hamburger").onclick = function toggleMenu() {
            const navToggle = document.getElementsByClassName("toggle");
            for (let i = 0; i < navToggle.length; i++) {
                navToggle.item(i).classList.toggle("hidden");
            }
        };
    </script>
</x-guest-layout>
