@extends('layout.app')
@section('konten')    
<div class="page-heading">
<div class="page-title">
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Pinjam Buku</h3>
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
                                    <form action="{{ route('ulasan.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="buku_id" value="{{ $buku->id }}">
                                        <div class="form-group">
                                            <label for="review">Ulasan:</label>
                                            <textarea class="form-control" id="review" name="komentar"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="rating">Rating:</label>
                                            <input type="number" class="form-control" id="rating" name="rating" min="1" max="5">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Kirim</button>
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