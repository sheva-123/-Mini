<x-guest-layout>
    <style>
* {
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: "Poppins", sans-serif;
}

    h1 {
        font-family: 'Playfair Display', serif;
    }
    p {
        font-family: 'Roboto', sans-serif;
    }

.container1 {
position: relative;
width: 100%;
max-width: 1100px;
display: flex;
flex-wrap: wrap; /* Allow wrapping to the next line when needed */
justify-content: center;
gap: 20px; /* Add space between cards */
padding: 20px;
margin: auto;
}

.container1 .card {
position: relative;
width: 260px; /* Set fixed width for each card */
height: 320px;
background-color: #fff;
display: flex;
flex-direction: column;
align-items: center; /* Center the content */
justify-content: flex-start; /* Start content from top */
margin: 1px;
padding: 20px 15px;
border-radius: 15px;
box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
transition: 0.3s ease-in-out;
}

.container1 .card:hover {
height: 400px; /* Increase height on hover */
}

.container1 .card .image {
position: relative;
width: 100%;
height: 180px; /* Adjust image height */
display: flex;
justify-content: center;
align-items: center;
margin-bottom: 15px;
box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
overflow: hidden;
border-radius: 10px;
}

.container1 .card .image img {
width: 100%;
height: 100%;
object-fit: cover; /* Ensure the image fits */
border-radius: 10px;
}

.container1 .card .content {
flex: 1;
text-align: center;
visibility: hidden;
opacity: 0;
transition: 0.3s ease-in-out;
}

.container1 .card:hover .content {
visibility: visible;
opacity: 1;
transition-delay: 0.2s;
}

/* Media query to make the cards display in rows when the screen is wide enough */
@media (min-width: 768px) {
.container1 {
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-evenly;
}

.container1 .card {
    width: 260px; /* Keep card size consistent */
}
}

/* Add this media query for smaller screens to make the cards stack vertically */
@media (max-width: 767px) {
.container1 {
    flex-direction: column;
    align-items: center;
}

.container1 .card {
    width: 90%; /* Adjust card width on smaller screens */
    margin: 10px 0;
}
}



</style>
<!-- nav bar section -->
<nav class="flex items-center justify-between py-1 px-3 bg-white fixed w-full z-10 top-0 border-b-2">
    <!-- Logo di kiri -->
    <div class="flex items-center flex-shrink-0 text-white">
        <a href="#home">
        <img src="assets/images/bg/a.png" alt="logo nav" class="mix-blend-multiply" style="width: 50px; height: auto; object-fit: cover;"/>
    </a>
    </div

    <!-- Navlinks di tengah -->
    <div class="hidden md:flex flex-grow justify-center space-x-2 text-sm ml-7">
        <a href="#home" class="hover:text-[#c8a876] px-1 py-2 border-b-2 border-transparent hover:border-[#c8a876]">Beranda</a>
        <a href="#services" class="hover:text-[#c8a876] px-1 py-2 border-b-2 border-transparent hover:border-[#c8a876]">Tanaman</a>
        <a href="#aboutus" class="hover:text-[#c8a876] px-1 py-2 border-b-2 border-transparent hover:border-[#c8a876]">Tentang Kami</a>
        <a href="#gallery" class="hover:text-[#c8a876] px-1 py-2 border-b-2 border-transparent hover:border-[#c8a876]">Galeri</a>
        <a href="#contactUs" class="hover:text-[#c8a876] px-1 py-2 border-b-2 border-transparent hover:border-[#c8a876]">Hubungi Kami</a>
    </div>

    <!-- Button Register & Login di kanan -->
    <div class="hidden md:flex space-x-2">
        <a href="/register" class="flex items-center h-10 rounded-md bg-[#c8a876] hover:bg-[#b58a44] text-white font-medium px-4 py-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 9A6.5 6.5 0 114 9m0 0v3.25m0-3.25h3.25" />
            </svg>
            <span>Daftar</span>
        </a>
        <a href="/login" class="flex items-center h-10 text-[#c8a876] hover:text-[#b58a44] font-medium px-4 py-2 border border-[#c8a876] hover:border-[#b58a44] rounded-md">
            <span>Masuk</span>
        </a>
    </div>

    <!-- Hamburger menu untuk mobile -->
    <div class="md:hidden">
        <button id="hamburger">
            <img class="toggle block" src="https://img.icons8.com/fluent-systems-regular/2x/menu-squared-2.png" width="40" height="40" />
        </button>
    </div>
