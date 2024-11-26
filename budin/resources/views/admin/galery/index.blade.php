@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between">
        <h3 class="text-3xl font-medium text-white">Management Galery</h3>
        <a href="{{ route('galery.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
            <i class="fas fa-plus mr-2"></i>Tambah Galery
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
                        <th class="px-6 py-3 text-left">Post</th>
                        <th class="px-6 py-3 text-left">Posisi</th>
                        <th class="px-6 py-3 text-left">Status</th>
                        <th class="px-6 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                    @foreach($galeri as $item)
                    <tr class="hover:bg-gray-800">
                        <td class="px-6 py-4 text-gray-300">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 text-gray-300">{{ $item->post->judul }}</td>
                        <td class="px-6 py-4 text-gray-300">{{ $item->position }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded-lg text-sm {{ $item->status ? 'bg-green-500' : 'bg-red-500' }} text-white">
                                {{ $item->status ? 'Posting' : 'Draft' }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <form action="{{ route('galery.toggleStatus', $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" 
                                            class="bg-purple-500 hover:bg-purple-600 text-white px-3 py-1 rounded-lg transition duration-300">
                                        <i class="fas {{ $item->status ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                                    </button>
                                </form>

                                <a href="{{ route('galery.edit', $item->id) }}" 
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-lg transition duration-300">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('galery.destroy', $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg transition duration-300"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus galery ini?')">
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

        @if($galeri->isEmpty())
        <div class="text-center text-gray-500 py-8">
            <i class="fas fa-images text-4xl mb-3"></i>
            <p>Belum ada galery yang ditambahkan</p>
        </div>
        @endif
    </div>
</div>
@endsection
