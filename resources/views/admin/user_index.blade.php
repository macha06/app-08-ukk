@extends('layout.app')
@section('konten')    
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ $title }}</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.beranda') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User</li>
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
                    <h5 class="card-title">
                        Table User
                    </h5>         
                    <div class="d-flex justify-content-start">
                        <a href="{{ route($routePrefix.'.create') }}" class="btn btn-primary me-2"><i class="fa-solid fa-user-plus"></i></a>
                        <a href="{{ route('export.users') }}" class="btn btn-success"><i class="fas fa-file-excel"> </i></a>
                    </div>
                    <div class="form-outline" data-mdb-input-init>
                        <form action="{{ route('user.index') }}" method="GET">
                            <div class="mb-3 mt-3 d-flex justify-content-between">
                                <select class="form-select w-25" name="akses" id="">
                                    <option value="">All</option>
                                    <option value="admin">Admin</option>
                                    <option value="petugas">petugas</option>
                                    <option value="peminjam">Peminjam</option>
                                </select>
                                <div class="input-group">
                                    <input type="search" id="form1" name="keyword" class="form-control" placeholder="Search...." aria-label="Search" />
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive datatable-minimal">
                        <table class="table" id="table2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Nomor Telepon</th>
                                    <th>Alamat</th>
                                    <th>Akses</th>
                                    <th>Aksi</th>        
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($model as $item)  
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->telepon }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>
                                        <span class="badge bg-success">{{ $item->akses }}</span>
                                    </td>           
                                    <td>                                    
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?')" class="d-inline" action="{{ route('user.destroy', $item->id) }}" method="POST" >
                                          <a href="{{ route( $routePrefix.'.edit',$item->id ) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger "> <i class="fa-solid fa-trash"></i></button>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            {{ $model->links() }}
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