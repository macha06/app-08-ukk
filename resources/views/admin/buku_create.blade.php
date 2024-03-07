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
                @if (Auth::user()->akses == 'admin')
                    <li class="breadcrumb-item"><a href="{{ route('admin.beranda') }}">Dashboard</a></li>
                @elseif (Auth::user()->akses == 'petugas')
                    <li class="breadcrumb-item"><a href="{{ route('petugas.beranda') }}">Dashboard</a></li>
                @else
                <li class="breadcrumb-item"><a href="{{ route('peminjam.beranda') }}">Dashboard</a></li>
                @endif
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
                    <h4 class="card-title">Tambah Buku</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ route('buku.store') }}" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="row">
                                        @csrf
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical" class="form-label">Judul Buku</label>
                                                <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-book"></i></span>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="judul" placeholder="Judul Buku">
                                                </div>
                                                @if ($errors->has('judul'))
                                                    <small class="text-danger">{{ $errors->first('judul') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="first-name-vertical" class="form-label">Penulis</label>
                                                <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="penulis" placeholder="Penulis">
                                                </div>
                                                @if ($errors->has('penulis'))
                                                    <small class="text-danger">{{ $errors->first('penulis') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="first-name-vertical" class="form-label">Penerbit</label>
                                                <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="penerbit" placeholder="Penerbit">
                                                </div>
                                                @if ($errors->has('penerbit'))
                                                    <small class="text-danger">{{ $errors->first('penerbit') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="email-id-vertical" class="form-label">Tahun terbit</label>
                                                <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                <input type="date" id="email-id-vertical" class="form-control"
                                                    name="tahun_terbit" placeholder="Tahun Terbit">
                                                </div>
                                                @if ($errors->has('tahun_terbit'))
                                                    <small class="text-danger">{{ $errors->first('tahun_terbit') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical" class="form-label">deskripsi</label>
                                                <textarea name="deskripsi" class="form-control" id="default" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="formFile" class="form-label">Cover Buku</label>
                                                <div class="input-group">
                                                    <input class="form-control" name="gambar" type="file" id="formFile" class="@error('image') is-invalid @enderror">
                                                    <span class="input-group-text"><i class="fas fa-image"></i></span>
                                                </div>
                                                @error('image')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                                <label for="formFile" class="form-label"><b>Kategori</b></label> <br>
                                                @foreach ($kategori as $item)
                                                <input class="form-check-input" name="kategori[]" type="checkbox" value="{{ $item->id }}" id="formFile">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{ $item->nm_kategori }}
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Stok</label>
                                                <input type="number" id="first-name-vertical" class="form-control"
                                                    name="stok" placeholder="Stok">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1" onclick="removeElement()">Submit</button>
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