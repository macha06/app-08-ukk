<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AprovePeminjamanController extends Controller
{
    
    public function index()
    {
        $model = Peminjaman::where('status', 'Menunggu Persetujuan')
            ->with('user', 'buku')->paginate(10);
        return view('petugas.peminjaman_index',)->with('model', $model);
    }
    public function indexKembali()
    {
        $model = Peminjaman::where('status', 'Dipinjam')
            ->with('user', 'buku')->paginate(10);
        return view('petugas.peminjaman_Kembali',)->with('model', $model);
    }
    public function approveLoan($id)
    {
        $loan = Peminjaman::findOrFail($id);
        $loan->status = 'Dipinjam';
        $loan->save();

        Alert::success('Status peminjaman '.' disetujui');
        return redirect()->back();
    }
    public function rejectLoan($id)
    {
        $loan = Peminjaman::findOrFail($id);
        $loan->status = 'Ditolak';
        $loan->save();
        
        Alert::success('Status peminjaman '.' ditolak');
        return redirect()->back();
    }
    
}
