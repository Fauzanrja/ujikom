@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between">
        <h3 class="text-3xl font-medium text-white">Management Foto</h3>
        <a href="{{ route('admin.foto.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
            <i class="fas fa-plus mr-2"></i>Tambah Foto
        </a>
    </div>

    @if(session('success'))
    <div class="bg-green-600 text-white p-4 rounded-lg mt-6">
        {{ session('success') }}
    </div>
    @endif

    <div class="mt-8 bg-gray-900 rounded-lg shadow-xl">
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-800 text-gray-300">
                        <th class="px-6 py-3 text-left">No</th>
                        <th class="px-6 py-3 text-left">Galeri</th>
                        <th class="px-6 py-3 text-left">Judul</th>
                        <th class="px-6 py-3 text-left">Foto</th>
                        <th class="px-6 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                    @foreach($foto as $item)
                    <tr class="hover:bg-gray-800">
                        <td class="px-6 py-4 text-gray-300">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 text-gray-300">{{ $item->galery->post->judul }}</td>
                        <td class="px-6 py-4 text-gray-300">{{ $item->judul }}</td>
                        <td class="px-6 py-4">
                            <img src="{{ asset('storage/' . $item->file) }}" alt="{{ $item->judul }}" 
                                 class="w-20 h-20 object-cover rounded-lg">
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.foto.edit', $item->id) }}" 
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-lg transition duration-300">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.foto.destroy', $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg transition duration-300"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus foto ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
