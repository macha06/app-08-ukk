<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;

class AdminBerandaController extends Controller
{
    public function index()
    {

        $popularBooks = Buku::select('buku.*', DB::raw('COUNT(peminjaman.id) as borrow_count'))
        ->leftJoin('peminjaman', 'buku.id', '=', 'peminjaman.buku_id')
        ->groupBy('buku.id', 'buku.judul', 'buku.penulis', 'buku.penerbit', 'buku.stok', 'buku.gambar', 'buku.deskripsi', 'buku.tahun_terbit' ,'buku.created_at', 'buku.updated_at')
        ->orderByDesc('borrow_count')
        ->limit(5) // Ambil 10 buku yang paling sering dipinjam
        ->get();

        $data = DB::table('peminjaman')
                    ->select(DB::raw('MONTH(created_at) as bulan'), DB::raw('COUNT(*) as total_peminjaman'))
                    ->groupBy(DB::raw('MONTH(created_at)'))
                    ->get();

        // Format data untuk Chart.js
        $chartData = [];
        $namaBulan = [
            1 => 'Jan',
            2 => 'Feb',
            3 => 'Mar',
            4 => 'Apr',
            5 => 'Mei',
            6 => 'Jun',
            7 => 'Jul',
            8 => 'Agts',
            9 => 'Sep',
            10 => 'Okt',
            11 => 'Nov',
            12 => 'Des',
        ];

        foreach ($data as $item) {
            $chartData['bulan'][] = $namaBulan[$item->bulan];
            $chartData['total_peminjaman'][] = $item->total_peminjaman;
        }
        return view('admin.dashboard_index',[
            'routePrefix' => 'buku',
            'title' => 'Data Buku',
            'user' => User::all(),
            'buku' => Buku::all(),
            'peminjaman' => Peminjaman::all(),
            'kategori' => Kategori::all(),
            'new' => User::latest()->take(5)->get(),
            'chartData' => $chartData,
            'popularBooks' => $popularBooks,
        ]);
    }
}
