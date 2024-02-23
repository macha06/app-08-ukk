@extends('layout.app')
@section('konten')    
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Buku</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.beranda') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Buku</li>
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
                            Table Buku
                        </h5>
                        <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah data</a>
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
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>penulis</th>
                                    <th>Penerbit</th>
                                    <th>Tahun Terbit</th>
                                    <th>Gambar Cover</th>
                                    <th>Deskripsi</th>
                                    <th>Kategori</th>
                                    <th>Stok</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($model as $item)     
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->penulis }}</td>
                                    <td>{{ $item->penerbit }}</td>
                                    <td>{{ $item->tahun_terbit }}</td>
                                    <td>
                                        <img src="{{ Storage::url('public/buku/').$item->gambar }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>
                                        @if ($item->kategori == '0')
                                            <span class="badge bg-primary">fiksi</span>
                                        @elseif ($item->kategori == '1')
                                            <span class="badge bg-success">non fiksi</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->stok }}</td>
                                    <td>                 
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('buku.destroy', $item->id) }}" method="POST">
                                            <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            <a href="" class="btn btn-sm btn-primary">Lihat Ulasan</a>
                                        </form>
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