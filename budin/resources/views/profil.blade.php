@extends('layouts.app')

@section('title', 'Profil - SMKN 4 Bogor')

@push('styles')
<style>
    body {
        overflow-x: hidden; /* Mencegah scroll horizontal */
    }
    
    .scroll-section {
        scroll-snap-align: start;
        width: 100vw; /* Menggunakan viewport width */
        max-width: 100%; /* Memastikan tidak melebihi lebar layar */
    }
    
    .gradient-overlay {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7));
    }

    .container {
        width: 100%;
        max-width: 1280px; /* atau sesuai kebutuhan */
        margin: 0 auto;
        padding-left: 1rem;
        padding-right: 1rem;
    }

    @media (max-width: 640px) {
        .container {
            padding-left: 1rem;
            padding-right: 1rem;
        }
    }
</style>
@endpush

@section('content')
<div class="overflow-x-hidden"> <!-- Wrapper untuk mencegah scroll horizontal -->
    <!-- Hero Section -->
    <section class="relative h-screen scroll-section">
        <div class="absolute inset-0">
            <img src="{{ asset('images/lapangan.jpg') }}" alt="SMKN 4 Bogor" class="w-full h-full object-cover">
            <div class="absolute inset-0 gradient-overlay"></div>
        </div>
        <div class="relative h-full flex items-center justify-center">
            <div class="text-center">
                <h1 class="text-7xl font-bold text-white mb-6" data-aos="fade-up">SMKN 4 BOGOR</h1>
                <p class="text-2xl text-gray-200" data-aos="fade-up" data-aos-delay="200">Est. 2009</p>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="relative py-32 bg-black text-white scroll-section">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <div class="space-y-16">
                    <div data-aos="fade-up">
                        <h2 class="text-5xl font-bold mb-8">Tentang Kami</h2>
                        <p class="text-xl leading-relaxed text-gray-300">
                            Merupakan sekolah kejuruan berbasis Teknologi Informasi dan Komunikasi. Sekolah ini didirikan dan dirintis pada tahun 2008 kemudian dibuka pada tahun 2009 yang saat ini terakreditasi A. Terletak di Jalan Raya Tajur Kp. Buntar, Muarasari, Bogor, sekolah ini berdiri di atas lahan seluas 12.724 m2 dengan berbagai fasilitas pendukung di dalamnya. Terdapat 54 staff pengajar dan 22 orang staff tata usaha, dikepalai oleh Drs. Mulya Mulprihartono, M. Si, sekolah ini merupakan investasi pendidikan yang tepat untuk putra/putri anda.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Mission Section -->
    <section class="py-32 bg-white scroll-section">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                <!-- Vision -->
                <div class="relative" data-aos="fade-right">
                    <div class="sticky top-32">
                        <span class="text-sm font-bold tracking-wider text-gray-400">VISI KAMI</span>
                        <h2 class="text-4xl font-bold mt-2 mb-8">Visi SMKN 4 Bogor</h2>
                        <p class="text-xl text-gray-600 leading-relaxed">
                            "Terwujudnya SMK Pusat Keunggulan melalui terciptanya pelajar pancasila yang berbasis teknologi, berwawasan lingkungan dan berkewirausahaan."
                        </p>
                    </div>
                </div>

                <!-- Mission -->
                <div class="space-y-8" data-aos="fade-left">
                    <span class="text-sm font-bold tracking-wider text-gray-400">MISI KAMI</span>
                    <div class="space-y-6">
                        <div class="p-8 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-colors">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-black rounded-xl flex items-center justify-center flex-shrink-0">
                                    <span class="text-white font-bold">01</span>
                                </div>
                                <p class="text-gray-600">Mewujudkan karakter pelajar pancasila beriman dan bertaqwa kepada Tuhan Yang Maha Esa dan berakhlak mulia, berkebhinekaan global, gotong royong, mandiri, kreatif dan bernalar kritis.</p>
                            </div>
                        </div>

                        <div class="p-8 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-colors">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-black rounded-xl flex items-center justify-center flex-shrink-0">
                                    <span class="text-white font-bold">02</span>
                                </div>
                                <p class="text-gray-600">Mengembangkan pembelajaran dan pengelolaan sekolah berbasis Teknologi Informasi dan Komunikasi.</p>
                            </div>
                        </div>

                        <div class="p-8 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-colors">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-black rounded-xl flex items-center justify-center flex-shrink-0">
                                    <span class="text-white font-bold">03</span>
                                </div>
                                <p class="text-gray-600">Mengembangkan sekolah yang berwawasan Adiwiyata Mandiri.</p>
                            </div>
                        </div>

                        <div class="p-8 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-colors">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-black rounded-xl flex items-center justify-center flex-shrink-0">
                                    <span class="text-white font-bold">04</span>
                                </div>
                                <p class="text-gray-600">Mengembangkan usaha dalam berbagai bidang secara optimal sehingga memiliki kemandirian dan daya saing tinggi.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Leadership Section -->
    <section class="relative py-32 bg-black text-white scroll-section">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                <div class="space-y-8" data-aos="fade-right">
                    <span class="text-sm font-bold tracking-wider text-gray-400">KEPALA SEKOLAH</span>
                    <h2 class="text-4xl font-bold">Drs. Mulya Murprihartono, M.Si.</h2>
                    <p class="text-xl text-gray-300">Kepala Sekolah Ke-3, Juli 2020 - sekarang</p>
                    <div class="space-y-4 text-gray-300">
                        <p>
                            Sejak satu tahun lalu SMKN 4 Kota Bogor dipimpin oleh seseorang yang membawa warna baru, tahun pertama sejak dilantik, tepatnya pada tanggal 10 Juli 2020, inovasi dan kebijakan-kebijakan baru pun mulai dirancang.
                        </p>
                        <p>
                            Bukan tanpa kesulitan, penuh tantangan tapi beliau meyakinkan untuk selalu optimis pada harapan dengan bersinergi mewujudkan visi misi SMKN 4 Bogor ditengah kesulitan pandemi ini.
                        </p>
                        <p>
                            Strategi baru pun dimunculkan, beberapa program sudah terealisasikan diantaranya mengembangkan aplikasi LMS (Learning Management System) sebagai solusi dalam pelaksanaan program BDR (Belajar dari Rumah), untuk mengoptimalkan hubungan kerjasama antara sekolah dengan Industri dan Dunia Kerja (IDUKA), dan juga untuk pengalaman praktek belajar jarak jauh agar tetap berjalan dengan optimal.
                        </p>
                    </div>
                </div>
                <div class="relative" data-aos="fade-left">
                    <div class="aspect-square rounded-2xl overflow-hidden">
                        <img src="{{ asset('images/kepala-sekolah.jpg') }}" 
                             alt="Kepala Sekolah" 
                             class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Location Section -->
    <section class="py-32 bg-white scroll-section">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                <div class="space-y-8" data-aos="fade-right">
                    <span class="text-sm font-bold tracking-wider text-gray-400">LOKASI KAMI</span>
                    <h2 class="text-4xl font-bold">Kunjungi SMKN 4 Bogor</h2>
                    <div class="space-y-4">
                        <p class="text-xl text-gray-600">
                            Jl. Raya Tajur, Kp. Buntar RT.02/RW.07, Muarasari, 
                            Kec. Bogor Sel., Kota Bogor, Jawa Barat 16137
                        </p>
                        <div class="flex items-center space-x-4 text-gray-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span>(0251) 8242411</span>
                        </div>
                    </div>
                </div>
                <div class="relative h-96 rounded-2xl overflow-hidden" data-aos="fade-left">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.0766865806904!2d106.8334163!3d-6.6297873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8a1a5f5b5a5%3A0x5f5b5b5b5b5b5b5b!2sSMKN%204%20Bogor!5e0!3m2!1sen!2sid!4v1621234567890!5m2!1sen!2sid" 
                        class="w-full h-full"
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
    // Smooth scroll untuk section
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
@endpush 