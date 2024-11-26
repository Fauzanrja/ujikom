<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class FotoController extends Controller
{
    public function index()
    {
        $foto = Foto::with('galery.post')->get();
        return view('admin.foto.index', compact('foto'));
    }

    public function create()
    {
        $galery = Galery::all();
        return view('admin.foto.create', compact('galery'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'galery_id' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif',
            'judul' => 'required'
        ]);

        try {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();
                
                $path = $file->storeAs('fotos', $filename, 'public');

                Foto::create([
                    'galery_id' => $request->galery_id,
                    'file' => $path,
                    'judul' => $request->judul
                ]);

                return redirect()
                    ->route('admin.foto.index')
                    ->with('success', 'Foto berhasil ditambahkan!');
            }

            return back()->with('error', 'File tidak ditemukan!');

        } catch (\Exception $e) {
            return back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit(Foto $foto)
    {
        $galery = Galery::all();
        return view('admin.foto.edit', compact('foto', 'galery'));
    }

    public function update(Request $request, Foto $foto)
{
    $request->validate([
        'galery_id' => 'required',
        'file' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'judul' => 'required'
    ]);

    try {
        // Data yang akan diperbarui
        $data = [
            'galery_id' => $request->galery_id,
            'judul' => $request->judul
        ];

        // Cek apakah ada file foto baru yang diupload
        if ($request->hasFile('file')) {
            // Hapus foto lama jika ada dan file baru diupload
            if ($foto->file && Storage::disk('public')->exists($foto->file)) {
                Storage::disk('public')->delete($foto->file);
            }

            // Simpan foto baru
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('fotos', $filename, 'public');
            $data['file'] = $path;
        } elseif ($foto->file) {
            // Jika tidak ada file baru, beri pesan peringatan bahwa foto tidak diubah
            session()->flash('foto_not_changed', 'Anda belum mengubah foto.');
        }

        // Update foto
        $foto->update($data);

        return redirect()
            ->route('admin.foto.index')
            ->with('success', 'Foto berhasil diperbarui!');

    } catch (\Exception $e) {
        // Menangani kesalahan
        return back()
            ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
            ->withInput();
    }
}


    public function destroy(Foto $foto)
{
    try {
        // Cek jika file foto ada dan terhubung dengan penyimpanan
        if ($foto->file && Storage::disk('public')->exists($foto->file)) {
            // Hapus file foto dari penyimpanan
            Storage::disk('public')->delete($foto->file);
        }

        // Hapus data foto dari database
        $foto->delete();

        // Mengatur ulang auto-increment agar ID baru mengikuti ID terakhir
        $lastId = Foto::max('id'); // Ambil ID terakhir dari data yang ada
        $newAutoIncrement = $lastId ? $lastId + 1 : 1; // Tentukan ID baru untuk auto-increment

        // Reset auto increment pada tabel foto
        DB::statement("ALTER TABLE foto AUTO_INCREMENT = {$newAutoIncrement}");

        // Redirect ke halaman daftar foto dengan pesan sukses
        return redirect()->route('admin.foto.index')->with('success', 'Foto berhasil dihapus!');
    } catch (\Exception $e) {
        // Tangani error dan tampilkan pesan error
        return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

}