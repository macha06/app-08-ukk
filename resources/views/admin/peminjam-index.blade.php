@extends('layout.app')
@section('konten')    
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Peminjam</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Peminjam</li>
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
                            Table Peminjam
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
                                    <th>Nama Peminjam</th>
                                    <th>Alamat Peminjam</th>
                                    <th>Buku yang Dipinjam</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal dikembalikan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Fathur</td>
                                    <td>Tangerang</td>
                                    <td>Cinderlela</td>
                                    <td>3 Mei 2003</td>
                                    <td>10 Mei 2003</td>
                                    <td>
                                        <span class="badge bg-success">Meminjam</span>
                                    </td>
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