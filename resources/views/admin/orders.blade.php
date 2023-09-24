@extends('layouts.adminLayout')

@section('title', 'Daftar Pesanan')

@section('content')
<section >
    <h2 class="my-6 text-xl font-semibold">
        Daftar User
    </h2>
    <table id="ordersTable" class="w-full">
        <thead>
            <tr>
                <th>Invoice</th>
                <th>Nama Pembeli</th>
                <th>No. HP</th>
                <th>Alamat</th>
                <th>Kurir</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Ongkos Kirim</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($data as $index => $user) --}}
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
</section>
@endsection

@section('js-script')
<script type="module">
    $(document).ready( function () {
        new DataTable('#ordersTable', {
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