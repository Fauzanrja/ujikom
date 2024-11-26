@extends('layouts.admin')

@section('content')
    <main class="flex-grow p-6 bg-gray-900">
        <header class="flex items-center justify-between mb-8">
            <div class="max-w-7xl mx-auto">
                <h1 class="text-3xl font-semibold text-white">Petugas</h1>
            </div>
        </header>

        <!-- Button Add Petugas -->
        <div class="my-6 justify-end">
            <a href="{{ route('petugas.create') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                + Tambah Petugas
            </a>
        </div>

        <!-- Table List Petugas -->
        <div class="overflow-x-auto bg-gray-800 shadow-md rounded-lg">
            <table class="min-w-full table-auto text-sm">
                <thead class="bg-gray-700">
                    <tr>
                        <th class="border-b border-gray-600 px-4 py-3 text-left font-medium text-white">ID</th>
                        <th class="border-b border-gray-600 px-4 py-3 text-left font-medium text-white">Username</th>
                        <th class="border-b border-gray-600 px-4 py-3 text-left font-medium text-white">Created At</th>
                        <th class="border-b border-gray-600 px-4 py-3 text-left font-medium text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($petugas as $p)
                        <tr class="border-b border-gray-700 hover:bg-gray-700">
                            <td class="border-b border-gray-700 px-4 py-3 text-white">{{ $p->id }}</td>
                            <td class="border-b border-gray-700 px-4 py-3 text-white">{{ $p->username }}</td>
                            <td class="border-b border-gray-700 px-4 py-3 text-white">{{ $p->created_at }}</td>
                            <td class="border-b border-gray-700 px-4 py-4 space-x-3">
                                <a href="{{ route('petugas.edit', $p->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg shadow-md hover:bg-yellow-600 transition duration-300">
                                    Ubah
                                </a>
                                <!-- Form Delete -->
                                <form action="{{ route('petugas.destroy', $p->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg shadow-md hover:bg-red-700 transition duration-300">
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

    <!-- Modal Add Petugas -->
    <div id="modal" class="fixed inset-0 flex items-center justify-center opacity-0 pointer-events-none bg-gray-900 bg-opacity-50 transition-opacity">
        <div id="modalContent" class="bg-white p-6 rounded-lg shadow-lg transform scale-90 opacity-0 transition-all w-96">
            <h2 class="text-xl font-bold mb-4 text-gray-800">Tambah Petugas</h2>
            <form id="addPetugasForm" action="{{ route('petugas.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 font-semibold">Username</label>
                    <input type="text" id="username" name="username" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                    <p id="usernameAlert" class="text-red-500 text-sm mt-1 hidden">Username belum terisi</p>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-semibold">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                    <p id="passwordAlert" class="text-red-500 text-sm mt-1 hidden">Password belum terisi</p>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" id="cancelBtn" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-400">Cancel</button>
                    <button type="submit" id="submitBtn" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-500">OK</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Petugas -->
    <div id="editModal" class="fixed inset-0 flex items-center justify-center opacity-0 pointer-events-none bg-gray-900 bg-opacity-50 transition-opacity">
        <div id="editModalContent" class="bg-white p-6 rounded-lg shadow-lg transform scale-90 opacity-0 transition-all w-96">
            <h2 class="text-xl font-bold mb-4 text-gray-800">Edit Petugas</h2>
            <form id="editPetugasForm" action="{{ route('petugas.update', ':id') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="editId" name="id">
                <div class="mb-4">
                    <label for="editUsername" class="block text-gray-700 font-semibold">Username</label>
                    <input type="text" id="editUsername" name="username" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                    <p id="editUsernameAlert" class="text-red-500 text-sm mt-1 hidden">Username telah digunakan</p>
                </div>
                <div class="mb-4">
                    <label for="editPassword" class="block text-gray-700 font-semibold">Password</label>
                    <input type="password" id="editPassword" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                    <p id="editPasswordAlert" class="text-red-500 text-sm mt-1 hidden">Password belum terisi</p>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" id="editCancelBtn" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-400">Cancel</button>
                    <button type="button" id="editSubmitBtn" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-500">OK</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Delete Confirmation -->
    <div id="deleteModal" class="fixed inset-0 flex items-center justify-center opacity-0 pointer-events-none bg-gray-900 bg-opacity-50 transition-opacity">
        <div id="deleteModalContent" class="bg-white p-6 rounded-lg shadow-lg transform scale-90 opacity-0 transition-all w-96">
            <h2 class="text-xl font-bold mb-4 text-gray-800">Konfirmasi Hapus</h2>
            <p class="text-gray-700 mb-4" id="deleteConfirmationMessage">Apakah Anda yakin ingin menghapus petugas yang terpilih?</p>
            <div class="flex justify-end space-x-4">
                <button id="deleteCancelBtn" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-400">Cancel</button>
                <button id="deleteConfirmBtn" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-500">OK</button>
            </div>
        </div>
    </div>
@endsection
