@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between">
        <h3 class="text-3xl font-medium text-white">Edit Galery</h3>
        <a href="{{ route('galery.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>

    <div class="mt-8">
        <form action="{{ route('galery.update', $galery->id) }}" method="POST" class="bg-gray-900 shadow-xl rounded-lg p-6">
            @csrf
            @method('PUT')
            
            <div class="mb-6">
                <label for="post_id" class="block text-gray-300 text-sm font-bold mb-2">Post</label>
                <select name="post_id" id="post_id" 
                        class="w-full bg-gray-800 text-white rounded-lg border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 outline-none transition-colors duration-200 px-3 py-2" 
                        required>
                    @foreach($posts as $post)
                        <option value="{{ $post->id }}" {{ $post->id == $galery->post_id ? 'selected' : '' }}>
                            {{ $post->judul }}
                        </option>
                    @endforeach
                </select>
                @error('post_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="position" class="block text-gray-300 text-sm font-bold mb-2">Posisi</label>
                <input type="number" name="position" id="position" min="1"
                       value="{{ old('position', $galery->position) }}"
                       class="w-full bg-gray-800 text-white rounded-lg border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 outline-none transition-colors duration-200 px-3 py-2" 
                       required>
                @error('position')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="status" class="block text-gray-300 text-sm font-bold mb-2">Status</label>
                <select name="status" id="status" 
                        class="w-full bg-gray-800 text-white rounded-lg border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 outline-none transition-colors duration-200 px-3 py-2" 
                        required>
                    <option value="1" {{ $galery->status == 1 ? 'selected' : '' }}>Posting</option>
                    <option value="0" {{ $galery->status == 0 ? 'selected' : '' }}>Draft</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                    <i class="fas fa-save mr-2"></i>Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
