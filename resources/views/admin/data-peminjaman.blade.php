@extends('layout.app')
@section('konten')    
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Peminjaman</h3>
                <div class="row">
                    <form action="{{ route('admin.peminjaman.export') }}" method="POST" target="_blank">
                    @csrf
                        <div class="col-lg-4 mb-1 mt-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Tahun</span>
                                <input type="text" class="form-control" name="tahun" placeholder="Tahun"
                                    aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-lg-4 mb-1 mt-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Bulan</span>
                                <select class="form-select" name="bulan" id="">
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-1 mt-3">
                            <button class="btn btn-primary" type="submit">Export to Excel</button>
                        </div>
                    </form>
                </div>
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