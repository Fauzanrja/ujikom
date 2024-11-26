<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['nama'];

    public function galeris()
    {
        return $this->hasMany(Galery::class, 'kategori_id');
    }
} 