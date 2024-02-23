@extends('layout.app')
@section('konten')    
<div class="page-heading">
    <div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Create Data Buku</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.beranda') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('buku.index') }}">Data Buku</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Data Buku</li>
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
                    <h4 class="card-title">Update Buku</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        {!! Form::model($buku, ['route' => ['buku.update', $buku->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data' ]) !!}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Judul Buku</label>
                                            <input type="text" id="first-name-vertical" class="form-control"
                                                name="judul" value="{{ $buku->judul }}" placeholder="Judul Buku">
                                        </div>
                                        @error('judul')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Penulis</label>
                                            <input type="text" id="first-name-vertical" class="form-control"
                                                name="penulis" value="{{ $buku->penulis }}" placeholder="Penulis">
                                        </div>
                                        @error('penulis')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Penerbit</label>
                                            <input type="text" id="first-name-vertical" class="form-control"
                                                name="penerbit" value="{{ $buku->penerbit }}" placeholder="Penerbit">
                                        </div>
                                        @error('penerbit')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email-id-vertical">Tahun terbit</label>
                                            <input type="date" id="email-id-vertical" class="form-control"
                                                name="tahun_terbit" value="{{ $buku->tahun_terbit }}" placeholder="Tahun Terbit">
                                        </div>
                                        @error('tahun_terbit')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">deskripsi</label>
                                            <input type="text" id="first-name-vertical" class="form-control"
                                                name="deskripsi" value="{{ $buku->deskripsi }}" placeholder="Deskripsi">
                                        </div>
                                        @error('deskripsi')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="formFile" class="form-label">Cover Buku</label>
                                            <input class="gambar" name="gambar" type="file" id="formFile">
                                        </div>
                                        @error('gambar')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Kategori</label>
                                            <select class="form-select" aria-label="Default select example" name="kategori">
                                                <option selected>{{ $buku->kategori }}</option>
                                                    <option value="1">Non Fiksi</option>
                                                    <option value="0">Fiksi</option>
                                              </select>
                                        </div>
                                        @error('kategori')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Stok</label>
                                            <input type="number" id="first-name-vertical" class="form-control"
                                                name="stok" value="{{ $buku->stok }}" placeholder="Stok">
                                        </div>
                                        @error('stok')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
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