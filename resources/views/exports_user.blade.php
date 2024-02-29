<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <!-- Add other header columns as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <!-- Add other data columns as needed -->
            </tr>
        @endforeach
    </tbody>
</table>