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
                        <li class="breadcrumb-item"><a href="{{ route('peminjam.beranda') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('buku.index') }}">Daftar Buku</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Buku</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div> 
<div class="page-content"> 
    <section class="row">
        <div class="col-4 col-lg-4">
            <div class="row">
                    <div class="card">
                        <div class="card-header ">
                            <div class="">
                                <h5 class="card-title text-center">
                                    <b>Detail Buku</b>
                                </h5>
                            </div> 
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <img src="{{ Storage::url('public/buku/').$model->gambar }}" class="rounded" style="width: 100%">
                                </div>
                                <div class="col-6">
                                    <h5 class="card-title">
                                        Judul
                                    </h5>
                                    <p class="">
                                        {{ $model->penulis }}
                                    </p>
                                    <h5 class="card-title">
                                        Penulis
                                    </h5>
                                    <p class="">
                                        {{ $model->penulis }}
                                    </p>
                                    <h5 class="card-title">
                                        Penerbit
                                    </h5>
                                    <p class="">
                                        {{ $model->penerbit }}
                                    </p>
                                    @foreach($model->kategori as $category)
                                    <span class="badge bg-info mb-1">{{ $category->nm_kategori }}</span>
                                    @endforeach
                                    <div class="mt-3 mb-3"><a href="{{ route('bukus.index') }}" class="btn btn-danger d-block">Kembali</a></div>
                                    <a href="{{ route('buku.pinjam.create', $model->id) }}" class="btn btn-primary d-block">Pinjam</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                
                            </div>
                            <div class="row">
                                <label for="" style="font-weight:bold;">Sinopsis :</label>
                                <p class="card-text" style="scrollbar-width: thin">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam ut laudantium, cupiditate asperiores nemo repellendus repudiandae qui earum similique voluptate vero, facilis facere voluptates veritatis repellat rerum, dolorum nisi illo quia unde ad recusandae ducimus! Iure numquam dignissimos distinctio tempore velit assumenda deserunt ex, deleniti praesentium perspiciatis. Consequuntur praesentium tempore officiis laudantium ipsa quidem dicta molestiae assumenda quas ab? Dolorum, consequuntur maiores sapiente pariatur similique at vel quasi rerum debitis voluptatum mollitia quidem accusamus excepturi atque distinctio facere quaerat? Quisquam aliquid ipsum sunt molestiae officiis, accusamus dignissimos deserunt consectetur nemo, a consequatur impedit ad incidunt beatae voluptates minus delectus ab.</p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-8 col-lg-8">
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