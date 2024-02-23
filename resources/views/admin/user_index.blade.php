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
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">
                            Table User
                        </h5>         
                        <a href="{{ route($routePrefix.'.create') }}" class="btn btn-primary">Tambah Data</a>
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
                                          <a href="{{ route( $routePrefix.'.edit',$item->id ) }}" class="btn btn-sm btn-warning">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger ">DELETE</button>
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