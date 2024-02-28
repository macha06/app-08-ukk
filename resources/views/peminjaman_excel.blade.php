<table>
    <tr>
        <td colspan="6" style="text-align: center;">
            <h1  style="text-align: center; font-weight: bold">Data Peminjaman Buku Perpustakaan</h1>
        </td>
    </tr>
    <tr>
        <td colspan="6" style="text-align: center;">
            <h1  style="text-align: center; font-weight: bold">Perpustakaan M-PUSS</h1>
        </td>
    </tr>
    <tr>
        <td colspan="6" style="text-align: center;">
            <h1  style="text-align: center; font-weight: bold">
                @if ($bulan == 1)
                    Januari
                @elseif ($bulan == 2)
                    Februari
                @elseif ($bulan == 3)
                    Maret
                @elseif ($bulan == 4)
                    April
                @elseif ($bulan == 5)
                    Mei
                @elseif ($bulan == 6)
                    Juni
                @elseif ($bulan == 7)
                    Juli
                @elseif ($bulan == 8)
                    Agustus
                @elseif ($bulan == 9)
                    September
                @elseif ($bulan == 10)
                    Oktober
                @elseif ($bulan == 11)
                    November
                    
                @endif {{ $tahun }}</h1>
        </td>
    </tr>
</table>

<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 30px;
                border: 2px solid black;
                font-weight: bold">No</th>
            <th style="width: 170px;
                border: 2px solid black;
                font-weight: bold">Nama Peminjam</th>
            <th style="width: 330px;
                border: 2px solid black;
                font-weight: bold">Judul Buku</th>
            <th style="width: 190px;
                border: 2px solid black;
                font-weight: bold">Alamat Peminjam</th>
            <th style="width: 230px;
                border: 2px solid black;
                font-weight: bold">Tanggal Pinjam</th>
            <th style="width: 230px;
                border: 2px solid black;
                font-weight: bold">Tanggal Pengembalian</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($loans as $item)
        <tr>
            <td style="background-color: #5a96d3;
                       color: white;
                       text-align: center">
                {{ $loop->iteration }}
            </td>
            <td>{{ $item->user->name }}</td>
            <td>{{ $item->buku->judul }}</td>
            <td>{{ $item->user->alamat }}</td>
            <td>{{ $item->created_at}}</td>
            <td>{{ $item->return_date }}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th style="background-color: #5a96d3;
            text-align: center;
            color: white" colspan="5">Total Peminjaman</th>
            <th style="background-color: #5a96d3;
            text-align: center;
            color: white">{{ $loans->count() }}</th>
        </tr>
    </tfoot>
</table>
<table style="border: 2px solid black;">
    <tr></tr>
    <tr>
        <td></td>
        <td>Jumlah Buku yang dipinjam : {{ $jumlahBukuDipinjam }}</td>
    </tr>
    <tr>
        <td></td>
        <td>Jumlah Buku yang dikembalikan : {{ $jumlahBukuDikembalikan }}</td>
    </tr>
    <tr>
        <td></td>
        <td>Jumlah Buku yang ditolak untuk dipinjam : {{ $jumlahBukuDitolak }}</td>
    </tr>
</table>