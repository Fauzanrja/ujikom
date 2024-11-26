<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Galery;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Foto untuk informasi (kategori_id = 1)
        $informasi = Foto::whereHas('galery', function($query) {
            $query->whereHas('post', function($q) {
                $q->where('kategori_id', 1);
            });
        })
        ->orderBy('id', 'desc')
        ->take(3)
        ->get();

        // Foto untuk galeri (kategori_id = 2)
        $fotos = Foto::whereHas('galery', function($query) {
            $query->whereHas('post', function($q) {
                $q->where('kategori_id', 2);
            });
        })
        ->orderBy('id', 'desc')
        ->take(8)
        ->get();

        // Foto untuk agenda (kategori_id = 3)
        $agenda = Foto::whereHas('galery', function($query) {
            $query->whereHas('post', function($q) {
                $q->where('kategori_id', 3);
            });
        })
        ->orderBy('id', 'desc')
        ->take(3)
        ->get();
        
        return view('welcome', compact('informasi', 'fotos', 'agenda'));
    }
} 