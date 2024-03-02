<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
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

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('profile_edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'akses' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);
        
        $model = User::findOrFail($id);
        $model->fill($requestData);
        $model->save();
        Alert::success('Hore!', 'data berhasil diupdate');
        return redirect()
            ->route('user.index');
    }
}
