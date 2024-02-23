<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetugasBerandaController extends Controller
{
    public function index()
    {
        return view('petugas.dashboard_index');
    }
}
