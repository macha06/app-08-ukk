@extends('layout.app')
@section('konten')    
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Profile{{ $user->name }}</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('peminjam.beranda') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-4">
            <div class="page-content"> 
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-header ">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">
                                        Foto Profile
                                    </h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center flex-column">
                                    <div class="">
                                        <img src="{{ asset('') }}assets/compiled/jpg/2.jpg" alt="Avatar" class="rounded-circle" width="200">
                                    </div>
                                    <h3 class="mt-3">{{ $user->name }}</h3>
                                    <p class="text-small">{{ $user->akses }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="col-8">
            <div class="page-content"> 
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-header ">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">
                                        Profile User
                                    </h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="nik" class="form-label">Nik</label>
                                        <input type="text" class="form-control" id="nik" name="nik" value="{{ $user->nik }}">
                                        @error('nik')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                                        @error('name')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
                                        @error('username')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $user->alamat }}">
                                        @error('alamat')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="telepon" class="form-label">Telepon</label>
                                        <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $user->telepon }}">
                                        @error('telepon')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
                                        @error('email')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="avatar" class="form-label">Foto Profile</label>
                                        <input type="file" class="form-control" id="avatar" name="avatar" value="{{ $user->avatar }}">
                                        @error('avatar')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary me-1 mb-1 float-end">Update</button> 
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script>
    import { Input, initMDB } from "mdb-ui-kit";
    
    initMDB({ Input });
    </script>
@endsection