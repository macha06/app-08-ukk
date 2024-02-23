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
    public function index()
    {
        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        
        $model = Model::latest()->paginate(10);
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
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'akses' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        $model = Model::create([
            'name' => $request->name,
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
        //
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
