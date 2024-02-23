<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class AdminBerandaController extends Controller
{
    public function index()
    {
        
        return view('admin.dashboard_index',[
            'routePrefix' => 'buku',
            'title' => 'Data Buku',
            'user' => User::all(),
            'buku' => Buku::all()
        ]);
    }
}
