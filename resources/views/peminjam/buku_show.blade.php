@extends('layout.app')
@section('konten')    
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Buku</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Daftar Buku</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div> 
<div class="page-content"> 
    <section class="row">
        <div class="col-2 col-lg-2">
            <div class="card">
                <div class="card-header ">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title mb-3 text-center">
                            Detail Buku
                        </h5>
                    </div> 
                </div>
                <div class="card-body">
                    <img src="{{ Storage::url('public/buku/').$model->gambar }}" class="rounded mb-3" style="width: 190px">
                    <label for="" style="font-weight:bold;" class="mb-3">Penulis :</label>
                    <span class="badge bg-primary">{{ $model->penulis }}</span><hr><br>
                    <label for="" style="font-weight:bold;" class="mb-3">Penerbit :</label>
                    <span class="badge bg-success">{{ $model->penerbit }}</span><hr><br>
                    <label for="" style="font-weight:bold;" class="mb-3">Tahun Terbit :</label>
                    <span class="badge bg-danger">{{ $model->tahun_terbit }}</span><hr><br>
                    <div class="d-grid gap-2">
                        <a href="{{ route('bukus.index') }}" class="btn btn-danger">Kembali</a>
                        <a href="{{ url('peminjam/buku/ulasan') }}" class="btn btn-info">Berikan Ulasan</a>
                      </div>
                </div>
            </div>
        </div>
        <div class="col-10 col-lg-10">
            <div class="card">
                <div class="card-header ">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">
                            Ulasan
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
                                    <th>Ulasan</th>
                                    <th>Rating</th>
                                    <th>pemberi Ulasan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Sedih banget</td>
                                    <td>5</td>
                                    <td>Macha</td>
                                </tr>
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