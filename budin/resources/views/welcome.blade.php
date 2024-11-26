@extends('layouts.app')

@section('title', 'SMKN 4 Bogor - Sekolah Kejuruan Terbaik di Bogor')

@push('styles')
<style>
    .hero-gradient {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.8));
    }
    
    .card-hover {
        transition: all 0.2s ease;
    }

    .card-hover:hover {
        transform: translateY(-5px);
    }
</style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="relative h-screen">
        <div class="absolute inset-0">
            <img src="{{ asset('images/r-pplg2.jpg') }}" 
                 alt="Hero Background" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 hero-gradient"></div>
        </div>
        <div class="relative h-full flex items-center justify-center text-center">
            <div class="container mx-auto px-6">
                <div class="max-w-3xl mx-auto">
                    <h1 class="text-6xl font-bold text-white mb-6" data-aos="fade-up">
                        SMKN 4 Bogor
                    </h1>
                    <p class="text-2xl text-gray-200 mb-10" data-aos="fade-up" data-aos-delay="100">
                        Mencetak lulusan yang kompeten, berkarakter, dan siap bersaing
                    </p>
                    <a href="{{ route('profil') }}" class="inline-block bg-white text-gray-900 px-10 py-4 rounded-lg hover:bg-gray-100 transition-colors text-lg font-medium" data-aos="fade-up" data-aos-delay="200">
                        Tentang Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Keahlian -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-20" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Program Keahlian</h2>
                <p class="text-gray-600 text-lg">Pilih jurusan yang sesuai dengan minat dan bakatmu</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
                <!-- PPLG -->
                <div class="group p-8 bg-white border-2 border-gray-100 rounded-2xl card-hover text-center" data-aos="fade-up">
                    <div class="w-20 h-20 mx-auto mb-6">
                        <img src="{{ asset('images/pplg.png') }}" alt="PPLG" class="w-full h-full object-contain">
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-3">PPLG</h3>
                    <p class="text-gray-600 mb-6">Pengembangan Perangkat Lunak dan Gim</p>
                    <a href="{{ route('jurusan.pplg') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
                        Selengkapnya <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>

                <!-- TJKT -->
                <div class="group p-8 bg-white border-2 border-gray-100 rounded-2xl card-hover text-center" data-aos="fade-up">
                    <div class="w-20 h-20 mx-auto mb-6">
                        <img src="{{ asset('images/tjkt.png') }}" alt="TJKT" class="w-full h-full object-contain">
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-3">TJKT</h3>
                    <p class="text-gray-600 mb-6">Teknik Jaringan Komputer dan Telekomunikasi</p>
                    <a href="{{ route('jurusan.tjkt') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
                        Selengkapnya <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>

                <!-- TO -->
                <div class="group p-8 bg-white border-2 border-gray-100 rounded-2xl card-hover text-center" data-aos="fade-up">
                    <div class="w-20 h-20 mx-auto mb-6">
                        <img src="{{ asset('images/to.png') }}" alt="TO" class="w-full h-full object-contain">
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-3">TO</h3>
                    <p class="text-gray-600 mb-6">Teknik Otomotif</p>
                    <a href="{{ route('jurusan.to') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
                        Selengkapnya <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>

                <!-- TP -->
                <div class="group p-8 bg-white border-2 border-gray-100 rounded-2xl card-hover text-center" data-aos="fade-up">
                    <div class="w-20 h-20 mx-auto mb-6">
                        <img src="{{ asset('images/tp.jpeg') }}" alt="TP" class="w-full h-full object-contain">
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-3">TP</h3>
                    <p class="text-gray-600 mb-6">Teknik Pengelasan</p>
                    <a href="{{ route('jurusan.tp') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
                        Selengkapnya <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Informasi & Agenda -->
    <section class="py-24 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-20" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Informasi & Agenda</h2>
                <p class="text-gray-600 text-lg">Tetap update dengan informasi dan kegiatan terbaru</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <!-- Informasi -->
                <div>
                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden" data-aos="fade-up">
                        <div class="p-6 border-b">
                            <h3 class="text-2xl font-bold text-gray-900">Informasi Terkini</h3>
                        </div>
                        <div class="divide-y">
                            <!-- Informasi 1 -->
                            <div class="p-6 hover:bg-gray-50 transition-colors">
                                <div class="flex gap-6">
                                    <div class="w-32 h-32 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-graduation-cap text-4xl text-gray-400"></i>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                                            <i class="fas fa-calendar"></i>
                                            20 November 2024
                                        </div>
                                        <h4 class="text-xl font-semibold text-gray-900 mb-2">Penerimaan Siswa Baru 2024/2025</h4>
                                        <p class="text-gray-600 line-clamp-2">Informasi lengkap mengenai pendaftaran siswa baru tahun ajaran 2024/2025. Segera daftarkan diri Anda!</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Informasi 2 -->
                            <div class="p-6 hover:bg-gray-50 transition-colors">
                                <div class="flex gap-6">
                                    <div class="w-32 h-32 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-trophy text-4xl text-gray-400"></i>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                                            <i class="fas fa-calendar"></i>
                                            18 November 2024
                                        </div>
                                        <h4 class="text-xl font-semibold text-gray-900 mb-2">Prestasi Gemilang di Olimpiade Nasional</h4>
                                        <p class="text-gray-600 line-clamp-2">Siswa SMKN 4 Bogor berhasil meraih medali emas dalam Olimpiade Sains Nasional bidang Informatika.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Informasi 3 -->
                            <div class="p-6 hover:bg-gray-50 transition-colors">
                                <div class="flex gap-6">
                                    <div class="w-32 h-32 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-laptop-code text-4xl text-gray-400"></i>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                                            <i class="fas fa-calendar"></i>
                                            15 November 2024
                                        </div>
                                        <h4 class="text-xl font-semibold text-gray-900 mb-2">Workshop Coding bersama Google</h4>
                                        <p class="text-gray-600 line-clamp-2">SMKN 4 Bogor mengadakan workshop coding bersama developer dari Google Indonesia.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Agenda -->
                <div>
                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden" data-aos="fade-up">
                        <div class="p-6 border-b">
                            <h3 class="text-2xl font-bold text-gray-900">Agenda Sekolah</h3>
                        </div>
                        <div class="divide-y">
                            <!-- Agenda 1 -->
                            <div class="p-6 hover:bg-gray-50 transition-colors">
                                <div class="flex gap-6">
                                    <div class="w-32 h-32 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-book text-4xl text-gray-400"></i>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                                            <i class="fas fa-calendar"></i>
                                            1-10 Desember 2024
                                        </div>
                                        <h4 class="text-xl font-semibold text-gray-900 mb-2">Ujian Akhir Semester Ganjil</h4>
                                        <p class="text-gray-600 line-clamp-2">Pelaksanaan Ujian Akhir Semester Ganjil tahun ajaran 2024/2025.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Agenda 2 -->
                            <div class="p-6 hover:bg-gray-50 transition-colors">
                                <div class="flex gap-6">
                                    <div class="w-32 h-32 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-music text-4xl text-gray-400"></i>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                                            <i class="fas fa-calendar"></i>
                                            20 Desember 2024
                                        </div>
                                        <h4 class="text-xl font-semibold text-gray-900 mb-2">Pentas Seni Akhir Tahun</h4>
                                        <p class="text-gray-600 line-clamp-2">Acara pentas seni untuk menutup tahun 2024 dengan penampilan dari siswa-siswi berbakat.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Agenda 3 -->
                            <div class="p-6 hover:bg-gray-50 transition-colors">
                                <div class="flex gap-6">
                                    <div class="w-32 h-32 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-briefcase text-4xl text-gray-400"></i>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                                            <i class="fas fa-calendar"></i>
                                            5 Januari 2025
                                        </div>
                                        <h4 class="text-xl font-semibold text-gray-900 mb-2">Seminar Karir dan Teknologi</h4>
                                        <p class="text-gray-600 line-clamp-2">Seminar karir dan perkembangan teknologi terkini bersama praktisi industri.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Galeri -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-20" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Galeri Kegiatan</h2>
                <p class="text-gray-600 text-lg">Dokumentasi kegiatan dan prestasi sekolah</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($fotos->take(8) as $foto)
                <div class="group relative aspect-square overflow-hidden rounded-2xl" data-aos="fade-up">
                    <img src="{{ asset('storage/fotos' . $foto->file) }}" 
                         alt="{{ $foto->judul }}" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                        <div class="p-6">
                            <h3 class="text-white font-medium">{{ $foto->judul }}</h3>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-16">
                <a href="{{ route('galeri') }}" class="inline-block bg-gray-900 text-white px-10 py-4 rounded-lg hover:bg-gray-800 transition-colors text-lg font-medium">
                    Lihat Semua Galeri
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Hanya jalankan jika elemen parallax ada
    document.addEventListener('DOMContentLoaded', function() {
        const parallax = document.querySelector('.parallax');
        if (parallax) {
            window.addEventListener('scroll', function() {
                let scrollPosition = window.pageYOffset;
                parallax.style.backgroundPositionY = scrollPosition * 0.5 + 'px';
            });
        }
    });
</script>
@endpush
