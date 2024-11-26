<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\Profile;
use App\Models\Kategori;
use App\Models\Post;
use App\Models\Galery;
use App\Models\Foto;

class DashboardController extends Controller
{
    public function index()
    {
        $petugasCount = Petugas::count();
        $profileCount = Profile::count();
        $kategoriCount = Kategori::count();
        $postsCount = Post::count();
        $galeryCount = Galery::count();
        $fotoCount = Foto::count();

        return view('admin.dashboard', compact('petugasCount', 'profileCount', 'kategoriCount', 'postsCount', 'galeryCount', 'fotoCount'));
    }
}
