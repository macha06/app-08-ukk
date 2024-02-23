<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Kategori extends Model
{
    protected $table = 'kategori';
    use HasFactory;

    protected $fillable = [
        'nama_kategori'
    ];


    public function books()
    {
        return $this->belongsToMany(Buku::class);
    }
}
