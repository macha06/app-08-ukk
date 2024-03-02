<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);
        $borrowedBooks = $user->peminjaman()->where('status', 'Dipinjam')->with('buku')->paginate(2);
        $book = $user->peminjaman()->where('status', 'Dikembalikan')->with('buku')->paginate(2);
        return view('profile', compact('user', 'borrowedBooks', 'book'));
    }

    public function show($id)
    {
    
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('profile_edit', compact('user'));
    }
    public function update(Request $request, User $user, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users,username,'.$id,
            'nik' => 'required|numeric|min:16|unique:users,nik,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
            'telepon' => 'required',
            'alamat' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);

        //check if image is uploaded
        if ($request->hasFile('avatar')) {

            //upload new image
            $gambar = $request->file('avatar');
            $gambar->storeAs('public/avatar', $gambar->hashName());

            //delete old image
            Storage::delete('public/avatar/'.$user->avatar);

            //update post with new image
            $user->update([
                'name' => $request->get('name'),
                'username' => $request->get('username'),
                'nik' => $request->get('nik'),
                'email' => $request->get('email'),
                'telepon' => $request->get('telepon'),
                'alamat' => $request->get('alamat'),
                'avatar' => $gambar->hashName(),
            ]);

        } else {

            //update post without image
            $user->update([
                'name' => $request->get('name'),
                'username' => $request->get('username'),
                'nik' => $request->get('nik'),
                'email' => $request->get('email'),
                'telepon' => $request->get('telepon'),
                'alamat' => $request->get('alamat'),
            ]);
        }
        Alert::success('Hore!', 'data berhasil diupdate');
        //redirect to index
        return redirect()->route('profile.index');
    }
}
