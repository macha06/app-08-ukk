<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\User; 
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\Buku as Model;
use App\Http\Middleware\Peminjam;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PeminjamanController extends Controller
{
    
    public function pinjam (Request $request, $id)
    {
        $request->validate([
            'return_date' => 'required|date|after_or_equal:today',
            'jumlah' => 'required|numeric|min:1'
        ]);

        $buku = Model::findOrFail($id);
        if ($buku->stok < 1) {
            Alert::class('Stok buku ' . $buku->judul . ' habis');
            return redirect()->route('buku.pinjaman');
        }

        $pinjam = new Peminjaman();
        $pinjam->user_id = auth()->id(); // ID pengguna yang melakukan peminjaman
        $pinjam->buku_id = $id;
        $pinjam->return_date = $request->return_date;
        $pinjam->status = 'Menunggu Persetujuan';
        $pinjam->jumlah = $request->jumlah;
        $pinjam->save();

        $buku->stok -= $request->jumlah;
        $buku->save();
        Alert::success('Buku ' . $buku->judul . ' dipinjam');
        return redirect()->route('buku.pinjaman');
    }

    //fungsi kembalikan di Operator
    public function kembalikan( Request $request, $id )
    {
        $pinjam = Peminjaman::findOrFail($id);
        $pinjam->status = 'Dikembalikan';
        $pinjam->returned_at = now();
        $pinjam->save();

        $buku = $pinjam->buku;
        $buku->stok += $pinjam->jumlah;
        $buku->save();

        Alert::success('Buku ' . $buku->judul . ' dikembalikan');
        return redirect()->route('kembalikan.index');
    }

    public function borrowedBooks()
    {
        $userId = Auth::id();

        // Ambil data buku yang dipinjam oleh pengguna yang sedang login
        $aprove = User::find($userId)->peminjaman()->with('buku')->where('status', 'Menunggu Persetujuan')->paginate(2);
        $pinjam = User::find($userId)->peminjaman()->with('buku')->where('status', 'Dipinjam')->paginate(2);
        $kembali = User::find($userId)->peminjaman()->with('buku')->where('status', 'Dikembalikan')->paginate(2);
        $tolak = User::find($userId)->peminjaman()->with('buku')->where('status', 'Ditolak')->paginate(2);


        return view('peminjam.buku_pinjaman', with([
            'aprove' => $aprove,
            'pinjam' => $pinjam,
            'kembali' => $kembali,
            'tolak' => $tolak,
            'buku' => Model::all()
        ]));
    }

    public function cetakStruk($id)
    {
        // Ambil data peminjaman berdasarkan ID
        $peminjaman = Peminjaman::findOrFail($id);

        return view('peminjam.struk_peminjaman', with([
            'peminjaman' => $peminjaman
        ]));
    }

    public function index(){
        $peminjaman = Peminjaman::with('user', 'buku')->paginate(10);
        return view('petugas.peminjaman', [
            'peminjaman' => $peminjaman
        ]);
    }
    
}
