<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class PeminjamanExport implements FromView
{

    protected $tahun;
    protected $bulan;

    public function __construct(int $tahun, int $bulan)
    {
        $this->tahun = $tahun;
        $this->bulan = $bulan;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {

        // Menghitung jumlah buku yang sedang dipinjam
        $jumlahBukuDipinjam = Peminjaman::where('status', 'Dipinjam')
        ->whereMonth('created_at', $this->bulan)
        ->whereYear('created_at', $this->tahun)
        ->count();

        // Menghitung jumlah buku yang sudah dikembalikan
        $jumlahBukuDikembalikan = Peminjaman::where('status', 'Dikembalikan')
        ->whereMonth('created_at', $this->bulan)
        ->whereYear('created_at', $this->tahun)
        ->count();

        $jumlahBukuDitolak = Peminjaman::where('status', 'Ditolak')
        ->whereMonth('created_at', $this->bulan)
        ->whereYear('created_at', $this->tahun)
        ->count();

        $loans = Peminjaman::orderBy('created_at', 'desc')
        ->whereYear('created_at', $this->tahun)
        ->whereMonth('created_at', $this->bulan)
        ->get();
        return view('peminjaman_excel', [
            'loans' => $loans,
            'jumlahBukuDipinjam' => $jumlahBukuDipinjam,
            'jumlahBukuDikembalikan' => $jumlahBukuDikembalikan,
            'jumlahBukuDitolak' => $jumlahBukuDitolak,
            'tahun' => $this->tahun,
            'bulan' => $this->bulan
        ]);
    }
    public function startCell(): string
    {
        return 'B2';
    }
}
