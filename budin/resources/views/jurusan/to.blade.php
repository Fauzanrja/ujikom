@extends('layouts.app')

@section('title', 'Teknik Otomotif - SMKN 4 Bogor')

@push('styles')
<style>
    .gear-animation {
        animation: rotate 20s linear infinite;
    }
    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    .gradient-text {
        background: linear-gradient(to right, #dc2626, #ef4444);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="min-h-screen bg-gray-900 relative overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0">
            <div class="absolute w-[800px] h-[800px] gear-animation opacity-5">
                <svg viewBox="0 0 24 24" fill="currentColor" class="text-red-500">
                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z"/>
                    <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd"/>
                </svg>
            </div>
        </div>

        <!-- Content -->
        <div class="relative container mx-auto px-6 py-32">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <div class="inline-block px-4 py-2 bg-red-500/10 rounded-full">
                        <span class="text-red-400 font-medium">Program Keahlian</span>
                    </div>
                    <h1 class="text-5xl lg:text-7xl font-bold text-white">
                        Teknik <span class="gradient-text">Otomotif</span>
                    </h1>
                    <p class="text-xl text-gray-400">
                        Kuasai teknologi otomotif modern dan jadilah teknisi profesional masa depan
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#kompetensi" class="px-8 py-4 bg-red-600 text-white rounded-xl hover:bg-red-700 transition-colors">
                            Kompetensi
                        </a>
                        <a href="#fasilitas" class="px-8 py-4 bg-gray-800 text-white rounded-xl hover:bg-gray-700 transition-colors">
                            Fasilitas
                        </a>
                    </div>
                </div>
                <div class="relative hidden lg:block">
                    <img src="{{ asset('images/to.png') }}" alt="Otomotif" class="w-full">
                </div>
            </div>
        </div>
    </section>

    <!-- Kompetensi Section -->
    <section id="kompetensi" class="py-32 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl font-bold mb-4">Kompetensi Keahlian</h2>
                <p class="text-gray-600">Program pembelajaran yang dirancang sesuai standar industri otomotif</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Mesin -->
                <div class="p-8 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-all duration-300">
                    <div class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-engine text-red-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Teknologi Mesin</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center">
                            <i class="fas fa-check text-red-500 mr-2"></i>
                            Mesin Bensin & Diesel
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-red-500 mr-2"></i>
                            Sistem Penggerak
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-red-500 mr-2"></i>
                            Teknologi Hybrid
                        </li>
                    </ul>
                </div>

                <!-- Kelistrikan -->
                <div class="p-8 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-all duration-300">
                    <div class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-bolt text-red-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Sistem Kelistrikan</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center">
                            <i class="fas fa-check text-red-500 mr-2"></i>
                            Kelistrikan Body
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-red-500 mr-2"></i>
                            Sistem Pengapian
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-red-500 mr-2"></i>
                            Diagnosa Elektronik
                        </li>
                    </ul>
                </div>

                <!-- Chassis -->
                <div class="p-8 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-all duration-300">
                    <div class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-car text-red-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Chassis & Pemindah Tenaga</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center">
                            <i class="fas fa-check text-red-500 mr-2"></i>
                            Sistem Rem
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-red-500 mr-2"></i>
                            Transmisi Manual & Otomatis
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-red-500 mr-2"></i>
                            Sistem Kemudi
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Fasilitas Bengkel -->
    <section id="fasilitas" class="py-32 bg-gray-900">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl font-bold text-white mb-4">Fasilitas Bengkel</h2>
                <p class="text-gray-400">Bengkel praktik dengan peralatan standar industri</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="relative group overflow-hidden rounded-2xl">
                    <img src="{{ asset('images/r-tp.jpg') }}" alt="Bengkel" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent p-6 flex flex-col justify-end">
                        <h3 class="text-xl font-bold text-white">Bengkel Mesin</h3>
                        <p class="text-gray-300">Dilengkapi peralatan diagnosa modern</p>
                    </div>
                </div>

                <div class="relative group overflow-hidden rounded-2xl">
                    <img src="{{ asset('images/r-to.jpeg') }}" alt="Bengkel" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent p-6 flex flex-col justify-end">
                        <h3 class="text-xl font-bold text-white">Area Service</h3>
                        <p class="text-gray-300">Ruang praktik yang luas dan nyaman</p>
                    </div>
                </div>

                <div class="relative group overflow-hidden rounded-2xl">
                    <img src="{{ asset('images/r-to2.jpg') }}" alt="Bengkel" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent p-6 flex flex-col justify-end">
                        <h3 class="text-xl font-bold text-white">Lab Diagnosa</h3>
                        <p class="text-gray-300">Peralatan scanning dan diagnosa terkini</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Prospek Karir -->
    <section class="py-32 bg-white text-gray-900">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl font-bold mb-4">Prospek Karir</h2>
                <p class="text-gray-400">Peluang karir yang menanti setelah lulus</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="p-6 border border-gray-800 rounded-xl">
                    <div class="w-12 h-12 bg-red-500/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-wrench text-red-400"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Teknisi Profesional</h3>
                    <p class="text-gray-400">Teknisi di bengkel resmi atau dealer</p>
                </div>

                <div class="p-6 border border-gray-800 rounded-xl">
                    <div class="w-12 h-12 bg-red-500/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-user-tie text-red-400"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Service Advisor</h3>
                    <p class="text-gray-400">Konsultan servis di dealer resmi</p>
                </div>

                <div class="p-6 border border-gray-800 rounded-xl">
                    <div class="w-12 h-12 bg-red-500/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-tools text-red-400"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Wirausaha Bengkel</h3>
                    <p class="text-gray-400">Membangun usaha bengkel mandiri</p>
                </div>

                <div class="p-6 border border-gray-800 rounded-xl">
                    <div class="w-12 h-12 bg-red-500/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-chalkboard-teacher text-red-400"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Instruktur Teknis</h3>
                    <p class="text-gray-400">Pengajar di lembaga pelatihan</p>
                </div>
            </div>
        </div>
    </section>
@endsection 