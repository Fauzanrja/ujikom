@extends('layouts.admin')

@section('content')
<main class="flex-grow p-6 bg-gray-900">
    <header class="flex items-center justify-between mb-8">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-3xl font-semibold text-white">Tambah Post</h1>
        </div>
    </header>

    <div class="bg-gray-800 rounded-lg shadow-md p-6">
        <form method="POST" action="{{ route('admin.posts.store') }}">
            @csrf

            <div class="mb-6">
                <label for="judul" class="block text-white text-sm font-medium mb-2">Judul</label>
                <input type="text" name="judul" id="judul" required 
                       class="w-full bg-gray-700 border border-gray-600 text-white rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
            </div>

            <div class="mb-6">
                <label for="kategori_id" class="block text-white text-sm font-medium mb-2">Kategori</label>
                <select name="kategori_id" id="kategori_id" 
                        class="w-full bg-gray-700 border border-gray-600 text-white rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                    <option value="" disabled selected>Pilih Kategori</option>
                    @foreach ($kategori as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="isi" class="block text-white text-sm font-medium mb-2">Isi</label>
                <textarea name="isi" id="isi" rows="4" required 
                          class="w-full bg-gray-700 border border-gray-600 text-white rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500"></textarea>
            </div>

            <div class="mb-6">
                <label for="status" class="block text-white text-sm font-medium mb-2">Status</label>
                <select name="status" id="status" 
                        class="w-full bg-gray-700 border border-gray-600 text-white rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                    <option value="draft">Draft</option>
                    <option value="posting">Posting</option>
                </select>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.posts.index') }}" 
                   class="px-6 py-2 bg-gray-600 text-white rounded-lg shadow-md hover:bg-gray-700 transition duration-300">
                    Kembali
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</main>
@endsection
