<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Buku as Model;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
class BukuPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = Model::latest()->paginate(10);
        return view('admin.buku_index',[
            'routePrefix' => 'buku',
            'title' => 'Data Buku',
        ])->with('model', $model);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.buku_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul'     => 'required',
            'penulis'   => 'required',
            'penerbit'  => 'required',
            'tahun_terbit' => 'required',
            'deskripsi' => 'required',
            'gambar'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori'  => 'required',  
            'stok'       => 'required',
        ]);
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/buku', $gambar->hashName());

        $model = Model::create([
            'gambar'     => $gambar->hashName(),
            'judul'     => $request->get('judul'),
            'penulis'   => $request->get('penulis'),
            'penerbit'  => $request->get('penerbit'),
            'tahun_terbit' => $request->get('tahun_terbit'),
            'deskripsi' => $request->get('deskripsi'),
            'kategori'  => $request->get('kategori'),
            'stok'       => $request->get('stok'),
        ]);
        Alert::success('Hore!', 'data berhasil disimpan!');
        return redirect()->route('buku.index', $model);
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
    public function edit(Model $buku)
    {

        return view('admin.buku_update', compact('buku'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Model $buku)
    {
        $this->validate($request, [
            'judul'     => 'required',
            'penulis'   => 'required',
            'penerbit'  => 'required',
            'tahun_terbit' => 'required',
            'deskripsi' => 'required',
            'gambar'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori'  => 'required',  
            'stok'       => 'required',
        ]);

        //check if image is uploaded
        if ($request->hasFile('gambar')) {

            //upload new image
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/buku', $gambar->hashName());

            //delete old image
            Storage::delete('public/buku/'.$buku->image);

            //update post with new image
            $buku->update([
                'gambar'     => $gambar->hashName(),
                'judul'     => $request->get('judul'),
                'penulis'   => $request->get('penulis'),
                'penerbit'  => $request->get('penerbit'),
                'tahun_terbit' => $request->get('tahun_terbit'),
                'deskripsi' => $request->get('deskripsi'),
                'kategori'  => $request->get('kategori'),
                'stok'       => $request->get('stok'),
            ]);

        } else {

            //update post without image
            $buku->update([
                'judul'     => $request->get('judul'),
                'penulis'   => $request->get('penulis'),
                'penerbit'  => $request->get('penerbit'),
                'tahun_terbit' => $request->get('tahun_terbit'),
                'deskripsi' => $request->get('deskripsi'),
                'kategori'  => $request->get('kategori'),
                'stok'       => $request->get('stok'),
            ]);
        }
        Alert::success('Hore!', 'data berhasil diupdate');
        //redirect to index
        return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Model $buku)
    {
        //delete image
        Storage::delete('public/buku/'. $buku->gambar);

        //delete buku
        $buku->delete();

        Alert::success('Hore!', 'data berhasil diupdate');
        //redirect to index
        return redirect()->route('buku.index');
    }
}
