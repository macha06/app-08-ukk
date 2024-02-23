@extends('layout.app')
@section('konten')    
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>daftar Buku</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Daftar Buku</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div> 
<div class="page-content"> 
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header ">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">
                            Daftar Buku
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
                                    <th>#</th>
                                    <th>Cover</th>
                                    <th>Kategori</th>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($model as $item)                   
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ Storage::url('public/buku/').$item->gambar }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $item->kategori }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->penulis }}</td>
                                    <td>
                                        <a href="{{ route('bukus.show', $item->id) }}" class="btn btn-info">Detail</a>
                                        <a href="{{ route('bukus.edit', $item->id) }}" class="btn btn-primary">Pinjam</a>
                                        <a href="" class="btn btn-success">Tambahkan ke Koleksi</a>
                                    </td>
                                </tr>
                                @endforeach
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