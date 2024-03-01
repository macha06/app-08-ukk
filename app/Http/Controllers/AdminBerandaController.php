<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;

class AdminBerandaController extends Controller
{
    public function index()
    {
        
        return view('admin.dashboard_index',[
            'routePrefix' => 'buku',
            'title' => 'Data Buku',
            'user' => User::all(),
            'buku' => Buku::all(),
            'peminjaman' => Peminjaman::all(),
            'kategori' => Kategori::all()
        ]);
    }
}
