@extends('layouts.app')

@section('title', 'Teknik Pengelasan - SMKN 4 Bogor')

@push('styles')
<style>
    .gradient-text {
        background: linear-gradient(to right, #f59e0b, #d97706);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-amber-900 relative overflow-hidden">
        <!-- Content -->
        <div class="relative container mx-auto px-6 py-32">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <div class="inline-block px-4 py-2 bg-amber-500/10 rounded-full">
                        <span class="text-amber-400 font-medium">Program Keahlian</span>
                    </div>
                    <h1 class="text-5xl lg:text-7xl font-bold text-white">
                        Teknik <span class="gradient-text">Pengelasan</span>
                    </h1>
                    <p class="text-xl text-gray-400">
                        Menjadi ahli pengelasan profesional dengan standar internasional
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#kompetensi" class="px-8 py-4 bg-amber-600 text-white rounded-xl hover:bg-amber-700 transition-colors">
                            Kompetensi
                        </a>
                        <a href="#sertifikasi" class="px-8 py-4 bg-gray-800 text-white rounded-xl hover:bg-gray-700 transition-colors">
                            Sertifikasi
                        </a>
                    </div>
                </div>
                <div class="relative hidden lg:block">
                    <img src="{{ asset('images/tp.jpeg') }}" alt="Welding" class="w-full rounded-2xl">
                    <div class="absolute inset-0 bg-gradient-to-r from-gray-900/50 to-transparent rounded-2xl"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kompetensi Section -->
    <section id="kompetensi" class="py-32 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl font-bold mb-4">Kompetensi Keahlian</h2>
                <p class="text-gray-600">Program pembelajaran sesuai standar industri internasional</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- SMAW -->
                <div class="p-8 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-all duration-300">
                    <div class="w-16 h-16 bg-amber-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-fire text-amber-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">SMAW</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center">
                            <i class="fas fa-check text-amber-500 mr-2"></i>
                            Shielded Metal Arc Welding
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-amber-500 mr-2"></i>
                            Las Busur Manual
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-amber-500 mr-2"></i>
                            Teknik Pengelasan Dasar
                        </li>
                    </ul>
                </div>

                <!-- GMAW -->
                <div class="p-8 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-all duration-300">
                    <div class="w-16 h-16 bg-amber-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-bolt text-amber-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">GMAW/MIG</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center">
                            <i class="fas fa-check text-amber-500 mr-2"></i>
                            Gas Metal Arc Welding
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-amber-500 mr-2"></i>
                            Las MIG
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-amber-500 mr-2"></i>
                            Pengelasan Semi Otomatis
                        </li>
                    </ul>
                </div>

                <!-- GTAW -->
                <div class="p-8 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-all duration-300">
                    <div class="w-16 h-16 bg-amber-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-atom text-amber-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">GTAW/TIG</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center">
                            <i class="fas fa-check text-amber-500 mr-2"></i>
                            Gas Tungsten Arc Welding
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-amber-500 mr-2"></i>
                            Las TIG
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-amber-500 mr-2"></i>
                            Pengelasan Presisi
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Sertifikasi Section -->
    <section id="sertifikasi" class="py-32 bg-gray-900 text-white">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl font-bold mb-4">Sertifikasi Internasional</h2>
                <p class="text-gray-400">Sertifikasi yang diakui secara global</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-6 border border-gray-800 rounded-xl">
                    <div class="w-12 h-12 bg-amber-500/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-certificate text-amber-400"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">AWS Certification</h3>
                    <p class="text-gray-400">American Welding Society</p>
                </div>

                <div class="p-6 border border-gray-800 rounded-xl">
                    <div class="w-12 h-12 bg-amber-500/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-award text-amber-400"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">ISO Certification</h3>
                    <p class="text-gray-400">International Standards Organization</p>
                </div>

                <div class="p-6 border border-gray-800 rounded-xl">
                    <div class="w-12 h-12 bg-amber-500/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-star text-amber-400"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">BNSP</h3>
                    <p class="text-gray-400">Badan Nasional Sertifikasi Profesi</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Fasilitas Workshop -->
    <section class="py-32 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl font-bold mb-4">Fasilitas Workshop</h2>
                <p class="text-gray-600">Workshop modern dengan peralatan standar industri</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="relative group overflow-hidden rounded-2xl">
                    <img src="{{ asset('images/r-tp2.jpg') }}" alt="Workshop" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent p-6 flex flex-col justify-end">
                        <h3 class="text-xl font-bold text-white">Ruang Las SMAW</h3>
                        <p class="text-gray-300">Dilengkapi mesin las terbaru</p>
                    </div>
                </div>

                <div class="relative group overflow-hidden rounded-2xl">
                    <img src="{{ asset('images/r-tp.jpg') }}" alt="Workshop" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent p-6 flex flex-col justify-end">
                        <h3 class="text-xl font-bold text-white">Lab MIG/TIG</h3>
                        <p class="text-gray-300">Peralatan las presisi</p>
                    </div>
                </div>

                <div class="relative group overflow-hidden rounded-2xl">
                    <img src="{{ asset('images/r-to.jpeg') }}" alt="Workshop" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent p-6 flex flex-col justify-end">
                        <h3 class="text-xl font-bold text-white">Area Fabrikasi</h3>
                        <p class="text-gray-300">Ruang kerja yang luas</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Prospek Karir -->
    <section class="py-32 bg-gray-900 text-white">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl font-bold mb-4">Prospek Karir</h2>
                <p class="text-gray-400">Peluang karir yang menanti</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="p-6 border border-gray-800 rounded-xl">
                    <div class="w-12 h-12 bg-amber-500/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-industry text-amber-400"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Welder Industri</h3>
                    <p class="text-gray-400">Industri manufaktur & konstruksi</p>
                </div>

                <div class="p-6 border border-gray-800 rounded-xl">
                    <div class="w-12 h-12 bg-amber-500/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-ship text-amber-400"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Welder Kapal</h3>
                    <p class="text-gray-400">Industri perkapalan</p>
                </div>

                <div class="p-6 border border-gray-800 rounded-xl">
                    <div class="w-12 h-12 bg-amber-500/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-hard-hat text-amber-400"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Supervisor Las</h3>
                    <p class="text-gray-400">Pengawas proyek pengelasan</p>
                </div>

                <div class="p-6 border border-gray-800 rounded-xl">
                    <div class="w-12 h-12 bg-amber-500/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-store text-amber-400"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Wirausaha</h3>
                    <p class="text-gray-400">Bengkel las & fabrikasi</p>
                </div>
            </div>
        </div>
    </section>
@endsection 