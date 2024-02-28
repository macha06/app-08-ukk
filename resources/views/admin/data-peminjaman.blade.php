@extends('layout.app')
@section('konten')    
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Peminjaman</h3>
                <a href="{{ route('admin.peminjaman.export') }}" class="btn btn-sm btn-primary mt-5"><i class="bi bi-file-earmark-spreadsheet">Download Excel</i></a>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.beranda') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Peminjaman</li>
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
                            Table Buku Yang Sedang Dipinjam
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
                                    <th>No</th>
                                    <th>Nama Peminjam</th>
                                    <th>Cover Buku</th>
                                    <th>judul Buku yang Dipinjam</th>
                                    <th>tanggal peminjaman</th>
                                    <th>tanggal pengembalian</th>
                                    <th>Status Peminjaman</th>      
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($loans as $item)  
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>
                                        <img src="{{ Storage::url('public/buku/').$item->buku->gambar }}" class="rounded" style="width: 100px">
                                    </td>
                                    <td>{{ $item->buku->judul }}</td>
                                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $item->return_date }}</td>           
                                    <td><span style="font-size: 18px" class="badge bg-success">{{ $item->status }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $loans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="page-content"> 
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header ">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">
                            Table Buku Yang Sudah Dikembalikan
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
                                    <th>No</th>
                                    <th>Nama Peminjam</th>
                                    <th>Cover Buku</th>
                                    <th>judul Buku yang Dipinjam</th>
                                    <th>tanggal peminjaman</th>
                                    <th>tanggal pengembalian</th>
                                    <th>Status Peminjaman</th>      
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($loan as $item)  
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>
                                        <img src="{{ Storage::url('public/buku/').$item->buku->gambar }}" class="rounded" style="width: 100px">
                                    </td>
                                    <td>{{ $item->buku->judul }}</td>
                                    <td>{{ $item->returned_at }}</td>
                                    <td>{{ $item->return_date }}</td>           
                                    <td><span style="font-size: 18px" class="badge bg-success">{{ $item->status }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $loan->links() }}
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