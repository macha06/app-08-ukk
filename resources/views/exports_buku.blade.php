<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
</style> 
<table>
<thead>
        <th colspan="8" class="text-center" style="text-align: center;">Data Buku Perpustakaan M-Puss</th>
    </thead>
</table>
<table style="border: 2px solid black;">
    <thead>
        <tr style="border: 2px solid black">
            <th width="150px">No</th>
            <th width="200px">judul</th>
            <th width="200px">Penulis</th>
            <th width="200px">Penerbit</th>
            <th width="200px">Tahun Terbit</th>
            <th width="200px">Stok</th>
            <th width="200px">Deskripsi</th>
            <th width="200px">kategori</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($buku as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->penulis }}</td>
                <td>{{ $item->penerbit }}</td>
                <td>{{ $item->tahun_terbit }}</td>
                <td>{{ $item->stok }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>
                    <ul>
                        @foreach($item->kategori as $category)
                            <li>{{ $category->nm_kategori }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<table>
    <thead>
        <tr></tr>
        <tr><th>Jumlah : {{ $buku->count() }}</th></tr>
    </thead>
</table>