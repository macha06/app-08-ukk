<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\Buku as Model;
use App\Http\Middleware\Peminjam;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PeminjamanController extends Controller
{
    
    public function pinjam (Request $request, $id)
    {
        $request->validate([
            'return_date' => 'required|date|after_or_equal:today'
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
        $pinjam->status = 'Dipinjam';
        $pinjam->save();

        $buku->stok--;
        $buku->save();
        Alert::success('Buku ' . $buku->judul . ' dipinjam');
        return redirect()->route('buku.pinjaman');
    }

    public function kembalikan( Request $request, $id )
    {
        $pinjam = Peminjaman::findOrFail($id);
        $pinjam->status = 'Dikembalikan';
        $pinjam->returned_at = now();
        $pinjam->save();

        $buku = $pinjam->buku;
        $buku->stok++;
        $buku->save();

        Alert::success('Buku ' . $buku->judul . ' dikembalikan');
        return redirect()->route('buku.pinjaman');
    }

    public function borrowedBooks()
    {
        $userId = Auth::id();

        // Ambil data buku yang dipinjam oleh pengguna yang sedang login
        $borrowedBooks = User::find($userId)->peminjaman()->with('buku')->orderBy('status', 'DESC')->get();

        return view('peminjam.buku_pinjaman', compact('borrowedBooks'));
    }
    
}
