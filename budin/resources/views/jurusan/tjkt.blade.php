@extends('layouts.app')

@section('title', 'TJKT - SMKN 4 Bogor')

@push('styles')
<style>
    .network-animation {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: .5; }
    }
    .gradient-text {
        background: linear-gradient(to right, #10b981, #059669);
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
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-emerald-500/20 via-gray-900 to-gray-900"></div>
            <!-- Network Grid Animation -->
            <div class="absolute inset-0 network-animation">
                <div class="grid grid-cols-12 gap-4 h-full">
                    @for($i = 0; $i < 144; $i++)
                        <div class="bg-emerald-500/5 rounded-full"></div>
                    @endfor
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="relative container mx-auto px-6 py-32">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <div class="inline-block px-4 py-2 bg-emerald-500/10 rounded-full">
                        <span class="text-emerald-400 font-medium">Program Keahlian</span>
                    </div>
                    <h1 class="text-5xl lg:text-7xl font-bold text-white">
                        Teknik Jaringan Komputer dan <span class="gradient-text">Telekomunikasi</span>
                    </h1>
                    <p class="text-xl text-gray-400">
                        Kuasai teknologi jaringan modern dan jadilah ahli infrastruktur digital masa depan
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#kompetensi" class="px-8 py-4 bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 transition-colors">
                            Kompetensi
                        </a>
                        <a href="#sertifikasi" class="px-8 py-4 bg-gray-800 text-white rounded-xl hover:bg-gray-700 transition-colors">
                            Sertifikasi
                        </a>
                    </div>
                </div>
                <div class="relative hidden lg:block">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="space-y-6">
                            <div class="p-6 bg-gray-800 rounded-xl">
                                <i class="fas fa-network-wired text-4xl text-emerald-500"></i>
                                <h3 class="text-white mt-4">Network Infrastructure</h3>
                            </div>
                            <div class="p-6 bg-gray-800 rounded-xl">
                                <i class="fas fa-cloud text-4xl text-emerald-500"></i>
                                <h3 class="text-white mt-4">Cloud Computing</h3>
                            </div>
                        </div>
                        <div class="space-y-6 mt-12">
                            <div class="p-6 bg-gray-800 rounded-xl">
                                <i class="fas fa-shield-alt text-4xl text-emerald-500"></i>
                                <h3 class="text-white mt-4">Cyber Security</h3>
                            </div>
                            <div class="p-6 bg-gray-800 rounded-xl">
                                <i class="fas fa-server text-4xl text-emerald-500"></i>
                                <h3 class="text-white mt-4">Server Administration</h3>
                            </div>
                        </div>
                    </div>
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
                <!-- Network Infrastructure -->
                <div class="p-8 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-all duration-300">
                    <div class="w-16 h-16 bg-emerald-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-network-wired text-emerald-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Network Infrastructure</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center">
                            <i class="fas fa-check text-emerald-500 mr-2"></i>
                            Routing & Switching
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-emerald-500 mr-2"></i>
                            Network Security
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-emerald-500 mr-2"></i>
                            Wireless Networks
                        </li>
                    </ul>
                </div>

                <!-- Server Administration -->
                <div class="p-8 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-all duration-300">
                    <div class="w-16 h-16 bg-emerald-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-server text-emerald-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Server Administration</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center">
                            <i class="fas fa-check text-emerald-500 mr-2"></i>
                            Linux Server
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-emerald-500 mr-2"></i>
                            Windows Server
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-emerald-500 mr-2"></i>
                            Virtualization
                        </li>
                    </ul>
                </div>

                <!-- Cloud & Security -->
                <div class="p-8 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-all duration-300">
                    <div class="w-16 h-16 bg-emerald-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-cloud text-emerald-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Cloud & Security</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center">
                            <i class="fas fa-check text-emerald-500 mr-2"></i>
                            Cloud Services
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-emerald-500 mr-2"></i>
                            Cyber Security
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-emerald-500 mr-2"></i>
                            Network Monitoring
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

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="p-6 border border-gray-800 rounded-xl">
                    <div class="w-12 h-12 bg-emerald-500/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-certificate text-emerald-400"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">CCNA</h3>
                    <p class="text-gray-400">Cisco Certified Network Associate</p>
                </div>

                <div class="p-6 border border-gray-800 rounded-xl">
                    <div class="w-12 h-12 bg-emerald-500/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-shield-alt text-emerald-400"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">CompTIA</h3>
                    <p class="text-gray-400">Network+ & Security+</p>
                </div>

                <div class="p-6 border border-gray-800 rounded-xl">
                    <div class="w-12 h-12 bg-emerald-500/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fab fa-linux text-emerald-400"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">LPIC</h3>
                    <p class="text-gray-400">Linux Professional Institute</p>
                </div>

                <div class="p-6 border border-gray-800 rounded-xl">
                    <div class="w-12 h-12 bg-emerald-500/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-cloud text-emerald-400"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">AWS</h3>
                    <p class="text-gray-400">Amazon Web Services</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Fasilitas Lab -->
    <section class="py-32 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl font-bold mb-4">Fasilitas Laboratorium</h2>
                <p class="text-gray-600">Laboratorium modern dengan peralatan standar industri</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="relative group overflow-hidden rounded-2xl">
                    <img src="{{ asset('images/r-tkj.jpg') }}" alt="Lab" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent p-6 flex flex-col justify-end">
                        <h3 class="text-xl font-bold text-white">Lab Jaringan</h3>
                        <p class="text-gray-300">Laboratorium jaringan komputer</p>
                    </div>
                </div>

                <div class="relative group overflow-hidden rounded-2xl">
                    <img src="{{ asset('images/r-pplg2.jpg') }}" alt="Lab" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent p-6 flex flex-col justify-end">
                        <h3 class="text-xl font-bold text-white">Lab Server</h3>
                        <p class="text-gray-300">Server dan virtualisasi</p>
                    </div>
                </div>

                <div class="relative group overflow-hidden rounded-2xl">
                    <img src="{{ asset('images/r-tkj2.jpg') }}" alt="Lab" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent p-6 flex flex-col justify-end">
                        <h3 class="text-xl font-bold text-white">Lab Security</h3>
                        <p class="text-gray-300">Cyber security testing</p>
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
                    <div class="w-12 h-12 bg-emerald-500/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-network-wired text-emerald-400"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Network Engineer</h3>
                    <p class="text-gray-400">Spesialis jaringan komputer</p>
                </div>

                <div class="p-6 border border-gray-800 rounded-xl">
                    <div class="w-12 h-12 bg-emerald-500/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-shield-alt text-emerald-400"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Security Analyst</h3>
                    <p class="text-gray-400">Analis keamanan jaringan</p>
                </div>

                <div class="p-6 border border-gray-800 rounded-xl">
                    <div class="w-12 h-12 bg-emerald-500/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-server text-emerald-400"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">System Admin</h3>
                    <p class="text-gray-400">Administrator sistem</p>
                </div>

                <div class="p-6 border border-gray-800 rounded-xl">
                    <div class="w-12 h-12 bg-emerald-500/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-cloud text-emerald-400"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Cloud Engineer</h3>
                    <p class="text-gray-400">Spesialis cloud computing</p>
                </div>
            </div>
        </div>
    </section>
@endsection 