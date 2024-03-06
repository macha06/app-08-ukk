@extends('layout.app')
@section('konten')    
<div class="page-heading">
<div class="page-title">
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>{{ $title }}</h3>
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.beranda') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Data User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Data User</li>
            </ol>
        </nav>
    </div>
</div>
</div>
<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah User</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ route($route) }}" method="post">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="" class="form-label">Nama Lengkap</label>
                                            <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input type="text" id="first-name-vertical" class="form-control"
                                                name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" data-parsley-required="true" >
                                            </div>
                                            @if ($errors->has('name'))
                                                <small class="text-danger">{{ $errors->first('name') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="" class="form-label">Username</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>          
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="username" placeholder="Username" data-parsley-required="true" value="{{ old('username') }}">
                                            </div>
                                            @if ($errors->has('username'))
                                                <small class="text-danger">{{ $errors->first('username') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="" class="form-label">Email</label><small>* email aktif</small>
                                            <div class="input-group">
                                            <span class="input-group-text">@</span>
                                            <input type="email" id="email-id-vertical" class="form-control"
                                                name="email" placeholder="Email" value="{{ old('email') }}" data-parsley-required="true">
                                            </div>
                                            @if ($errors->has('email'))
                                                <small class="text-danger">{{ $errors->first('email') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="" class="form-label">Nomor Telepon</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                <input type="number" id="contact-info-vertical" class="form-control"
                                                    name="telepon" placeholder="Nomor Telepon" value="{{ old('telepon') }}" data-parsley-required="true">
                                            </div>
                                            @if ($errors->has('telepon'))
                                                <small class="text-danger">{{ $errors->first('telepon') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="" class="form-label">Password</label><small>*min 8</small>
                                            <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            <input type="password" id="password-vertical" class="form-control"
                                                name="password" placeholder="Password min 8" value="{{ old('password') }}" data-parsley-required="true">
                                            </div>
                                            @if ($errors->has('password'))
                                                <small class="text-danger">{{ $errors->first('password') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="" class="form-label">Alamat</label>
                                            <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                                            <input type="text" id="contact-info-vertical" class="form-control"
                                                name="alamat" placeholder="Alamat" data-parsley-required="true" value="{{ old('alamat') }}">
                                            </div>
                                            @if ($errors->has('alamat'))
                                                <small class="text-danger">{{ $errors->first('alamat') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="" class="form-label">Role</label>
                                            <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                            <select class="form-select" name="akses" aria-label="Default select example" id="inputGroupSelect01" data-parsley-required="true" >
                                                <option selected>Akses</option>
                                                <option value="admin">Admin</option>
                                                <option value="petugas">Petugas</option>
                                                <option value="peminjam">Peminjam</option>
                                              </select>
                                            </div>
                                            @if ($errors->has('akses'))
                                                <small class="text-danger">{{ $errors->first('akses') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1"><i class="fa fa-save"></i> Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
</div>
@endsection