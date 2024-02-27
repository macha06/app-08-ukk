@extends('layout.app')
@section('konten')    
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>daftar Buku yang dipinjam</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('peminjam.beranda') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('peminjam.index') }}">User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Buku yang dipinjam</li>
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
                                Profile User
                            </h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive datatable-minimal">
                            <p>Nama : {{ $user->name }}</p>
                            <p>Email : {{ $user->email }}</p>
                            <p>Nomor Telepon : {{ $user->telepon }}</p>
                            <p>Alamat : {{ $user->alamat }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="page-content"> 
        <section class="row">
            <div class="col-6 col-lg-6">
                <div class="card">
                    <div class="card-header ">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">
                                Daftar Buku yg dipinjam
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
                                        <th>Judul Buku</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($borrowedBooks as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ Storage::url('public/buku/').$item->buku->gambar }}" class="rounded" style="width: 100px">
                                            </td>
                                            <td>{{ $item->buku->judul }}</td>
                                            <td>
                                                <span class="badge bg-success" style="font-size: 19px">{{ $item->status }}</span>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4">Pengguna Belum Meminjam Buku/Sudah Dikembalikan</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $borrowedBooks->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-6">
                <div class="card">
                    <div class="card-header ">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">
                                Daftar Buku yg Sudah Dikembalikan
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
                                        <th>Judul Buku</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($book as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ Storage::url('public/buku/').$item->buku->gambar }}" class="rounded" style="width: 100px">
                                            </td>
                                            <td>{{ $item->buku->judul }}</td>
                                            <td>
                                                <span class="badge bg-success" style="font-size: 19px">{{ $item->status }}</span>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4">Pengguna Belum Meminjam Buku/Mengembalikan buku Buku</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $book->links() }}
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