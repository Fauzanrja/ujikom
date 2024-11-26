<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Galery;
use App\Models\Post;

class GaleryController extends Controller
{
    public function index()
    {
        $galeri = Galery::with('post')->get(); // Mengambil data galeri beserta data post terkait
        
        return view('admin.galery.index', compact('galeri'));
    }

    public function create()
    {
        $posts = Post::all(); // Or however you retrieve the posts data
        return view('admin.galery.create', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|integer|exists:posts,id',
            'position' => 'required|integer',
            'status' => 'required|integer',
        ]);
    
        Galery::create([
            'post_id' => $request->post_id,
            'position' => $request->position,
            'status' => $request->status,
        ]);
    
        return redirect()->route('galery.index')->with('success', 'Galeri berhasil ditambahkan');
    }

    public function edit($id)
    {
        $galery = Galery::findOrFail($id);
        $posts = Post::all();
        return view('admin.galery.edit', compact('galery', 'posts'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'post_id' => 'required|integer|exists:posts,id',
            'position' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        $galery = Galery::findOrFail($id);
        $galery->update([
            'post_id' => $request->post_id,
            'position' => $request->position,
            'status' => $request->status,
        ]);

        return redirect()->route('galery.index');
    }

    public function destroy($id)
    {
        // Temukan galeri berdasarkan ID
        $galery = Galery::findOrFail($id);

        // Hapus galeri yang dipilih
        $galery->delete();

        // Mengatur ulang auto increment agar ID baru mengikuti ID terakhir
        $lastId = Galery::max('id');  // Ambil ID terakhir dari data yang ada
        // Jika ada ID terakhir, reset AUTO_INCREMENT, jika tidak, set ke 1
        $newAutoIncrement = $lastId ? $lastId + 1 : 1;

        // Reset auto increment pada tabel galery
        DB::statement("ALTER TABLE galery AUTO_INCREMENT = {$newAutoIncrement}");

        // Mengarahkan kembali ke halaman galeri setelah penghapusan
        return redirect()->route('galery.index')->with('success', 'Galeri berhasil dihapus.');
    }

    public function toggleStatus($id)
    {
        $galery = Galery::findOrFail($id);
        
        // Toggle status (1 => Posting, 0 => Draft)
        $galery->status = $galery->status == 1 ? 0 : 1;
        $galery->save();

        return redirect()->route('galery.index')->with('success', 'Status berhasil diperbarui');
    }
}
