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
    public function export(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer|min:2000|max:2099',
            'bulan' => 'required|integer|min:1|max:12',
        ]);

        // Ambil data tahun dan bulan dari form
        $tahun = $request->tahun;
        $bulan = $request->bulan;

        // Export data ke file Excel
        return Excel::download(new PeminjamanExport($tahun, $bulan), 'peminjaman_' . $tahun . '_' . $bulan . '.xlsx');
    }

    public function indexPeminjam() {
        $loans = Peminjaman::with('user', 'buku')->get();
        return view('peminjaman_excel', [
            'loans' => $loans
        ]);
    }
}
