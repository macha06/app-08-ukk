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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ route($route) }}" method="post">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name">Nama Lengkap</label>
                                            <input type="text" id="first-name-vertical" class="form-control"
                                                name="name" placeholder="Nama Lengkap">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email-id-vertical" class="form-control"
                                                name="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="telepon">Phone</label>
                                            <input type="number" id="contact-info-vertical" class="form-control"
                                                name="telepon" placeholder="Nomor Hp">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="password">Password</label><span class="text-warning"> (password minimal terdiri dari 8 karakter)</span>
                                            <input type="password" id="password-vertical" class="form-control"
                                                name="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" id="first-name-vertical" class="form-control"
                                                name="alamat" placeholder="Alamat">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="akses">Role</label>
                                            <select class="form-select" name="akses" aria-label="Default select example">
                                                <option selected>Akses</option>
                                                <option value="admin">Admin</option>
                                                <option value="petugas">Petugas</option>
                                                <option value="peminjam">Peminjam</option>
                                              </select>
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
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
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