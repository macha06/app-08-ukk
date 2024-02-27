<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\Buku as Model;

class BukuLandingControlller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = Model::latest()->paginate(10);
        return view('landing-page',[
            'routePrefix' => 'buku',
            'title' => 'Data Buku',
            'user' => User::all(),
            'kategori' => Kategori::all(),
            'peminjaman' => Peminjaman::all(),
            'buku' => $model
        ])->with('model', $model);
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
        //
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
        //
    }
}
