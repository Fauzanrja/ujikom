@extends('layouts.admin')

@section('content')
<main class="flex-grow p-6 bg-gray-900">
    <header class="flex items-center justify-between mb-8">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-3xl font-semibold text-white">Posts</h1>
        </div>
    </header>

    <!-- Button Add Post -->
    <div class="my-6 justify-end">
        <a href="{{ route('admin.posts.create') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
            + Tambah Post
        </a>
    </div>

    <!-- Tabel Posts -->
    <div class="overflow-x-auto bg-gray-800 shadow-md rounded-lg">
        <table class="min-w-full table-auto text-sm">
            <thead class="bg-gray-700">
                <tr>
                    <th class="border-b border-gray-600 px-6 py-3 text-left font-medium text-white">No</th>
                    <th class="border-b border-gray-600 px-6 py-3 text-left font-medium text-white">Judul</th>
                    <th class="border-b border-gray-600 px-6 py-3 text-left font-medium text-white">Kategori</th>
                    <th class="border-b border-gray-600 px-6 py-3 text-left font-medium text-white">Status</th>
                    <th class="border-b border-gray-600 px-6 py-3 text-left font-medium text-white">Tanggal</th>
                    <th class="border-b border-gray-600 px-6 py-3 text-left font-medium text-white">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr class="border-b border-gray-700 hover:bg-gray-700">
                        <td class="border-b border-gray-700 px-6 py-3 text-white">{{ $loop->iteration }}</td>
                        <td class="border-b border-gray-700 px-6 py-3 text-white">{{ $post->judul }}</td>
                        <td class="border-b border-gray-700 px-6 py-3 text-white">{{ $post->kategori->nama_kategori }}</td>
                        <td class="border-b border-gray-700 px-6 py-3 text-white">{{ $post->status }}</td>
                        <td class="border-b border-gray-700 px-6 py-3 text-white">{{ $post->created_at }}</td>
                        <td class="border-b border-gray-700 px-6 py-3 space-x-3">
                            <a href="{{ route('admin.posts.edit', $post->id) }}" 
                               class="px-4 py-2 bg-yellow-500 text-white rounded-lg shadow-md hover:bg-yellow-600 transition duration-300">
                                Ubah
                            </a>

                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="px-4 py-2 bg-red-600 text-white rounded-lg shadow-md hover:bg-red-700 transition duration-300"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus post ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
