@extends('layout.app')
@section('konten')    
<div class="page-heading">
<div class="page-title">
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Peminjaman Ditolak</h3>
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('peminjam.beranda') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('bukus.index') }}">request peminjaman</a></li>
                <li class="breadcrumb-item active" aria-current="page">Peminjaman ditolak</li>
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
                    <h4 class="card-title">Form Penolakan</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('reject.loan', $model->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="">Alasan Penolakan</label>
                                <textarea name="komentar" id="" cols="30" rows="4" class="form-control mb-3"></textarea>
                            </div>
                            <div class="form-group d-flex justify-content-end">
                                <button class="btn btn-danger" type="submit">Tolak</button>
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