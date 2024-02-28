<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Exports\PeminjamanExport;
use Maatwebsite\Excel\Facades\Excel;

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
    public function export()
    {
        return Excel::download(new PeminjamanExport, 'peminjaman.xlsx');
    }

    public function indexPeminjam() {
        $loans = Peminjaman::with('user', 'buku')->get();
        return view('peminjaman_excel', [
            'loans' => $loans
        ]);
    }
}
