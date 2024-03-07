@extends('layout.app')
@section('konten')    
<div class="page-heading">
<div class="page-title">
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Pinjam Buku {{ $model->judul }}</h3>
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('peminjam.beranda') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('bukus.index') }}">daftar buku</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pinjam Buku</li>
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
                    <h4 class="card-title">Form Peminjaman</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <form action="{{ route('buku.pinjam', ['id' => $model->id]) }}" method="post">
                                        @csrf
                                        <div class="col-12">
                                            <label for="return_date" class="form-label">Tanggal Pengembalian:</label>
                                            <input type="date" class="form-control" id="return_date" name="return_date">
                                            @error('return_date')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="" class="form-label">Jumlah Pinjam</label>
                                            <input type="number" class="form-control" id="jumlah" name="jumlah">
                                            @error('jumlah')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <button class="btn btn-primary mt-3" type="submit">Pinjam Buku</button>
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