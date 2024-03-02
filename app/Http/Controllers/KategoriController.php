<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori as Model;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $model = Model::where('nm_kategori', 'like', '%' . $request->cari . '%')->get();
        } else {
            $model = Model::all();
        }
        return view('admin.kategori_index')->with('model', $model);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nm_kategori' => 'required',
        ]);

        $model = new Model();
        $model->nm_kategori = $request->nm_kategori;
        $model->save();
        Alert::success('Hore!', 'data Kategori berhasil disimpan!');
        return redirect()->route('kategori.index', $model);
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
        $model = Model::findOrfail($id);
        return view('admin.kategori_update')->with('model', $model);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nm_kategori' => 'required',
        ]);
        $model = Model::findOrfail($id);
        $model->nm_kategori = $request->nm_kategori;
        $model->save();
        Alert::success('Hore!', 'data Kategori berhasil diupdate!');
        return redirect()->route('kategori.index', $model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Model::findOrfail($id);
        $model->delete();
        Alert::success('Hore!', 'data Kategori berhasil dihapus!');
        return redirect()->route('kategori.index', $model);
    }
}
