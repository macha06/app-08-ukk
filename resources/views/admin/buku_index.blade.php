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
                                    <label for="choices-multiple-remove-button" class="form-label">Kategori</label>
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
                    <div class="d-flex justify-content-start">
                        <a href="{{ route('buku.create') }}" class="btn btn-primary me-2"> <i class="fas fa-plus"></i></a>
                        <a href="{{ route('export.buku') }}" class="btn btn-success"><i class="fas fa-file-excel"> </i></a>
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
                                    <th>Stok</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($model as $item)     
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ Storage::url('public/buku/').$item->gambar }}" class="rounded" style="width: 120px; height: 180px">
                                    </td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->stok }}</td>
                                    <td>                 
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('buku.destroy', $item->id) }}" method="POST">
                                            <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                            <a href="{{ route('buku.show', $item->id) }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-eye"></i></a>
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