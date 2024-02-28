<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UlasanController extends Controller
{

    public function create($buku_id)
    {
        $buku = Buku::findOrFail($buku_id);
        return view('peminjam.ulasan_create', compact('buku_id', 'buku'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required',
            'komentar' => 'nullable',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);
        $buku = Buku::findOrFail($request->buku_id);
        Ulasan::create([
            'buku_id' => $request->buku_id,
            'user_id' => auth()->user()->id, // Jika Anda ingin menyimpan ID pengguna yang memberikan ulasan
            'komentar' => $request->komentar,
            'rating' => $request->rating,
        ]);
        

        Alert::success('Ulasan untuk buku' . $buku->judul . ' ditambahkan');
        return redirect()->route('buku.detail', $buku->id);
    }
}
