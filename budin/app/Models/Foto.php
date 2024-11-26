<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $table = 'foto';
    protected $fillable = ['galery_id', 'file', 'judul'];
    public $timestamps = false;
   
    public function galery()
    {
        return $this->belongsTo(Galery::class, 'galery_id');
    }

    public function getFotoUrlAttribute()
    {
        return asset('storage/fotos/' . $this->file);
    }
}