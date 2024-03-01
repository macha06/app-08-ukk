<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Peminjam;
use Illuminate\Http\Request;
use App\Models\User as Model;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Models\Peminjaman;
use RealRashid\SweetAlert\Facades\Alert;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Query untuk mencari pengguna berdasarkan akses
        if($search) {
            $model = Model:: where('akses', 'peminjam')
                ->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('alamat', 'like', "%$search%")
                ->orWhere('telepon', 'like', "%$search%")
                ->paginate(10);
        } else {
            $model = Model::where('akses', 'peminjam')->paginate(10);
        }
        return view('petugas.user_index',[
            'routePrefix' => 'user',
            'title' => 'Data User',
        ])->with('model', $model);
    }

    public function show($id)
    {
        $user = Model::findOrFail($id);

        // Ambil buku yang sedang dipinjam oleh pengguna
        $borrowedBooks = $user->peminjaman()->where('status', 'Dipinjam')->with('buku')->paginate(2);
        $book = $user->peminjaman()->where('status', 'Dikembalikan')->with('buku')->paginate(2);
    
        // Kirim data ke view
        return view('petugas.user_detail', compact('user', 'borrowedBooks', 'book'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */  
    

    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
}
