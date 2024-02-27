<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Struk Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card shadow " style="width: 45rem;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5>Struk Pengambilan Buku</h5>
                                <p>Perpustakaan Digital</p>
                                <h4>M-PUSS</h4>
                            </div>
                            <img src="{{asset('')}}assets/img/logo.png" class="rounded" alt="" style="width: 100px" />
                        </div>
                        <hr>
                        <div class="d-flex justify-content-start">
                            <h6 class="">Nama Peminjam</h6>
                            <h6 class="">: <b style="font-weight: 900">{{$peminjaman->user->name}}</b></h6>
                        </div>
                        <div class="d-flex justify-content-start">
                            <h6 class="">Email Peminjam</h6>
                            <h6 class="">: <b style="font-weight: 900">{{$peminjaman->user->email}}</b></h6>
                        </div>
                        <div class="d-flex justify-content-start">
                            <h6 class="">Alamat Peminjam</h6>
                            <h6 class="">: <b style="font-weight: 900">{{$peminjaman->user->alamat}}</b></h6>
                        </div>
                        <div class="d-flex justify-content-start">
                            <h6 class="">Nomor Telepon</h6>
                            <h6 class="">: <b style="font-weight: 900">{{$peminjaman->user->telepon}}</b></h6>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-center">
                            <h6 class="">Buku Yang Dipinjam</h6>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Cover Buku</th>
                                    <th>Judul Buku</th>
                                    <th>Tanggal dipinjam</th>
                                    <th>Tanggal dikembalikan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="{{ Storage::url('public/buku/').$peminjaman->buku->gambar }}" class="rounded" style="width: 100px">
                                    </td>
                                    <td class="">{{$peminjaman->buku->judul}}</td>
                                    <td>{{$peminjaman->created_at->format('d-M-Y')}}</td>
                                    <td>{{$peminjaman->return_date}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <i>note: buku wajib dikembalikan sesuai tanggal yang anda tentukan</i><br>
                        <b>Berikan Kartu Ini kepada petugas di Perputakaan untuk meminjam buku yang ingin anda pinjam</b><br>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <p>Jam oprasional 08.00 - 16.00</p>
                            <h6 class="">M-PUSS</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>