</nav>

<!-- hero seciton -->
<div class="relative" style="width: 100%; height: 590px;" id="home">
    <div class="absolute inset-0">
        <img src="assets/images/bg/bglg.jpg"
            alt="Background Image" style="width: 100%; height: 100%; object-fit: cover; object-position: top;" />
    </div>

    <div class="absolute inset-9 flex flex-col md:flex-row items-center justify-between">
        <div class="md:w-1/2 mb-4 md:mb-0 mt-10">
            <h1 class="text-[#c8a876] font-medium text-4xl md:text-5xl leading-tight mb-2">Manajemen Pertanian</h1>
            <h1 class="text-[#000000] font-medium text-4xl md:text-5xl leading-tight mb-2">Pertanian Cerdas dan Berkelanjutan</h1>
            <p class="font-regular text-xs mt-2 text-[#2e2f2e]">Pengelolaan sumber daya dalam sektor pertanian untuk mencapai efisiensi dan produktivitas yang optimal. Kami menghadirkan inovasi teknologi terkini, metode pertanian berkelanjutan, dan dukungan ahli untuk meningkatkan hasil panen Anda secara signifikan.</p>
            <br>
            <a href="#contactUs"
                class="px-6 py-3 bg-[#c8a876] text-white font-medium rounded-3xl hover:bg-[#b58a44] transition duration-200">Hubungi Kami</a>
        </div>
    </div>    
</div>

