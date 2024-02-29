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
                            <li class="breadcrumb-item active" aria-current="page">Daftar Buku yang dipinjam</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div> 
    <div class="page-content"> 
        <section class="row">
            <div class="col-6 col-lg-6">
                <div class="card">
                    <div class="card-header ">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">
                                Menunggu Persetujuan
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
                                        <th>Tanggal Peminjaman</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($aprove as $item)                   
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ Storage::url('public/buku/').$item->buku->gambar }}" class="rounded" style="width: 100px">
                                        </td>
                                        <td>{{ $item->buku->judul }}</td>
                                        <td><span class="badge bg-primary">{{ $item->created_at->format('d-M-Y') }}</span></td>
                                        <td>
                                            @if ($item->status == 'Dipinjam')
                                                <span class="badge bg-warning">{{ $item->status }}</span>
                                            @elseif ($item->status == 'Dikembalikan')
                                                <span class="badge bg-success">{{ $item->status }}</span>
                                            @elseif ($item->status == 'Menunggu Persetujuan')
                                                <span class="badge bg-info">{{ $item->status }}</span>
                                            @endif
                                            
                                        </td>
                                    </tr>
                                    @empty
                                        <td colspan="7" class="text-center">Belum ada Pengajuan Persetujuan</td>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $pinjam->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-6">
                <div class="card">
                    <div class="card-header ">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">
                                Buku yang sedang Dipinjam
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
                                        <th>Tanggal_peminjaman</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pinjam as $item)                   
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ Storage::url('public/buku/').$item->buku->gambar }}" class="rounded" style="width: 100px">
                                        </td>
                                        <td>{{ $item->buku->judul }}</td>
                                        <td><span class="badge bg-primary">{{ $item->created_at->format('d-M-Y') }}</span></td>
                                        <td>
                                            @if ($item->status == 'Dipinjam')
                                                <span class="badge bg-warning">{{ $item->status }}</span>
                                            @elseif ($item->status == 'Dikembalikan')
                                                <span class="badge bg-success">{{ $item->status }}</span>
                                            @elseif ($item->status == 'Menunggu Persetujuan')
                                                <span class="badge bg-info">{{ $item->status }}</span>
                                            @endif
                                            
                                        </td>
                                        <td>
                                            @if ($item->status == 'Dipinjam')
                                            {{-- <form action="{{ route('buku.kembalikan', ['id' => $item->id]) }}" method="post" onsubmit="return confirm('Apakah Anda Sudah Puas Mambaca Buku ini');">
                                                @csrf
                                                <button class="btn btn-danger" type="submit">Kembalikan Buku</button>
                                            </form> --}}
                                            <!-- Contoh tautan pada tampilan peminjaman -->
                                            <a href="{{ route('peminjaman.cetak_struk_pdf', $item->id) }}" target="_blank" class="btn btn-primary">Cetak Struk PDF</a>

                                            @elseif ($item->status == 'Dikembalikan')
                                            <span class="badge bg-success">Buku Sudah Dikembalikan</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                        <td colspan="7" class="text-center">Belum ada Buku yang sedang dipinjam</td>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $pinjam->links() }}
                            </div>
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
                                Daftar Buku yg sudah dikembalikan
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
                                        <th>Tanggal_peminjaman</th>
                                        <th>Tanggal Dikembalikan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kembali as $item)                   
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ Storage::url('public/buku/').$item->buku->gambar }}" class="rounded" style="width: 100px">
                                        </td>
                                        <td>{{ $item->buku->judul }}</td>
                                        <td><span class="badge bg-primary">{{ $item->created_at->format('d-M-Y') }}</span></td>
                                        <td>
                                            @if ($item->returned_at == null)
                                                <span class="badge bg-danger">Belum dikembalikan</span>  
                                            @endif
                                            {{ $item->returned_at }}</td>
                                        <td>
                                            @if ($item->status == 'Dipinjam')
                                                <span class="badge bg-warning">{{ $item->status }}</span>
                                            @elseif ($item->status == 'Dikembalikan')
                                                <span class="badge bg-success">{{ $item->status }}</span>
                                            @elseif ($item->status == 'Menunggu Persetujuan')
                                                <span class="badge bg-info">{{ $item->status }}</span>
                                            @endif
                                            
                                        </td>
                                        <td>
                                            @if (!auth()->user()->hasReviewed($item->buku->id))      
                                            <a href="{{ route('ulasan.create', ['buku_id' => $item->buku->id]) }}" class="btn btn-sm btn-warning">Beri Ulasan</a>
                                            @else
                                            <span class="badge bg-success">Sudah dikomentari</span></span>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                        <td colspan="7" class="text-center">Belum ada Buku yang Dikembalikan</td>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $kembali->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-6">
                <div class="card">
                    <div class="card-header ">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">
                                Peminjaman yang Ditolak
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
                                        <th>Tanggal_peminjaman</th>
                                        <th>Alasan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($tolak as $item)                   
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ Storage::url('public/buku/').$item->buku->gambar }}" class="rounded" style="width: 100px">
                                        </td>
                                        <td>{{ $item->buku->judul }}</td>
                                        <td><span class="badge bg-primary">{{ $item->created_at->format('d-M-Y') }}</span></td>
                                        <td>{{ $item->komentar }}</td>
                                        <td>
                                            @if ($item->status == 'Dipinjam')
                                                <span class="badge bg-warning">{{ $item->status }}</span>
                                            @elseif ($item->status == 'Dikembalikan')
                                                <span class="badge bg-success">{{ $item->status }}</span>
                                            @elseif ($item->status == 'Menunggu Persetujuan')
                                                <span class="badge bg-info">{{ $item->status }}</span>
                                            @elseif ($item->status == 'Ditolak')
                                                <span class="badge bg-danger">{{ $item->status }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                        <td colspan="7" class="text-center">Tidak ada Peminjaman yg ditolak</td>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $tolak->links() }}
                            </div>
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