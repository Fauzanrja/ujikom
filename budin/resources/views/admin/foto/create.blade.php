{{-- resources/views/foto/create.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between">
        <h3 class="text-3xl font-medium text-white">Tambah Foto</h3>
        <a href="{{ route('admin.foto.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>

    <div class="mt-8">
        <form action="{{ route('admin.foto.store') }}" method="POST" enctype="multipart/form-data" class="bg-gray-900 shadow-xl rounded-lg p-6">
            @csrf

            <div class="mb-6">
                <label for="judul" class="block text-gray-300 text-sm font-bold mb-2">Judul Foto</label>
                <input type="text" name="judul" id="judul" 
                       class="w-full bg-gray-800 text-white rounded-lg border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 outline-none transition-colors duration-200 px-3 py-2" 
                       required>
                @error('judul')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="file" class="block text-gray-300 text-sm font-bold mb-2">File Foto</label>
                <input type="file" name="file" id="file" 
                       class="w-full bg-gray-800 text-white rounded-lg border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 outline-none transition-colors duration-200 px-3 py-2" 
                       required>
                @error('file')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="galery_id" class="block text-gray-300 text-sm font-bold mb-2">Galeri</label>
                <select name="galery_id" id="galery_id" 
                        class="w-full bg-gray-800 text-white rounded-lg border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 outline-none transition-colors duration-200 px-3 py-2" 
                        required>
                    <option value="">Pilih Galeri</option>
                    @foreach ($galery as $g)
                        <option value="{{ $g->id }}">{{ $g->post->judul }}</option>
                    @endforeach
                </select>
                @error('galery_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                    <i class="fas fa-save mr-2"></i>Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
