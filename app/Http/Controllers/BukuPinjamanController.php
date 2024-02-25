<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuPinjamanController extends Controller
{
    public function indexBorrowedBooks()
{
    // Ambil data buku yang sedang dipinjam
    $borrowedBooks = Buku::whereHas('peminjaman', function ($query) {
        $query->where('status', 'Dipinjam');
    })->get();

    return view('peminjam.buku_pinjaman', compact('borrowedBooks'));
}
}
