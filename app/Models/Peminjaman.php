<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    use HasFactory;

    protected $fillable = [
        'id_buku',
        'id_user',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];
}
