<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{

    public function index()
    {
        $kategori = Kategori::all(); // Mengambil semua kategori dari database
        return view('admin.kategori.index', compact('kategori')); // Menampilkan tampilan kategori dengan data kategori
    }
    // Menampilkan form create kategori
    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
        ]);

        // Menyimpan kategori baru
        Kategori::create($validated);

        // Redirect ke halaman manajemen kategori setelah menambah data
        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }


    // Menampilkan form edit kategori
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id); // Mendapatkan kategori berdasarkan ID
        return view('admin.kategori.edit', compact('kategori'));
    }

    // Memperbarui kategori
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id); // Mendapatkan kategori berdasarkan ID
        $kategori->judul = $request->judul;
        $kategori->save();

        return redirect()->route('admin.kategori.index', $kategori->id)->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        $lastId = Kategori::max('id');
        $newAutoIncrement = $lastId ? $lastId + 1 : 1;
        DB::statement("ALTER TABLE kategori AUTO_INCREMENT = {$newAutoIncrement}");
        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
