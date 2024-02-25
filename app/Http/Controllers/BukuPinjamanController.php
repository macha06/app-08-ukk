<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BukuPinjamanController extends Controller
{
    public function indexBorrowedBooks()
{
    $userId = Auth::id();

    // Ambil data buku yang sedang dipinjam oleh pengguna yang sedang login
    $borrowedBooks = Buku::whereHas('peminjaman', function ($query) use ($userId) {
        $query->where('user_id', $userId)
              ->where('status', 'Dipinjam');
    })->get();

    // Ambil data buku yang sudah dipinjam oleh pengguna yang sedang login
    $returnedBooks = Buku::whereHas('peminjaman', function ($query) use ($userId) {
        $query->where('user_id', $userId)
              ->where('status', 'Dikembalikan');
    })->get();

    return view('books.borrowed', compact('borrowedBooks', 'returnedBooks'));
}
}
