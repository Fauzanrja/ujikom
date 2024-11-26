@extends('layouts.app')

@section('title', 'PPLG - SMKN 4 Bogor')

@push('styles')
<style>
    .tech-stack {
        animation: float 3s ease-in-out infinite;
    }
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
        100% { transform: translateY(0px); }
    }
    .gradient-text {
        background: linear-gradient(to right, #3b82f6, #2563eb);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>
@endpush

@section('content')
    <!-- Hero Section with Animated Elements -->
    <section class="min-h-screen bg-gray-900 relative overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute w-96 h-96 bg-blue-500/10 rounded-full -top-10 -right-10 blur-3xl"></div>
            <div class="absolute w-96 h-96 bg-indigo-500/10 rounded-full -bottom-10 -left-10 blur-3xl"></div>
        </div>

        <!-- Content -->
        <div class="relative container mx-auto px-6 py-32">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <div class="inline-block px-4 py-2 bg-blue-500/10 rounded-full">
                        <span class="text-blue-400 font-medium">Jurusan Unggulan</span>
                    </div>
                    <h1 class="text-5xl lg:text-7xl font-bold text-white">
                        Pengembangan Perangkat Lunak dan <span class="gradient-text">Gim</span>
                    </h1>
                    <p class="text-xl text-gray-400">
                        Kembangkan aplikasi dan game yang inovatif dengan teknologi terkini. 
                        Jadilah bagian dari revolusi digital masa depan.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#kurikulum" class="px-8 py-4 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors">
                            Jelajahi Program
                        </a>
                        <a href="#prospek" class="px-8 py-4 bg-gray-800 text-white rounded-xl hover:bg-gray-700 transition-colors">
                            Prospek Karir
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <!-- Tech Stack Icons -->
                    <div class="relative hidden lg:block">
                    <img src="{{ asset('images/pplg.png') }}" alt="Otomotif" class="w-full">
                </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kurikulum Section -->
    <section id="kurikulum" class="py-32 bg-white">
        <div class="container mx-auto px-6">
            <div class="max-w-3xl mx-auto text-center mb-20">
                <h2 class="text-4xl font-bold mb-4">Kurikulum</h2>
                <p class="text-gray-600">Kurikulum yang dirancang sesuai kebutuhan industri</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Semester 1-2 -->
                <div class="bg-gray-50 p-8 rounded-2xl">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <span class="text-blue-600 font-bold">1-2</span>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Dasar Pemrograman</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li>• Algoritma & Logika</li>
                        <li>• HTML, CSS & JavaScript</li>
                        <li>• Database Dasar</li>
                        <li>• Sistem Operasi</li>
                    </ul>
                </div>

                <!-- Semester 3-4 -->
                <div class="bg-gray-50 p-8 rounded-2xl">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <span class="text-blue-600 font-bold">3-4</span>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Pengembangan Web & Mobile</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li>• React & React Native</li>
                        <li>• Flutter Development</li>
                        <li>• Backend Development</li>
                        <li>• API Integration</li>
                    </ul>
                </div>

                <!-- Semester 5-6 -->
                <div class="bg-gray-50 p-8 rounded-2xl">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <span class="text-blue-600 font-bold">5-6</span>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Game Development</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li>• Unity Game Engine</li>
                        <li>• Game Design</li>
                        <li>• 3D Modeling</li>
                        <li>• Project Development</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Fasilitas Lab -->
    <section class="py-32 bg-gray-900">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <h2 class="text-4xl font-bold text-white">Fasilitas Laboratorium</h2>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-blue-500/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white mb-2">Lab Komputer Modern</h3>
                                <p class="text-gray-400">Dilengkapi dengan komputer spesifikasi tinggi dan software terkini</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-blue-500/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white mb-2">Mobile Development Lab</h3>
                                <p class="text-gray-400">Perangkat mobile untuk pengembangan dan testing aplikasi</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-blue-500/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white mb-2">Game Development Studio</h3>
                                <p class="text-gray-400">Studio khusus untuk pengembangan game dengan peralatan modern</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <img src="{{ asset('images/r-pplg1.jpg') }}" alt="Lab PPLG" class="rounded-xl">
                    <img src="{{ asset('images/r-pplg2.jpg') }}" alt="Lab PPLG" class="rounded-xl mt-8">
                </div>
            </div>
        </div>
    </section>

    <!-- Prospek Karir -->
    <section id="prospek" class="py-32 bg-white">
        <div class="container mx-auto px-6">
            <div class="max-w-3xl mx-auto text-center mb-20">
                <h2 class="text-4xl font-bold mb-4">Prospek Karir</h2>
                <p class="text-gray-600">Peluang karir yang menanti setelah lulus</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="p-8 border border-gray-200 rounded-2xl hover:border-blue-500 transition-colors">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Software Developer</h3>
                    <p class="text-gray-600 mb-4">Mengembangkan aplikasi web dan mobile untuk berbagai platform</p>
                    <p class="text-sm text-gray-500">Rata-rata Gaji: Rp 8-15 juta/bulan</p>
                </div>

                <div class="p-8 border border-gray-200 rounded-2xl hover:border-blue-500 transition-colors">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Game Developer</h3>
                    <p class="text-gray-600 mb-4">Membuat game untuk PC, mobile, dan konsol game</p>
                    <p class="text-sm text-gray-500">Rata-rata Gaji: Rp 7-12 juta/bulan</p>
                </div>

                <div class="p-8 border border-gray-200 rounded-2xl hover:border-blue-500 transition-colors">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">UI/UX Designer</h3>
                    <p class="text-gray-600 mb-4">Merancang antarmuka dan pengalaman pengguna</p>
                    <p class="text-sm text-gray-500">Rata-rata Gaji: Rp 6-10 juta/bulan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-32 bg-gray-900">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl font-bold text-white mb-8">Siap Menjadi Developer Masa Depan?</h2>
                <p class="text-xl text-gray-400 mb-12">
                    Bergabunglah dengan PPLG SMKN 4 Bogor dan mulai perjalanan karirmu di dunia teknologi
                </p>
                <a href="#" class="inline-block px-8 py-4 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors">
                    Daftar Sekarang
                </a>
            </div>
        </div>
    </section>
@endsection 