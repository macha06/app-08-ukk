<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
</style> 
<table>
    <thead>
        <th colspan="5" class="text-center" style="text-align: center;">Data Users dengan akses : {{ $akses }}</th>
    </thead>
</table>
<table style="border: 2px solid black;">
    <thead>
        <tr>
            <th class="text-center" width="150px">Name</th>
            <th class="text-center" width="500px">Alamat</th>
            <th class="text-center" width="200px">Nomor Telepon</th>
            <th class="text-center" width="200px">Email</th>
            <!-- Add other header columns as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->alamat }}</td>
                <td style="text-align: left">{{ $user->telepon }}</td>
                <td>{{ $user->email }}</td>
                <!-- Add other data columns as needed -->
            </tr>
        @endforeach
    </tbody>
</table>
<table>
    <thead>
        <tr></tr>
        <tr><th>Jumlah : {{ $users->count() }}</th></tr>
    </thead>
</table>