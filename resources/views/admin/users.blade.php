@extends('layouts.adminLayout')

@section('title', 'Daftar User')

@section('content')
<section>
    <h2 class="my-6 text-xl font-semibold">
        Daftar User
    </h2>
    <table id="usersTable" class="w-full">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Jenis kelamin</th>
                <th>Alamat</th>
                <th>No. HP</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $user)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ Date('d/m/Y', strtotime($user->bod)) }}</td>
                    <td>@if ($user->gender === 'male') {{ "Laki - Laki" }} @else {{ "Perempuan" }} @endif</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection

@section('js-script')
<script type="module">
    $(document).ready( function () {
        new DataTable('#usersTable', {
            columnDefs: [
                { orderable: true, targets: 0 },
                { orderable: true, targets: 1 },
                { orderable: false, targets: 2 },
                { orderable: false, targets: 3 },
                { orderable: false, targets: 4 },
                { orderable: false, targets: 5 },
                { orderable: false, targets: 6 },
            ],
            responsive: true,
            info: false,
        });
    });
</script>
    
@endsection