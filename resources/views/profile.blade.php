@extends('layout.app')
@section('konten')    
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Profile {{ $user->name }}</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('peminjam.beranda') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-4">
            <div class="page-content"> 
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-header ">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">
                                        Foto Profile
                                    </h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center flex-column">
                                    <div class="">
                                        <img src="{{ asset('') }}assets/compiled/jpg/2.jpg" alt="Avatar" class="rounded-circle" width="200">
                                    </div>
                                    <h3 class="mt-3">{{ $user->name }}</h3>
                                    <p class="text-small">{{ $user->akses }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="col-8">
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
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>        
                                            <td>
                                                <strong>
                                                    <i class="fa fa-id-card text-primary"></i>
                                                    NIK                                              
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                @if ($user->nik == null)
                                                    <b>-</b>
                                                @endif
                                                {{ $user->nik }}   
                                            </td>
                                        </tr>
                                        <tr>    
                                            <td>
                                                <strong>
                                                    <i class="fa fa-user text-primary"></i> 
                                                    Name                                                
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{ $user->name }}    
                                            </td>
                                        </tr>
                                        <tr>        
                                            <td>
                                                <strong>
                                                    <i class="fa fa-user text-primary"></i>
                                                    Username                                                
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{ $user->username }}
                                            </td>
                                        </tr>
                                        <tr>        
                                            <td>
                                                <strong>
                                                    <i class="fa fa-key text-primary"></i>
                                                    Akses                                               
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{ $user->akses }}
                                            </td>
                                        </tr>
                                        <tr>        
                                            <td>
                                                <strong>
                                                    <i class="fa fa-envelope text-primary"></i>
                                                    Email                                                
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{ $user->email }} 
                                            </td>
                                        </tr>
                                        <tr>        
                                            <td>
                                                <strong>
                                                    <i class="fa fa-map-marker text-primary"></i>
                                                    Alamat                                               
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                @if ($user->alamat == null)
                                                    <b>-</b>
                                                @endif
                                                {{ $user->alamat }}
                                            </td>
                                        </tr>
                                        <tr>        
                                            <td>
                                                <strong>
                                                    <i class="fa fa-phone text-primary"></i>
                                                    Nomor Telepon                                                
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                @if ($user->no_telp == null)
                                                    <b>-</b>
                                                @endif
                                                {{ $user->telepon }}
                                            </td>
                                        </tr>
                                        <tr>        
                                            <td>
                                                <strong>
                                                    <i class="fa fa-calendar text-primary"></i>
                                                    created                                                
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{ $user->created_at->format('d M Y | H:i') }}
                                            </td>
                                        </tr>
                                        <tr>        
                                            <td>
                                                <strong>
                                                    <i class="fa fa-calendar text-primary"></i>
                                                    Modified                                                
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{ $user->updated_at->format('d M Y | H:i') }}
                                            </td>
                                        </tr>                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    @if ($user->akses == 'admin')

    @elseif ($user->akses == 'petugas')

    @else
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
    @endif
    <script>
    import { Input, initMDB } from "mdb-ui-kit";
    
    initMDB({ Input });
    </script>
@endsection