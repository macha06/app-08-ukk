<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\KoleksiBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KoleksiBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        // Menampilkan daftar buku favorit yang dimiliki oleh pengguna yang sedang login
        $koleksi = KoleksiBuku::where('user_id', $userId)->get();

        return view('peminjam.koleksi_index', compact('koleksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required'
        ]);
    
        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();

        $koleksi = KoleksiBuku::where('user_id', $userId)->where('buku_id', $request->buku_id)->first();

        $buku = Buku::findOrFail($request->buku_id);
        if ($koleksi) {
            Alert::warning('Buku ' . $buku->judul . ' sudah ada di koleksi');
            return back();
        }
    
        // Simpan buku favorit baru ke dalam database dengan ID pengguna yang sedang login
        KoleksiBuku::create([
            'user_id' => $userId,
            'buku_id' => $request->buku_id
        ]);
        Alert::success('Buku ' . $buku->judul . ' di koleksi');
        return redirect()->route('koleksi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $userId = Auth::id();

        // Temukan buku favorit yang akan dihapus berdasarkan ID pengguna dan ID favorit
        $koleksi = KoleksiBuku::where('user_id', $userId)->findOrFail($id);
    
        // Hapus buku favorit dari database
        $koleksi->delete();
    
        // Redirect kembali dengan pesan sukses
        Alert::success('buku ' . $koleksi->buku->judul . ' di hapus dari koleksi');
        return redirect()->route('koleksi.index');
    }
}
