<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Petugas extends Authenticatable
{
    protected $table = 'petugas';
    protected $guarded = ['id'];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
