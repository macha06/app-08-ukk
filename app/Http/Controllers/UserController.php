<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\User as Model;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        
        // Ambil data dari input form
        $akses = $request->input('akses');
        $keyword = $request->input('keyword');

        // Query untuk mencari pengguna berdasarkan akses dan semua bidang
        
        if($akses){
            $model = Model::where('akses', $akses)->paginate(10);
        } elseif ($akses && $keyword) {
            $model = Model::where('akses', $akses)
                ->where('name', 'like', "%$keyword%")
                ->orWhere('email', 'like', "%$keyword%")
                ->orWhere('alamat', 'like', "%$keyword%")
                ->orWhere('telepon', 'like', "%$keyword%")
                ->paginate(10);
        }elseif($keyword){
            $model = Model::where('name', 'like', "%$keyword%")
                ->orWhere('email', 'like', "%$keyword%")
                ->orWhere('alamat', 'like', "%$keyword%")
                ->orWhere('telepon', 'like', "%$keyword%")
                ->paginate(10);
        } else {
            $model = Model::paginate(10);
        }
        return view('admin.user_index',[
            'routePrefix' => 'user',
            'title' => 'Data User',
        ])->with('model', $model);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user_form',[
            'models' => new Model(),
            'method' => 'POST',
            'title' => 'Create Data User',
            'button' => 'Simpan',
            'route' => 'user.store',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'akses' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        $model = Model::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'akses' => $request->akses,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'password' => bcrypt($request->password)
        ]);

        if($model) {
            Alert::success('Hore!', 'data berhasil disimpan!');
            return redirect()
                ->route('user.index');
        }else{
            return redirect()
                ->back()
                ->with('errors', $request->messages()->all()[0])
                ->withInput()
                ->with([
                    'error' => 'Data Gagal Disimpan'
                ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Model::findOrFail($id);

        // Ambil buku yang sedang dipinjam oleh pengguna
        $borrowedBooks = $user->peminjaman()->where('status', 'Dipinjam')->with('buku')->paginate(2);
        $book = $user->peminjaman()->where('status', 'Dikembalikan')->with('buku')->paginate(2);
    
        // Kirim data ke view
        return view('petugas.user_detail', compact('user', 'borrowedBooks', 'book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        return view('admin.user_update',[
            'models' => Model::findOrfail($id),
            'title' => 'Update Data User',
            'button' => 'UPDATE',
        ]);
            
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'akses' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'password' => 'nullable',
        ]);
        $model = Model::findOrFail($id);
        if ($requestData['password'] == ""){
            unset($requestData['password']);
        }else{
            $requestData['password'] = Hash::make($requestData['password']);
        }
        $model->fill($requestData);
        $model->save();
        Alert::success('Hore!', 'data berhasil diupdate');
        return redirect()
            ->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Model::findOrFail($id);
        $model->delete();
        Alert::success('Hore!', 'data berhasil di hapus!');
        return redirect()
            ->route('user.index');
    }
}
