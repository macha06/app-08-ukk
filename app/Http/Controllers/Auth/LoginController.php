<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use RealRashid\SweetAlert\Toaster;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, $user)
    {
        $user = Auth::user();
        if($user->akses == 'petugas'){
            toast('Selamat Datang '.$user->name.'!','success','top-right');
            return redirect()->route('petugas.beranda');
        } elseif($user->akses == 'admin'){
            toast('Selamat Datang '.$user->name.'!','success','top-right');
            return redirect()->route('admin.beranda');
        } elseif($user->akses == 'peminjam'){
            toast('Selamat Datang '.$user->name.'!','success','top-right');
            return redirect()->route('peminjam.beranda');
        } else{
            Auth::logout();
            flash('anda Tidak memiliki hak akses')->error();
            return redirect()->route('login');
        }
    }
}
