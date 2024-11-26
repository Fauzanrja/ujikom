@extends('layouts.admin')

@section('content')
<div class="p-6 bg-black min-h-screen text-white">
    <!-- Welcome Banner -->
    <div class="relative bg-gray-800 rounded-3xl p-8 mb-8 overflow-hidden">
        <div class="absolute right-0 top-0 -mt-10 -mr-10">
            <i class="fas fa-user-shield text-gray-700 text-9xl opacity-20"></i>
        </div>
        <div class="relative">
            <h1 class="text-3xl font-bold text-white mb-2">Selamat Datang, {{ Auth::user()->nama }}!</h1>
            <p class="text-gray-300">Dashboard Admin SMKN 4 Bogor</p>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Petugas -->
        <div class="bg-gray-900 rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-gray-700 p-3 rounded-xl">
                    <i class="fas fa-users text-2xl text-blue-400"></i>
                </div>
                <span class="text-sm font-medium text-gray-400">Total Petugas</span>
            </div>
            <div class="flex items-center justify-between">
                <h3 class="text-2xl font-bold text-white">{{ $petugasCount }}</h3>
                <span class="text-green-500 text-sm font-medium flex items-center">
                    <i class="fas fa-arrow-up mr-1"></i>
                    12%
                </span>
            </div>
        </div>

        <!-- Total Profile -->
        <div class="bg-gray-900 rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-gray-700 p-3 rounded-xl">
                    <i class="fas fa-id-card text-2xl text-purple-400"></i>
                </div>
                <span class="text-sm font-medium text-gray-400">Total Profile</span>
            </div>
            <div class="flex items-center justify-between">
                <h3 class="text-2xl font-bold text-white">{{ $profileCount }}</h3>
                <span class="text-green-500 text-sm font-medium flex items-center">
                    <i class="fas fa-arrow-up mr-1"></i>
                    8%
                </span>
            </div>
        </div>

        <!-- Total Posts -->
        <div class="bg-gray-900 rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-gray-700 p-3 rounded-xl">
                    <i class="fas fa-newspaper text-2xl text-green-400"></i>
                </div>
                <span class="text-sm font-medium text-gray-400">Total Posts</span>
            </div>
            <div class="flex items-center justify-between">
                <h3 class="text-2xl font-bold text-white">{{ $postsCount }}</h3>
                <span class="text-green-500 text-sm font-medium flex items-center">
                    <i class="fas fa-arrow-up mr-1"></i>
                    15%
                </span>
            </div>
        </div>

        <!-- Total Gallery -->
        <div class="bg-gray-900 rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-gray-700 p-3 rounded-xl">
                    <i class="fas fa-images text-2xl text-pink-400"></i>
                </div>
                <span class="text-sm font-medium text-gray-400">Total Gallery</span>
            </div>
            <div class="flex items-center justify-between">
                <h3 class="text-2xl font-bold text-white">{{ $galeryCount }}</h3>
                <span class="text-green-500 text-sm font-medium flex items-center">
                    <i class="fas fa-arrow-up mr-1"></i>
                    20%
                </span>
            </div>
        </div>
    </div>

    <!-- Recent Activities & Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Activities -->
        <div class="bg-gray-900 rounded-2xl p-6 shadow-sm">
            <h2 class="text-xl font-bold text-white mb-4 flex items-center">
                <i class="fas fa-history mr-2 text-gray-400"></i>
                Aktivitas Terbaru
            </h2>
            <div class="space-y-4">
                @foreach($recentActivities ?? [] as $activity)
                <div class="flex items-start space-x-4">
                    <div class="bg-gray-700 p-2 rounded-lg">
                        <i class="fas fa-clock text-gray-400"></i>
                    </div>
                    <div>
                        <p class="text-gray-300">{{ $activity->description }}</p>
                        <span class="text-sm text-gray-500">{{ $activity->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-gray-900 rounded-2xl p-6 shadow-sm">
            <h2 class="text-xl font-bold text-white mb-4 flex items-center">
                <i class="fas fa-bolt mr-2 text-gray-400"></i>
                Aksi Cepat
            </h2>
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('admin.posts.create') }}" class="flex items-center p-4 bg-gray-800 rounded-xl hover:bg-gray-700 transition-colors">
                    <div class="bg-gray-700 p-2 rounded-lg mr-4">
                        <i class="fas fa-plus text-blue-400"></i>
                    </div>
                    <span class="text-white font-medium">Tambah Post</span>
                </a>

                <a href="{{ route('galery.create') }}" class="flex items-center p-4 bg-gray-800 rounded-xl hover:bg-gray-700 transition-colors">
                    <div class="bg-gray-700 p-2 rounded-lg mr-4">
                        <i class="fas fa-cloud-upload-alt text-green-400"></i>
                    </div>
                    <span class="text-white font-medium">Upload Foto</span>
                </a>

                <a href="{{ route('admin.kategori.index') }}" class="flex items-center p-4 bg-gray-800 rounded-xl hover:bg-gray-700 transition-colors">
                    <div class="bg-gray-700 p-2 rounded-lg mr-4">
                        <i class="fas fa-tags text-purple-400"></i>
                    </div>
                    <span class="text-white font-medium">Kelola Kategori</span>
                </a>

                <a href="{{ route('petugas.index') }}" class="flex items-center p-4 bg-gray-800 rounded-xl hover:bg-gray-700 transition-colors">
                    <div class="bg-gray-700 p-2 rounded-lg mr-4">
                        <i class="fas fa-user-cog text-yellow-400"></i>
                    </div>
                    <span class="text-white font-medium">Kelola Petugas</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
