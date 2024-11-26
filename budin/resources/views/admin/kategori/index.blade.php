@extends('layouts.admin')

@section('content')
<main class="flex-grow p-6 bg-gray-900">
    <header class="flex items-center justify-between mb-8">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-3xl font-semibold text-white">Kategori</h1>
        </div>
    </header>

    <!-- Button Add Kategori -->
    <div class="my-6 justify-end">
        <a href="{{ route('admin.kategori.create') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
            + Tambah Kategori
        </a>
    </div>

    <!-- Tabel Kategori -->
    <div class="overflow-x-auto bg-gray-800 shadow-md rounded-lg">
        <table class="min-w-full table-auto text-sm">
            <thead class="bg-gray-700">
                <tr>
                    <th class="border-b border-gray-600 px-6 py-3 text-left font-medium text-white">No</th>
                    <th class="border-b border-gray-600 px-6 py-3 text-left font-medium text-white">Judul</th>
                    <th class="border-b border-gray-600 px-6 py-3 text-left font-medium text-white">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $item)
                    <tr class="border-b border-gray-700 hover:bg-gray-700">
                        <td class="border-b border-gray-700 px-6 py-3 text-white">{{ $loop->iteration }}</td>
                        <td class="border-b border-gray-700 px-6 py-3 text-white">{{ $item->judul }}</td>
                        <td class="border-b border-gray-700 px-6 py-3 space-x-3">
                            <!-- Tombol Edit -->
                            <a href="{{ route('admin.kategori.edit', $item->id) }}" 
                               class="px-4 py-2 bg-yellow-500 text-white rounded-lg shadow-md hover:bg-yellow-600 transition duration-300">
                                Ubah
                            </a>

                            <!-- Form Hapus -->
                            <form action="{{ route('admin.kategori.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="px-4 py-2 bg-red-600 text-white rounded-lg shadow-md hover:bg-red-700 transition duration-300"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus kategori ini?')">
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
