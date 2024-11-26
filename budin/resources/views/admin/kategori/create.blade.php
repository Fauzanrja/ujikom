@extends('layouts.admin')

@section('content')
<main class="flex-grow p-6 bg-white">
    <header class="flex items-center justify-between mb-8">
        <div class="max-w-7xl mx-auto bg-white p-8">
            <h1 class="text-3xl font-semibold text-gray-900">Kategori</h1>
        </div>

    </header>

    <form action="{{ route('admin.kategori.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="judul" class="block text-gray-700 font-semibold mb-2">Judul Kategori</label>
            <input type="text" name="judul" id="judul" class="w-full p-2 border border-gray-300 rounded-lg" required>
        </div>

        <!-- Flexbox untuk tombol Cancel dan Simpan di kiri -->
        <div class="flex justify-start gap-4 mt-6">
            <!-- Tombol Cancel -->
            <a href="{{ route('admin.kategori.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">
                Kembali
            </a>
            <!-- Tombol Simpan -->
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                Simpan
            </button>
        </div>
    </form>
</main>
@endsection
