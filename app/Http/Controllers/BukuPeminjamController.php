<?php

namespace App\Http\Controllers;

use App\Models\Buku as Model;

use Illuminate\Http\Request;

class BukuPeminjamController extends Controller
{
    public function index()
    {
        $model = Model::latest()->paginate(10);
        return view('peminjam.buku_index',[
            'routePrefix' => 'buku',
            'title' => 'Data Buku',
        ])->with('model', $model);
    }

    public function show($id)
    {
        $model = Model::findOrFail($id);
        return view('peminjam.buku_show',[
            'routePrefix' => 'buku',
            'title' => 'Data Buku',
        ])->with('model', $model);
    }
}
