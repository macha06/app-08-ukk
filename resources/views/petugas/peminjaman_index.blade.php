@extends('layout.app')
@section('konten')    
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Peminjaman yang perlu disetujui</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.beranda') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Peminjaman</li>
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
                            Peminjaman
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
                                    <th>Nama Lengkap</th>
                                    <th>Judul Buku</th>
                                    <th>Alamat Peminjam</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Aksi</th>        
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($model as $item)
                                <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->buku->judul }}</td>
                                        <td>{{ $item->user->alamat }}</td>
                                        <td>{{ $item->create_at}}</td>
                                        <td>{{ $item->return_date }}</td>
                                        <td>
                                            <form action="{{ route('approve.loan', $item->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-sm btn-success" type="submit">Setujui</button>
                                                <a href="{{ route('approve.tolak', $item->id) }}" class="btn btn-sm btn-danger">Tolak</a>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                        <td colspan="7" class="text-center">Belum ada request Peminjaman</td>
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