<!-- our services section -->
<section class="py-10" id="services">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center mt-10">Tanaman</h2>      
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://i.pinimg.com/736x/cc/e4/9b/cce49b06f6e0b15d119aa449d8a63d69.jpg" alt="wheat flour grinding" class="w-full h-64 object-cover">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">Penanaman Jagung</h3>
                    <p class="text-gray-700 text-base">Penanaman jagung (Zea mays) adalah salah satu bentuk budidaya tanaman pangan yang penting di dunia.
                        <span class="hidden" id="moreText1">
                            Jagung memiliki banyak kegunaan, baik sebagai makanan pokok, pakan ternak, maupun bahan baku industri.
                        </span>
                    </p>
                    <button onclick="toggleReadMore('moreText1', this)" class="mt-3 text-[#c8a876] font-semibold hover:text-[#b58a44] transition duration-300">Baca Selengkapnya</button>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://i.pinimg.com/736x/1a/26/91/1a2691ad866e5919811b2bfe8ea151cd.jpg" alt="Coffee" class="w-full h-64 object-cover">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">Penanaman Padi</h3>
                    <p class="text-gray-700 text-base">Pertanian padi adalah salah satu bentuk budidaya tanaman pangan yang berfokus pada penanaman padi.
                        <span class="hidden" id="moreText2">
                            Padi merupakan bahan pokok bagi lebih dari setengah populasi dunia.
                        </span>
                    </p>
                    <button onclick="toggleReadMore('moreText2', this)" class="mt-3 text-[#c8a876] font-semibold hover:text-[#b58a44] transition duration-300">Baca Selengkapnya</button>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://i.pinimg.com/736x/04/ac/41/04ac4145d4fdfb4b604514c2809188b3.jpg" alt="Coffee" class="w-full h-64 object-cover">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">Kebun Tomat</h3>
                    <p class="text-gray-700 text-base">Pertanian kebun tomat adalah salah satu bentuk budidaya hortikultura yang fokus pada penanaman tanaman tomat.
                        <span class="hidden" id="moreText3">
                            Tomat memiliki nilai ekonomis tinggi dan mudah dibudidayakan.
                        </span>
                    </p>
                    <button onclick="toggleReadMore('moreText3', this)" class="mt-3 text-[#c8a876] font-semibold hover:text-[#b58a44] transition duration-300">Baca Selengkapnya</button>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://i.pinimg.com/736x/25/66/ae/2566ae1718b54401762c06e6cbb695a6.jpg" alt="Coffee" class="w-full h-64 object-cover">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">Perkebunan Teh</h3>
                    <p class="text-gray-700 text-base">Teh adalah tanaman yang populer di berbagai negara tropis dan subtropis.
                        <span class="hidden" id="moreText4">
                            Perkebunan teh menghasilkan berbagai jenis teh yang banyak dikonsumsi masyarakat dunia.
                        </span>
                    </p>
                    <button onclick="toggleReadMore('moreText4', this)" class="mt-3 text-[#c8a876] font-semibold hover:text-[#b58a44] transition duration-300">Baca Selengkapnya</button>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://i.pinimg.com/736x/ac/a3/1c/aca31c33059f933ba3e74486da47b60c.jpg" alt="Coffee" class="w-full h-64 object-cover">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">Perkebunan Kopi</h3>
                    <p class="text-gray-700 text-base">Kopi merupakan salah satu komoditas ekspor unggulan di banyak negara.
                        <span class="hidden" id="moreText5">
                            Kopi memiliki banyak varietas yang unik dan khas dari tiap daerah penghasilnya.
                        </span>
                    </p>
                    <button onclick="toggleReadMore('moreText5', this)" class="mt-3 text-[#c8a876] font-semibold hover:text-[#b58a44] transition duration-300">Baca Selengkapnya</button>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://i.pinimg.com/736x/fb/99/92/fb9992e1d8fa2bc1fbd67c60f2396da2.jpg" alt="Coffee" class="w-full h-64 object-cover">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">Perkebunan Kelapa Sawit</h3>
                    <p class="text-gray-700 text-base">Kelapa sawit adalah tanaman penghasil minyak yang penting dalam industri pangan.
                        <span class="hidden" id="moreText6">
                            Minyak kelapa sawit banyak digunakan dalam makanan, kosmetik, dan produk rumah tangga.
                        </span>
                    </p>
                    <button onclick="toggleReadMore('moreText6', this)" class="mt-3 text-[#c8a876] font-semibold hover:text-[#b58a44] transition duration-300">Baca Selengkapnya</button>
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
                <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center mt-5">Tentang Kami</h1>
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

<!-- why us  -->
<section class="text-gray-700 body-font mt-10">
    <div class="flex justify-center text-3xl font-bold text-gray-800 text-center">
        Icons
    </div>
    <div class="container px-5 py-12 mx-auto">
        <div class="flex flex-wrap text-center justify-center">
            <div class="p-4 md:w-1/4 sm:w-1/2">
                <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                    <div class="flex justify-center">
                        <img src="https://image3.jdomni.in/banner/13062021/58/97/7C/E53960D1295621EFCB5B13F335_1623567851299.png?output-format=webp" class="w-32 mb-3">
                    </div>
                    <h2 class="title-font font-regular text-2xl text-gray-900">Mesin Penggilingan Terbaru</h2>
                </div>
            </div>

            <div class="p-4 md:w-1/4 sm:w-1/2">
                <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                    <div class="flex justify-center">
                        <img src="https://image2.jdomni.in/banner/13062021/3E/57/E8/1D6E23DD7E12571705CAC761E7_1623567977295.png?output-format=webp" class="w-32 mb-3">
                    </div>
                    <h2 class="title-font font-regular text-2xl text-gray-900">Harga Terjangkau</h2>
                </div>
            </div>

            <div class="p-4 md:w-1/4 sm:w-1/2">
                <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                    <div class="flex justify-center">
                        <img src="https://image3.jdomni.in/banner/13062021/16/7E/7E/5A9920439E52EF309F27B43EEB_1623568010437.png?output-format=webp" class="w-32 mb-3">
                    </div>
                    <h2 class="title-font font-regular text-2xl text-gray-900">Efisiensi Waktu</h2>
                </div>
            </div>

            <div class="p-4 md:w-1/4 sm:w-1/2">
                <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                    <div class="flex justify-center">
                        <img src="https://image3.jdomni.in/banner/13062021/EB/99/EE/8B46027500E987A5142ECC1CE1_1623567959360.png?output-format=webp" class="w-32 mb-3">
                    </div>
                    <h2 class="title-font font-regular text-2xl text-gray-900">Keahlian di Industri</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- gallery -->
