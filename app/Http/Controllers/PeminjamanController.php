<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Peminjam;
use Illuminate\Http\Request;
use App\Models\Buku as Model;
use App\Models\Peminjaman;
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
            return redirect()->back();
        }

        $pinjam = new Peminjaman();
        $pinjam->id_user = auth()->id(); // ID pengguna yang melakukan peminjaman
        $pinjam->id_buku = $id;
        $pinjam->return_date = $request->return_date;
        $pinjam->status = 'Dipinjam';
        $pinjam->save();

        $buku->stok--;
        $buku->save();
        Alert::success('Buku ' . $buku->judul . ' dipinjam');
        return redirect()->back();
    }

    public function kembalikan( Request $request, $id )
    {
        $pinjam = Peminjaman::findOrFail($id);
        $pinjam->status = 'Dikembalikan';
        $pinjam->returned_at = now();
        $pinjam->save();

        $buku = $pinjam->buku;
        $buku->stock++;
        $buku->save();

        Alert::success('Buku ' . $buku->judul . ' dikembalikan');
        return redirect()->route('bukus.index');
    }
}
