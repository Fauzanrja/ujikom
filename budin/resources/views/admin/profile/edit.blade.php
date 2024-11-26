@extends('layouts.admin')

@section('content')
<main class="flex-grow p-6 bg-gray-900">
    <header class="flex items-center justify-between mb-8">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-3xl font-semibold text-white">Edit Profile</h1>
        </div>
    </header>

    <div class="bg-gray-800 rounded-lg shadow-md p-6">
        <form action="{{ route('admin.profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="judul" class="block text-white text-sm font-medium mb-2">Judul</label>
                <input type="text" name="judul" id="judul" 
                       class="w-full bg-gray-700 border border-gray-600 text-white rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500"
                       value="{{ old('judul', $profile->judul) }}" required>
                @error('judul')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="isi" class="block text-white text-sm font-medium mb-2">Isi</label>
                <textarea name="isi" id="isi" rows="4" 
                          class="w-full bg-gray-700 border border-gray-600 text-white rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500"
                          required>{{ old('isi', $profile->isi) }}</textarea>
                @error('isi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="status" class="block text-white text-sm font-medium mb-2">Status</label>
                <select name="status" id="status" 
                        class="w-full bg-gray-700 border border-gray-600 text-white rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                    <option value="draft" {{ $profile->status == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="posting" {{ $profile->status == 'posting' ? 'selected' : '' }}>Posting</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.profile.index') }}" 
                   class="px-6 py-2 bg-gray-600 text-white rounded-lg shadow-md hover:bg-gray-700 transition duration-300">
                    Kembali
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                    Update
                </button>
            </div>
        </form>
    </div>
</main>
@endsection
