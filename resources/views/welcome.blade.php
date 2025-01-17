<x-guest-layout>
    <style>
* {
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: "Poppins", sans-serif;
}

.container1 {
position: relative;
width: 100%;
max-width: 1100px;
display: flex;
flex-wrap: wrap; /* Allow wrapping to the next line when needed */
justify-content: center;
gap: 20px; /* Add space between cards */
padding: 30px;
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
<nav class="flex flex-wrap items-center justify-between p-3 bg-[#e8e8e5]">
    <div class="text-xl">Bappa Flour mill</div>
    <div class="flex md:hidden">
        <button id="hamburger">
            <img class="toggle block" src="https://img.icons8.com/fluent-systems-regular/2x/menu-squared-2.png"
                width="40" height="40" />
            <img class="toggle hidden" src="https://img.icons8.com/fluent-systems-regular/2x/close-window.png"
                width="40" height="40" />
        </button>
    </div>
    <div class="toggle hidden w-full md:w-auto md:flex text-right text-bold mt-5 md:mt-0 md:border-none">
        <a href="#home" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Beranda
        </a>
        <a href="#services" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Layanan
        </a>
        <a href="#aboutus" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Tentang Kami
        </a>
        <a href="#gallery" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Galeri
        </a>
        <a href="#contactUs" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Hubungi Kami
        </a>
    </div>
    

    <div class="toggle w-full text-end hidden md:flex md:w-auto px-4 py-2 md:rounded">
        <div class="flex space-x-4">
            <!-- Button Register -->
            <a href="/register" class="flex items-center h-10 w-30 rounded-md bg-[#c8a876] text-white font-medium p-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span class="ml-2">Daftar</span>
            </a>
        
            <!-- Button Login -->
            <a href="/login" class="flex items-center h-10 w-30 rounded-md bg-[#c8a876] text-white font-medium p-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25a2.25 2.25 0 00-2.25-2.25H6.75A2.25 2.25 0 004.5 5.25v13.5a2.25 2.25 0 002.25 2.25h6.75a2.25 2.25 0 002.25-2.25V15M18 12h3m0 0l-3-3m3 3l-3 3" />
                </svg>
                <span class="ml-2">Masuk</span>
            </a>
        </div>
                </div>
            </div>
        </a>
    </div>

</nav>
<!-- hero seciton -->
<div class="relative" style="width: 100%; height: 320px;" id="home">
    <div class="absolute inset-0" style="opacity: 0.7;">
        <img src="https://i.pinimg.com/736x/35/cf/7f/35cf7f3af38bc579205997da1c82e33e.jpg"
            alt="Background Image" style="width: 100%; height: 100%; object-fit: cover; object-position: center;" />
    </div>

    <div class="absolute inset-9 flex flex-col md:flex-row items-center justify-between">
        <div class="md:w-1/2 mb-4 md:mb-0">
            <h1 class="text-grey-700 font-medium text-4xl md:text-5xl leading-tight mb-2">Bappa Flour mill</h1>
            <p class="font-regular text-xl mb-8 mt-4">One stop solution for flour grinding services</p>
            <a href="#contactUs"
                class="px-6 py-3 bg-[#c8a876] text-white font-medium rounded-full hover:bg-[#c09858]  transition duration-200">Hubungi Kami</a>
        </div>
    </div>
</div>

<!-- our services section -->
<section class="py-10" id="services">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Our Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://i.pinimg.com/736x/cc/e4/9b/cce49b06f6e0b15d119aa449d8a63d69.jpg"
                    alt="wheat flour grinding" class="w-full h-64 object-cover">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">Penanaman Jagung</h3>
                    <p class="text-gray-700 text-base">Penanaman jagung (Zea mays) adalah salah satu bentuk budidaya
                        tanaman pangan yang penting di dunia, terutama di negara tropis seperti Indonesia. Jagung
                        memiliki banyak kegunaan, baik sebagai makanan pokok, pakan ternak, maupun bahan baku
                        industri. Jagung termasuk tanaman biji-bijian (serealia) yang memiliki kemampuan adaptasi
                        tinggi terhadap berbagai kondisi lingkungan.
                    <details>
                        <summary>Read More</summary>
                        <h3 class="text-xl font-medium text-gray-800 mb-2"> Tahapan Penanaman Jagung</h3>
                        <p>1.Pemilihan Varietas:

                            -Pilih varietas jagung berdasarkan tujuan budidaya, seperti jagung manis (sweet corn),
                            jagung hibrida (untuk hasil tinggi), atau jagung pulut (glutinous corn).
                            -Varietas juga dipilih sesuai kondisi lingkungan, seperti tahan kering atau serangan
                            hama.</p>

                        <p> 2.Persiapan Lahan:

                            Bersihkan lahan dari gulma dan sisa-sisa tanaman sebelumnya.
                            Lakukan pengolahan tanah dengan cara dicangkul atau dibajak untuk menggemburkan tanah.
                            Buat bedengan jika diperlukan untuk mengatur drainase, terutama di area dengan curah
                            hujan tinggi.</p>
                        <p> 3.Penanaman:

                            Jarak Tanam: Umumnya, jarak tanam untuk jagung adalah 70 x 20 cm atau 75 x 25 cm,
                            tergantung pada varietas.
                            Cara Penanaman: Tanam benih jagung pada lubang tanam sedalam 3-5 cm, kemudian tutup
                            dengan tanah.
                            Kepadatan Tanam: Untuk hasil optimal, tanam 1-2 benih per lubang.</p>

                        <p> 4.Pemupukan:

                            Pupuk Dasar: Gunakan pupuk organik seperti kompos atau pupuk kandang saat persiapan
                            lahan.
                            Pupuk Tambahan: Tambahkan pupuk kimia seperti Urea, TSP, dan KCl dalam tahap pertumbuhan
                            tanaman.</p>

                        <p>5.Perawatan:

                            Penyiraman: Pastikan tanaman mendapatkan cukup air, terutama saat fase awal pertumbuhan
                            dan pembentukan tongkol.
                            Penyiangan: Bersihkan gulma di sekitar tanaman secara rutin untuk mengurangi persaingan
                            nutrisi.
                            Pengendalian Hama dan Penyakit: Hama seperti ulat grayak dan penyakit seperti hawar daun
                            perlu dikendalikan dengan insektisida atau fungisida yang tepat.
                        </p>

                        <p>6.Panen:

                            Jagung siap dipanen 85-110 hari setelah tanam, tergantung varietas.
                            Panen dilakukan saat kulit tongkol mengering dan biji jagung keras (untuk jagung biji)
                            atau saat tongkol masih muda (untuk jagung manis).</p>

                        <h3 class="text-xl font-medium text-gray-800 mb-2"> Syarat Tumbuh Jagung </h3>
                        <p>1.Iklim dan Suhu:</p>
                        <p>-Tanaman harus memiliki cukup air untuk menjaga kesehatan dan keamanan tanaman.</p>
                        <p>-Curah hujan ideal adalah 85-200 mm per bulan, terutama saat fase pertumbuhan vegetatif.
                        </p>

                        <p>2.Tanah</p>
                        <p> -Tanaman jagung memerlukan tanah yang subur, gembur, dan kaya bahan organik.</P>
                        <P>-PH tanah ideal adalah 5,5-7,0.</p>

                        <p>3.Cahaya</p>
                        <p>-Jagung memerlukan sinar matahari penuh selama 8-10 jam per hari untuk fotosintesis
                            optimal.</p>
                    </details>
                    </p>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://i.pinimg.com/736x/1a/26/91/1a2691ad866e5919811b2bfe8ea151cd.jpg "
                    alt="Coffee" class="w-full h-64 object-cover">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">Penanaman Padi</h3>
                    <p class="text-gray-700 text-base">Pertanian padi adalah salah satu bentuk budidaya tanaman
                        pangan yang berfokus pada penanaman padi (Oryza sativa) sebagai bahan baku utama untuk
                        menghasilkan beras, makanan pokok bagi lebih dari setengah populasi dunia, terutama di Asia.
                        Pertanian padi memiliki nilai strategis karena perannya dalam ketahanan pangan dan ekonomi
                        masyarakat, khususnya di negara-negara agraris seperti Indonesia.
                    <details>
                        <summary>Read More</summary>
                        <h3 class="text-xl font-medium text-gray-800 mb-2">Ciri Utama Pertanian Padi</h3>

                        <h3 class="text-xl font-medium text-gray-800 mb-2">1.Jenis Tanaman Padi</h3>
                        <p>-Padi adalah tanaman serealia yang tumbuh baik di iklim tropis dan subtropis.
                            Terdapat beberapa varietas padi, seperti padi sawah, padi gogo (ladang), dan padi pasang
                            surut, yang disesuaikan dengan kondisi lahan dan lingkungan.</p>

                        <h3 class="text-xl font-medium text-gray-800 mb-2">2.Media Dan Kondisi Tanam</h3>
                        <p>-Tanah: Padi memerlukan tanah subur dengan kadar bahan organik tinggi, seperti tanah
                            aluvial atau tanah lempung.</p>
                        <p>-Air: Tanaman ini membutuhkan banyak air, terutama dalam sistem irigasi sawah, tetapi ada
                            juga padi gogo yang tidak memerlukan genangan.</p>
                        <p>-Iklim: Idealnya tumbuh di wilayah dengan suhu 20-35°C dan curah hujan tahunan sekitar
                            1.500-2.000 mm.</p>

                        <h3 class="text-xl font-medium text-gray-800 mb-2">3.Perawatan Padi</h3>
                        <p>-Pengendalian Hama dan Penyakit: Hama utama adalah wereng, tikus, dan penggerek batang,
                            sedangkan penyakit seperti blas dan hawar daun bakteri sering menyerang padi.</p>
                        <p>-Penyiangan: Gulma harus dibersihkan secara rutin untuk mencegah persaingan nutrisi.</p>

                        <h3 class="text-xl font-medium text-gray-800 mb-2">4.Panen</h3>
                        <p>-Padi biasanya dipanen setelah 90-120 hari sejak tanam, tergantung varietasnya.</p>
                        <p>-Tanda padi siap panen adalah bulir menguning dan batang mulai mengering.</P>
                    </details>
                    </p>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://i.pinimg.com/736x/04/ac/41/04ac4145d4fdfb4b604514c2809188b3.jpg"
                    alt="Coffee" class="w-full h-64 object-cover">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">Kebun Tomat</h3>
                    <p class="text-gray-700 text-base">Pertanian kebun tomat adalah salah satu bentuk budidaya
                        hortikultura yang fokus pada penanaman tanaman tomat (Solanum lycopersicum). Kebun tomat
                        dapat dikelola dalam skala kecil untuk kebutuhan rumah tangga atau skala besar untuk tujuan
                        komersial. Tomat merupakan tanaman yang populer karena nilai ekonomisnya tinggi, mudah
                        dibudidayakan, dan memiliki banyak manfaat gizi.
                    <details>
                        <summary>Read More</summary>
                        <h3 class="text-xl font-medium text-gray-800 mb-2"> Ciri Utama Pertanian Kebun Tomat</h3>

                        <h3 class="text-xl font-medium text-gray-800 mb-2"> 1.Jenis Tanaman</h3>
                        <p>Tomat adalah tanaman semusim yang dapat tumbuh di dataran rendah hingga dataran tinggi.
                            Varietas tomat bervariasi, seperti tomat buah, tomat cherry, atau tomat plum, yang
                            disesuaikan dengan tujuan panen (konsumsi segar, bahan baku saus, atau olahan lain).</p>

                        <h3 class="text-xl font-medium text-gray-800 mb-2">2.Perawatan</h3>
                        <p>-Penyiraman: Dilakukan secara rutin, terutama saat tanaman sedang berbunga dan berbuah.
                        </p>
                        <p>-Pemupukan: Menggunakan pupuk organik atau anorganik, seperti NPK, untuk menunjang
                            pertumbuhan dan hasil panen.</p>
                        <p>-Pengendalian Hama dan Penyakit: Masalah umum meliputi kutu daun, ulat grayak, dan
                            penyakit layu fusarium.</p>

                        <h3 class="text-xl font-medium text-gray-800 mb-2">3Pemanenan</h3>
                        <p>-Tomat dapat dipanen 60-100 hari setelah tanam, tergantung varietasnya.</p>
                        <p>-Buah dipetik saat matang fisiologis (mulai berwarna merah) untuk pasar lokal atau
                            setengah matang untuk distribusi jarak jauh.</p>

                    </details>
                    </p>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://i.pinimg.com/736x/25/66/ae/2566ae1718b54401762c06e6cbb695a6.jpg"
                    alt="Coffee" class="w-full h-64 object-cover">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">Penanaman Teh </h3>
                    <p class="text-gray-700 text-base">Penanaman teh (Camellia sinensis) adalah aktivitas budidaya
                        tanaman yang menghasilkan daun teh, yang digunakan untuk membuat minuman teh. Teh merupakan
                        salah satu komoditas perkebunan yang penting secara ekonomi dan populer secara global.
                        Tanaman teh tumbuh baik di wilayah beriklim tropis dan subtropis dengan ketinggian tertentu.
                    <details>
                        <summary>Read More</summary>
                        <h3 class="text-xl font-medium text-gray-800 mb-2">Syarat Tumbuh Tanaman Teh</h3>

                        <h3 class="text-xl font-medium text-gray-800 mb-2">1.Iklim</h3>
                        <p>-Curah hujan: 2.000-3.000 mm per tahun, dengan distribusi merata sepanjang tahun.</p>
                        <p>-Kelembapan tinggi dan angin yang tidak terlalu kencang mendukung pertumbuhan teh.</p>

                        <h3 class="text-xl font-medium text-gray-800 mb-2">2.Ketinggian</h3>
                        <p>Teh tumbuh optimal di dataran tinggi, dengan ketinggian antara 200-2.000 meter di atas
                            permukaan laut (mdpl).
                            Ketinggian berpengaruh pada kualitas rasa daun teh.</p>

                        <h3 class="text-xl font-medium text-gray-800 mb-2">3.Cahaya Matahari</h3>
                        <p>-Teh membutuhkan cahaya matahari yang cukup, tetapi tidak langsung terpapar terlalu lama.
                        </p>
                        <p>Area dengan kabut ringan mendukung pertumbuhan optimal.</p>

                    </details>
                    </p>
                </div>
            </div>
            <!-- special card -->
            <div
                class="bg-white rounded-lg bg-gradient-to-tr from-pink-300 to-blue-300 p-0.5 shadow-lg overflow-hidden min-h-full">
                <img src="https://i.pinimg.com/736x/ac/a3/1c/aca31c33059f933ba3e74486da47b60c.jpg   "
                    alt="Coffee" class="w-full h-64 object-cover rounded-t-lg">
                <div class="p-6 bg-white text-center rounded-b-lg md:min-h-full">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">Penanaman Kubis</h3>
                    <p class="text-gray-700 text-base"><span class="font-medium underline"></span>
                        Kol (Brassica oleracea var. capitata) adalah tanaman sayuran daun yang memiliki kepala
                        berbentuk bulat yang tersusun dari daun-daun rapat. Tanaman ini termasuk dalam keluarga
                        Cruciferae (atau Brassicaceae) dan merupakan salah satu tanaman hortikultura yang populer
                        untuk konsumsi domestik maupun ekspor.
                        Kol kaya akan nutrisi seperti vitamin C, K, serat, dan mineral, sehingga memiliki manfaat
                        kesehatan yang tinggi. Selain itu, kol memiliki nilai ekonomi yang baik, terutama di wilayah
                        dataran tinggi.
                    <details>
                        <summary>Read More</summary>

                        <h3 class="text-xl font-medium text-gray-800 mb-2">Tahap Penanaman Kol</h3>

                        <h3 class="text-xl font-medium text-gray-800 mb-2">1.Pemilihan Varietas</h3>
                        <p>-Kol hijau: Jenis umum dengan daun hijau muda.</p>
                        <p>-Kol ungu: Memiliki daun berwarna ungu dan sering digunakan untuk salad.</p>
                        <p>-Kol mini (baby cabbage): Varietas kecil untuk pasar khusus.</p>

                        <h3 class="text-xl font-medium text-gray-800 mb-2">2Perawatan</h3>
                        <p>-Pengendalian Hama dan Penyaki</p>
                        <p>Hama utama: Ulat grayak, kutu daun, dan belalang.
                            Penyakit: Busuk hitam (Black rot) dan bercak daun.
                            Gunakan pestisida organik atau kimia dengan dosis yang tepat.</p>

                        <h3 class="text-xl font-medium text-gray-800 mb-2">Pemupukan, Penyiramanl</h3>


                    </details>
                    </p>
                </div>
            </div>


            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://i.pinimg.com/736x/fb/99/92/fb9992e1d8fa2bc1fbd67c60f2396da2.jpg"
                    alt="papad" class="w-full h-64 object-cover">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">Penanaman Bawang Merah</h3>
                    <p class="text-gray-700 text-base">Bawang merah (Allium cepa var. aggregatum) adalah tanaman
                        hortikultura yang memiliki nilai ekonomi tinggi. Tanaman ini sering dibudidayakan sebagai
                        bahan pokok dalam masakan karena memberikan cita rasa khas. Selain itu, bawang merah juga
                        mengandung berbagai manfaat kesehatan, seperti meningkatkan daya tahan tubuh dan menjaga
                        kesehatan jantung.

                        Bawang merah umumnya dibudidayakan di wilayah tropis dan subtropis, terutama di tanah
                        dataran rendah hingga menengah.
                    <details>
                        <summary>Read More</summary>
                        <p> We offer a variety of rice papad flavors, including plain, salted, spicy, and flavored.
                            We
                            also
                            offer a variety of sizes and shapes to choose from. Our papad is available in bulk or in
                            individual packages.</p>
                    </details>
                    </p>
                </div>
            </div>


        </div>
    </div>
</section>

<!-- about us -->
<section class="bg-gray-100" id="aboutus">
    <div class="container mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
            <div class="max-w-lg">
                <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Tentang Kami</h1>
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
        Kenapa Kami?
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


        </div>
    </div>
</section>

<!-- gallery -->
<section class="text-gray-700 body-font" id="gallery">
    <div class="flex justify-center text-3xl font-bold text-gray-800 text-center py-10">
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
                            src=https://i.pinimg.com/736x/90/ea/36/90ea363b6381b8aa3431a661b5e11eb1.jpg>
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
                            src=https://i.pinimg.com/736x/84/2a/85/842a85d843f5629ce9dfb46b6f78d325.jpg>
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
    </div>

        <!-- Repeat this div for each image -->
    </div>

</section>

<!-- Visit us section -->
<section class="bg-gray-100">
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:py-20 lg:px-8">
        <div class="max-w-2xl lg:max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-extrabold text-gray-900" id="contactUs">Kunjingi Tempat Kami</h2>
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
                                        class="flex items-center justify-between h-10 w-30 rounded-md bg-indigo-500 text-white p-2">
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
