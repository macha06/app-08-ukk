<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koleksi extends Model
{
    protected $table = 'koleksi';
    use HasFactory;

    protected $fillable = [
        'id_buku',
        'id_user',
    ];
}
