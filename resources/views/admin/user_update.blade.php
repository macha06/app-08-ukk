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
                        {!! Form::model($models, ['route' => ['user.update', $models->id], 'method' => 'PUT']) !!}
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name">Nama Lengkap</label>
                                            <input type="text" id="first-name-vertical" class="form-control"
                                                name="name" value="{{ $models->name }}">
                                            @error('name')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email-id-vertical" class="form-control"
                                                name="email" value="{{ $models->email }}">
                                            @error('email')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="telepon">Phone</label>
                                            <input type="number" id="contact-info-vertical" class="form-control"
                                                name="telepon" value="{{ $models->telepon }}">
                                            @error('telepon')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" id="first-name-vertical" class="form-control"
                                                name="alamat" value="{{ $models->alamat }}">
                                            @error('alamat')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="Password">Password</label>
                                            <input type="password" id="first-name-vertical" class="form-control"
                                                name="password">
                                            @error('password')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="akses">Role</label>
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
                                            @error('title')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class='form-check'>
                                            <div class="checkbox">
                                                <input type="checkbox" id="checkbox3" class='form-check-input'
                                                    checked>
                                                <label for="checkbox3">Remember Me</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">{{ $button }}</button>
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