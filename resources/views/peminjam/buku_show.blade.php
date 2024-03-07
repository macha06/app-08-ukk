@extends('layout.app')
@section('konten')    
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Buku</h3>
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
                        @if (Auth::user()->akses == 'admin' || Auth::user()->akses == 'petugas')
                        <li class="breadcrumb-item"><a href="{{ route('buku.index') }}">Data Buku</a></li>
                        @else           
                        <li class="breadcrumb-item"><a href="{{ route('bukus.index') }}">Daftar Buku</a></li>
                        @endif
                        <li class="breadcrumb-item active" aria-current="page">Detail Buku</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div> 
<div class="page-content"> 
    <section class="row">
        <div class="col-4 col-lg-4">
            <div class="row">
                    <div class="card">
                        <div class="card-header ">
                            <div class="">
                                <h5 class="card-title text-center">
                                    <b>Detail Buku</b>
                                </h5>
                            </div> 
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <img src="{{ Storage::url('public/buku/').$model->gambar }}" class="rounded" style="width: 100%">
                                    <p class="mt-3">Rating : <span class="badge bg-primary">{{ $model->averageRating() }}</span></p>
                                    <p class="mt-3">Stok : <span class="badge bg-primary">@if ($model->stok == 0)
                                        Tidak Tersedia
                                    @endif{{ $model->stok }}</span></p>
                                    
                                </div>
                                <div class="col-6">
                                    <h5 class="card-title">
                                        Judul
                                    </h5>
                                    <p class="">
                                        {{ $model->penulis }}
                                    </p>
                                    <h5 class="card-title">
                                        Penulis
                                    </h5>
                                    <p class="">
                                        {{ $model->penulis }}
                                    </p>
                                    <h5 class="card-title">
                                        Penerbit
                                    </h5>
                                    <p class="">
                                        {{ $model->penerbit }}
                                    </p>
                                    @foreach($model->kategori as $category)
                                    <span class="badge bg-info mb-1">{{ $category->nm_kategori }}</span>
                                    @endforeach
                                    <div class="mt-3 mb-3"><a href="{{ route('bukus.index') }}" class="btn btn-danger d-block">Kembali</a></div>
                                    @if (Auth::user()->akses == 'admin' || Auth::user()->akses == 'petugas')
                                        <a href="" class="btn btn-success d-block">Peminjam</a>
                                    @elseif (Auth::user()->akses == 'peminjam')
                                        <a href="{{ route('buku.pinjam.create', $model->id) }}" class="btn btn-primary d-block">Pinjam</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                
                            </div>
                            <div class="row">
                                <label for="" class="form-label" style="font-weight:bold;">Sinopsis :</label>
                                <div style="text-align: justify; text-justify: inter-word; font-size: 14px; overflow: scroll; height: 250px">{!! $model->deskripsi !!}</div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-8 col-lg-8">
            <div class="card">
                <div class="card-header ">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">
                            Ulasan
                        </h5>
                    </div>
                    <div class="form-outline" data-mdb-input-init>
                        <input type="search" id="form1" class="form-control mt-3" placeholder="Search...." aria-label="Search" />
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive datatable-minimal">
                        <table class="table" id="table2">
                            <thead>
                                <tr>
                                    <th>Komentar</th>
                                    <th>Rating</th>
                                    <th>pemberi Ulasan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($model->ulasan as $item)
                                    <tr>
                                        <td>{{ $item->komentar }}</td>
                                        <td>{{ $item->rating }}</td>
                                        <td>{{ $item->user->name }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Tidak ada Ulasan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
import { Input, initMDB } from "mdb-ui-kit";

initMDB({ Input });
</script>
@endsection