<section class="text-gray-700 body-font mt-20" id="gallery">
    <div class="flex justify-center text-3xl font-bold text-gray-800 text-center py-10 mt-20">
        Galeri
    </div>

    <div class="flex px-10">

        <body>
            <div class="container1">
                <div class=card>
                    <div class=image>
                        <img href = "#"
                            src=https://i.pinimg.com/736x/be/d0/f8/bed0f8856e91a2a9d0fe28ec779b8d0f.jpg>
                    </div>
                    <div class=content>
                        <h3>This is content</h3>
                        <p>DIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to
                            demonstrate the visual form of a document or a typeface without relying on meaningful
                            content.</p>
                    </div>
                </div>
            </div>
        </body>

        <body>
            <div class=container1>
                <div class=card>
                    <div class=image>
                        <img href = "#"
                            src=https://i.pinimg.com/736x/4a/f6/a2/4af6a21f36443b57d7c7b7d13067a487.jpg>
                    </div>
                    <div class=content>
                        <h3>Jadwal Tanaman Dengan Teknologi Modern</h3>
                        <p>Penjadwalan tanaman menggunakan aplikasi modern adalah pendekatan berbasis teknologi
                            untuk mengatur waktu dan aktivitas yang diperlukan dalam budidaya tanaman.</p>
                    </div>
                </div>
            </div>
        </body>

        <body>
            <div class=container1>
                <div class=card>
                    <div class=image>
                        <img href = "#"
                            src=https://i.pinimg.com/736x/90/ea/36/90ea363b6381b8aa3431a661b5e11eb1.jpg>
                    </div>
                    <div class=content>
                        <h3>Peyiraman Tanaman dengan Teknologi Modern</h3>
                        <p>Penyiraman tanaman dengan teknologi modern
                           adalah proses pemberian air ke tanaman
                           menggunakan sistem yang dirancang untuk meningkatkan efisiensi penggunaan air.</p>
                    </div>
                </div>
            </div>
        </body>

        <body>
            <div class=container1>
                <div class=card>
                    <div class=image>
                        <img href = "#"
                            src=https://i.pinimg.com/736x/84/2a/85/842a85d843f5629ce9dfb46b6f78d325.jpg>
                    </div>
                    <div class=content>
                        <h3>Pemerikasaan Tanaman</h3>
                        <p>Pemeriksaan tanamanadalah proses evaluasi mendalam terhadap kondisi
                            tanaman untuk memahami faktor-faktor
                            yang memengaruhi pertumbuhannkesehatan dan adaptasi lingkungan.</p>
                    </div>
                </div>
            </div>
        </body>
    </div>

        <!-- Repeat this div for each image -->
    </div>

</section>

<!-- Visit us section -->
<section class="bg-gray-100">
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:py-20 lg:px-8">
        <div class="max-w-2xl lg:max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-extrabold text-gray-900" id="contactUs">Kunjungi Tempat Kami</h2>
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
                                        class="flex items-center justify-between h-10 w-30 rounded-md bg-[#c8a876] hover:bg-[#b58a44] text-white p-2">
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
                            <p class="mt-1 text-gray-600">Minggu - Senin : 2pm - 9pm</p>
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
    <footer class="bg-gray-200 text-white py-4 px-3">
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
