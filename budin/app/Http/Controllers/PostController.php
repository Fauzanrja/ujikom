<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        // Ambil data kategori dari tabel `kategori`
        $kategori = Kategori::all();  

        return view('admin.posts.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        // Menyimpan post baru dengan data dari request
        $post = new Post();
        $post->judul = $request->judul;
        $post->kategori_id = $request->kategori_id;
        $post->isi = $request->isi;
        $post->status = $request->status;
        $post->petugas_id = auth('petugas')->user()->id; // Menyimpan petugas_id dari yang sedang login
        $post->save();

        return redirect()->route('admin.posts.index')->with('success', 'Post berhasil ditambahkan');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $kategori = Kategori::all(); 
        return view('admin.posts.edit', compact('post',  'kategori'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->judul = $request->judul;
        $post->kategori_id = $request->kategori_id;
        $post->isi = $request->isi;
        $post->status = $request->status;
        $post->save();

        return redirect()->route('admin.posts.index')->with('success', 'Post berhasil diperbarui');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->galeri()->delete();
        $post->delete();
        $lastId = Post::max('id');
        $newAutoIncrement = $lastId ? $lastId + 1 : 1;
        DB::statement("ALTER TABLE posts AUTO_INCREMENT = {$newAutoIncrement}");
        return redirect()->route('admin.posts.index')->with('success', 'Post berhasil dihapus!');
    }

    public function toggleStatus($id)
    {
        $post = Post::findOrFail($id);
        $post->status = $post->status == 1 ? 0 : 1;  // Toggle between 1 (Posting) and 0 (Draft)
        $post->save();

        return redirect()->route('admin.posts.index')->with('success', 'Status berhasil diubah');
    }

}
