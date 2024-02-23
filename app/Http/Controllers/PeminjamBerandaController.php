<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class PeminjamBerandaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('peminjam.dashboard_index',[
            'user' => User::all(),
            'buku' => Buku::all()
        ]);
    }
}
