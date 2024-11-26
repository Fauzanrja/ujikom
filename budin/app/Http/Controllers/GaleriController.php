<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Galery;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $fotos = Foto::whereHas('galery', function($query) {
            $query->whereHas('post', function($q) {
                $q->where('kategori_id', 2);
            });
        })
        ->orderBy('id', 'desc')
        ->paginate(12);
        
        $categories = Kategori::all();
        
        return view('galeri', compact('fotos', 'categories'));
    }
} 