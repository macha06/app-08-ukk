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
<section class="multiple-choices">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                            <form action="{{ route('buku.index') }}" method="GET">
                                <div class="form-group">
                                    <label for="choices-multiple-remove-button">Kategori</label>
                                    <select class="choices form-select multiple-remove" name="kategori[]" multiple="multiple">
                                        <optgroup label="Pilih Kategori">
                                            @foreach ($kategoris as $item) 
                                                <option value="{{ $item->id }}">{{ $item->nm_kategori }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                    <div class="input-group">
                                        <input type="search" id="form1" name="search" class="form-control" placeholder="Search...." aria-label="Search" />
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
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
<div class="page-content"> 
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header ">
                    <h5 class="card-title">
                        Table Buku
                    </h5>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('buku.create') }}" class="btn btn-primary"> <i class="fas fa-plus"></i> Tambah data</a>
                        <a href="{{ route('export.buku') }}" class="btn btn-success"><i class="fas fa-file-excel"> </i> Unduh Excel</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive datatable-minimal">
                        <table class="table" id="table2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar Cover</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>penulis</th>
                                    <th>Penerbit</th>
                                    <th>Tahun Terbit</th>
                                    <th>Deskripsi</th>
                                    <th>Stok</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($model as $item)     
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ Storage::url('public/buku/').$item->gambar }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $item->judul }}</td>
                                    <td>
                                        <ul>
                                            @foreach($item->kategori as $category)
                                                <li>{{ $category->nm_kategori }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ $item->penulis }}</td>
                                    <td>{{ $item->penerbit }}</td>
                                    <td>{{ $item->tahun_terbit }}</td>
                                    <td>{{ $item->deskripsi }}</td>
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