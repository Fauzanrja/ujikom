<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;
use App\Models\Petugas;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::orderBy('id', 'desc')->get();
        return view('admin.profile.index', compact('profiles'));
    }

    public function create()
    {
        return view('admin.profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        Profile::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        return redirect()->route('admin.profile.index')->with('success', 'Profile berhasil ditambahkan');
    }

    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        $profile = Profile::findOrFail($id);
        $profile->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        return redirect()->route('admin.profile.index')->with('success', 'Profile berhasil diperbarui');
    }

    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();

        // Reset auto increment
        $lastId = Profile::max('id');
        $newAutoIncrement = $lastId ? $lastId + 1 : 1;
        DB::statement("ALTER TABLE profile AUTO_INCREMENT = {$newAutoIncrement}");

        return redirect()->route('admin.profile.index')->with('success', 'Profile berhasil dihapus');
    }

    public function toggleStatus($id)
    {
        $profile = Profile::findOrFail($id);
        $profile->status = ($profile->status === 'draft') ? 'posting' : 'draft';
        $profile->save();

        return redirect()->route('admin.profile.index')->with('success', 'Status berhasil diperbarui');
    }

    public function show($id)
    {
        $profile = Profile::findOrFail($id);
        return view('admin.profile.show', compact('profile'));
    }
}
