<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class PeminjamanExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        $jumlahBukuDipinjam = Peminjaman::where('status', 'Dipinjam')->count();

        // Menghitung jumlah buku yang sudah dikembalikan
        $jumlahBukuDikembalikan = Peminjaman::where('status', 'Dikembalikan')->count();

        $jumlahBukuDitolak = Peminjaman::where('status', 'Ditolak')->count();

        $loans = Peminjaman::orderBy('created_at', 'desc')->get();
        return view('peminjaman_excel', [
            'loans' => $loans,
            'jumlahBukuDipinjam' => $jumlahBukuDipinjam,
            'jumlahBukuDikembalikan' => $jumlahBukuDikembalikan,
            'jumlahBukuDitolak' => $jumlahBukuDitolak
        ]);
    }
    public function startCell(): string
    {
        return 'B2';
    }
}
