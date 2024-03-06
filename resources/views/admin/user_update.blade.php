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
                    <h4 class="card-title">Update User</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        {!! Form::model($models, ['route' => ['user.update', $models->id], 'method' => 'PUT']) !!}
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Nama Lengkap</label>
                                            <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input type="text" id="first-name-vertical" class="form-control"
                                                name="name" value="{{ $models->name }}">
                                            </div>
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="username" class="form-label">Username</label>
                                            <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input type="text" id="first-username-vertical" class="form-control"
                                                name="username" value="{{ $models->username }}">
                                            </div>
                                            @error('username')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email</label>
                                            <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            <input type="email" id="email-id-vertical" class="form-control"
                                                name="email" value="{{ $models->email }}">
                                            </div>
                                            @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="telepon" class="form-label">Phone</label>
                                            <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            <input type="number" id="contact-info-vertical" class="form-control"
                                                name="telepon" value="{{ $models->telepon }}">
                                            </div>
                                            @error('telepon')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                            <input type="text" id="contact-info-vertical" class="form-control" name="alamat" value="{{ $models->alamat }}">
                                            </div>
                                            @error('alamat')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="Password">Password</label><small class="text-danger"> (password akan diubah)</small>
                                            <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            <input type="password" id="first-name-vertical" class="form-control"
                                                name="password">
                                            </div>
                                            @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="akses" class="form-label">Role</label>
                                            <div class="input-group">
                                            <span class="input-group-text"> <i class="fa fa-key"></i></span>
                                            <select class="form-select" name="akses" aria-label="Default select example">
                                                <option selected>{{ $models->akses}}</option>
                                                @if ($models->akses == 'admin')
                                                    <option value="petugas">Petugas</option>
                                                    <option value="peminjam">Peminjam</option>
                                                @elseif ($models->akses == 'petugas')
                                                    <option value="peminjam">Peminjam</option>
                                                    <option value="admin">Admin</option>     
                                                @else
                                                    <option value="admin">Admin</option> 
                                                    <option value="petugas">Petugas</option>
                                                @endif
                                              </select>
                                            </div>
                                            @error('title')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1"><i class="fa fa-save"></i></button>
                                    </div>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
</div>
@endsection