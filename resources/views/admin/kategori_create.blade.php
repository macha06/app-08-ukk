@extends('layout.app')
@section('konten')    
<div class="page-heading">
<div class="page-title">
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Create Kategori buku</h3>
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.beranda') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Kategori Buku</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Kategori</li>
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
                    <h4 class="card-title">Tambah Kategori Buku</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <form action="{{ route('kategori.store') }}" method="post">
                                        @csrf
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Nama Kategori</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="nm_kategori" placeholder="Nama Kategori">
                                                @error('nm_kategori')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection