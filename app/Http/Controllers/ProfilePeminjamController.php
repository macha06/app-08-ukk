<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilePeminjamController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);
        $borrowedBooks = $user->peminjaman()->where('status', 'Dipinjam')->with('buku')->paginate(2);
        $book = $user->peminjaman()->where('status', 'Dikembalikan')->with('buku')->paginate(2);
        return view('peminjam.profile', compact('user', 'borrowedBooks', 'book'));
    }

    public function show($id)
    {
    
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('peminjam.profile_edit', compact('user'));
    }
    
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,'.$id,
            'nik' => 'required|numeric|min:16|unique:users,nik,'.$id,
            'email' => 'required|unique:users,email,'.$id,
            'alamat' => 'required',
            'telepon' => 'required|numeric|min:12',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $model = User::findOrFail($id);

        if ($request->hasFile('avatar')) {
            // Upload new image
            $gambar = $request->file('avatar');
            $gambar->storeAs('public/avatar', $gambar->hashName());
            
            // Delete old image
            Storage::delete('public/avatar/'.$model->avatar);
            
            // Update post with new image
            $requestData['avatar'] = $gambar->hashName();
        }

        $model->fill($requestData);
        $model->save();

        Alert::success('Hore!', 'data berhasil diupdate');
        return redirect()->route('profile-peminjam.index');
    }
}
