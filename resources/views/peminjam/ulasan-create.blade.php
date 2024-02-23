@extends('layout.app')
@section('konten')    
<div class="page-heading">
<div class="page-title">
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Buat Ulasan</h3>
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="index.html">Daftar Buku</a></li>
                <li class="breadcrumb-item"><a href="index.html">Detail Buku</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Ulasan</li>
            </ol>
        </nav>
    </div>
</div>
</div>
<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Buat Ulasan</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="disabledTextInput" class="form-label">Judul Buku</label>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Cinderlela">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="disabledTextInput" class="form-label">Penulis</label>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Macha">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                            <label for="floatingTextarea2">Ulasan</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Rating</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Berikan Rating</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">3</option>
                                                <option value="5">3</option>
                                              </select>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset"
                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection