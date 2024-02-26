<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class DataPeminjamanController extends Controller
{
    public function index()
{
    // Ambil semua data peminjaman
    $loans = Peminjaman::with('user', 'buku')
    ->where('status', 'dipinjam')
    ->paginate(3);

    $loan = Peminjaman::with('user', 'buku')
    ->where('status', 'dikembalikan')
    ->paginate(3);

    // Kirim data ke view
    return view('admin.data-peminjaman', [
        'loans' => $loans,
        'loan' => $loan
    ]);
}
}
