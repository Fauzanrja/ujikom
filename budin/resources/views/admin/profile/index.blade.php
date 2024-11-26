@extends('layouts.admin')

@section('content')
<main class="flex-grow p-6 bg-gray-900">
    <header class="flex items-center justify-between mb-8">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-3xl font-semibold text-white">Profile</h1>
        </div>
    </header>

    <!-- Button Add Profile -->
    <div class="my-6 justify-end">
        <a href="{{ route('admin.profile.create') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
            + Tambah Profile
        </a>
    </div>

    <!-- Tabel Profile -->
    <div class="overflow-x-auto bg-gray-800 shadow-md rounded-lg">
        <table class="min-w-full table-auto text-sm">
            <thead class="bg-gray-700">
                <tr>
                    <th class="border-b border-gray-600 px-6 py-3 text-left font-medium text-white">No</th>
                    <th class="border-b border-gray-600 px-6 py-3 text-left font-medium text-white">Judul</th>
                    <th class="border-b border-gray-600 px-6 py-3 text-left font-medium text-white">Status</th>
                    <th class="border-b border-gray-600 px-6 py-3 text-left font-medium text-white">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($profiles as $profile)
                    <tr class="border-b border-gray-700 hover:bg-gray-700">
                        <td class="border-b border-gray-700 px-6 py-3 text-white">{{ $loop->iteration }}</td>
                        <td class="border-b border-gray-700 px-6 py-3 text-white">{{ $profile->judul }}</td>
                        <td class="border-b border-gray-700 px-6 py-3 text-white">
                            <span class="px-3 py-1 text-xs rounded-full {{ $profile->status === 'posting' ? 'bg-green-500 text-white' : 'bg-yellow-500 text-white' }}">
                                {{ $profile->status }}
                            </span>
                        </td>
                        <td class="border-b border-gray-700 px-6 py-3 space-x-3">
                            <!-- Tombol Edit -->
                            <a href="{{ route('admin.profile.edit', $profile->id) }}" 
                               class="px-4 py-2 bg-yellow-500 text-white rounded-lg shadow-md hover:bg-yellow-600 transition duration-300">
                                Ubah
                            </a>

                            <!-- Form Hapus -->
                            <form action="{{ route('admin.profile.destroy', $profile->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="px-4 py-2 bg-red-600 text-white rounded-lg shadow-md hover:bg-red-700 transition duration-300"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus profile ini?')">
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
