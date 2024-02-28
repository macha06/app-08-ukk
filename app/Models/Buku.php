<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    use HasFactory;
    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'deskripsi',
        'gambar',
        'stok',
    ];


    public function kategori()
    {
        return $this->belongsToMany(Kategori::class, 'buku_kategori');
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }

    public function koleksi()
    {
        return $this->hasMany(KoleksiBuku::class);
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class);
    }

    public function averageRating()
    {
        $totalRatings = $this->ulasan()->count();
        $sumRatings = $this->ulasan()->sum('rating');
        
        if ($totalRatings > 0) {
            return round($sumRatings / $totalRatings, 2);
        } else {
            return 0;
        }
    }
}
