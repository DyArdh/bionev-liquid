@extends('layouts.adminLayout')

@section('title', 'Daftar Pesanan')

@section('content')
<section >
    <h2 class="my-6 text-xl font-semibold">
        Daftar Pesanan Masuk
    </h2>
    <div class="container">
        <table id="ordersTable" class="w-full">
            <thead>
                <tr>
                    <th class="max-w-[120px]">Invoice</th>
                    <th class="max-w-[100px]">Nama Pembeli</th>
                    <th class="max-w-[150px]">Alamat</th>
                    <th>No. HP</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                @foreach ($dataUnpaid as $data)
                    <tr>
                        <td>{{ $data->invoice }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->address }}</td>
                        <td>{{ $data->no_hp }}</td>
                        <td>{{ $data->qty }}</td>
                        <td>Rp {{ number_format($data->total, 0, ',', '.') }}</td>
                        <td>@if ($data->status === 'unpaid') {{ "Belum Dibayar" }} @else {{ "Sudah Dibayar" }} @endif</td>
                        <td>
                            <button id="viewMore" data-invoice="{{ $data->invoice }}" class="bg-green-500 w-fit py-2 px-2 font-public font-medium text-sm rounded-md">
                                <svg class="w-4" viewBox="0 0 256 256"><path fill="currentColor" d="M247.31 124.76c-.35-.79-8.82-19.58-27.65-38.41C194.57 61.26 162.88 48 128 48S61.43 61.26 36.34 86.35C17.51 105.18 9 124 8.69 124.76a8 8 0 0 0 0 6.5c.35.79 8.82 19.57 27.65 38.4C61.43 194.74 93.12 208 128 208s66.57-13.26 91.66-38.34c18.83-18.83 27.3-37.61 27.65-38.4a8 8 0 0 0 0-6.5ZM128 192c-30.78 0-57.67-11.19-79.93-33.25A133.47 133.47 0 0 1 25 128a133.33 133.33 0 0 1 23.07-30.75C70.33 75.19 97.22 64 128 64s57.67 11.19 79.93 33.25A133.46 133.46 0 0 1 231.05 128c-7.21 13.46-38.62 64-103.05 64Zm0-112a48 48 0 1 0 48 48a48.05 48.05 0 0 0-48-48Zm0 80a32 32 0 1 1 32-32a32 32 0 0 1-32 32Z"/></svg>
                            </button>
                            <button id="updateStatus" data-invoice="{{ $data->invoice }}" data-status="{{ $data->status }}" class="bg-yellow-400 w-fit py-2 px-2 ms-1 font-public font-medium text-sm rounded-md">
                                <svg class="w-4" viewBox="0 0 24 24"><path fill="currentColor" d="M17.263 2.177a1.75 1.75 0 0 1 2.474 0l2.586 2.586a1.75 1.75 0 0 1 0 2.474L19.53 10.03l-.012.013L8.69 20.378a1.753 1.753 0 0 1-.699.409l-5.523 1.68a.748.748 0 0 1-.747-.188a.748.748 0 0 1-.188-.747l1.673-5.5a1.75 1.75 0 0 1 .466-.756L14.476 4.963ZM4.708 16.361a.26.26 0 0 0-.067.108l-1.264 4.154l4.177-1.271a.253.253 0 0 0 .1-.059l10.273-9.806l-2.94-2.939l-10.279 9.813ZM19 8.44l2.263-2.262a.25.25 0 0 0 0-.354l-2.586-2.586a.25.25 0 0 0-.354 0L16.061 5.5Z"/></svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<section >
    <h2 class="my-6 text-xl font-semibold">
        Daftar Pesanan Selesai
    </h2>
    <div class="container">
        <table id="ordersTablePaid" class="w-full">
            <thead>
                <tr>
                    <th class="max-w-[120px]">Invoice</th>
                    <th class="max-w-[100px]">Nama Pembeli</th>
                    <th class="max-w-[150px]">Alamat</th>
                    <th>No. HP</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                @foreach ($dataPaid as $data)
                    <tr>
                        <td>{{ $data->invoice }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->address }}</td>
                        <td>{{ $data->no_hp }}</td>
                        <td>{{ $data->qty }}</td>
                        <td>Rp {{ number_format($data->total, 0, ',', '.') }}</td>
                        <td>@if ($data->status === 'unpaid') {{ "Belum Dibayar" }} @else {{ "Sudah Dibayar" }} @endif</td>
                        <td>
                            <button id="viewMore" data-invoice="{{ $data->invoice }}" class="flex items-center gap-2 bg-green-500 w-fit py-2 px-4 font-public font-medium text-sm rounded-md">
                                <svg class="w-4" viewBox="0 0 256 256"><path fill="currentColor" d="M247.31 124.76c-.35-.79-8.82-19.58-27.65-38.41C194.57 61.26 162.88 48 128 48S61.43 61.26 36.34 86.35C17.51 105.18 9 124 8.69 124.76a8 8 0 0 0 0 6.5c.35.79 8.82 19.57 27.65 38.4C61.43 194.74 93.12 208 128 208s66.57-13.26 91.66-38.34c18.83-18.83 27.3-37.61 27.65-38.4a8 8 0 0 0 0-6.5ZM128 192c-30.78 0-57.67-11.19-79.93-33.25A133.47 133.47 0 0 1 25 128a133.33 133.33 0 0 1 23.07-30.75C70.33 75.19 97.22 64 128 64s57.67 11.19 79.93 33.25A133.46 133.46 0 0 1 231.05 128c-7.21 13.46-38.62 64-103.05 64Zm0-112a48 48 0 1 0 48 48a48.05 48.05 0 0 0-48-48Zm0 80a32 32 0 1 1 32-32a32 32 0 0 1-32 32Z"/></svg>
                                <p class="font-public font-medium">Lihat</p>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection

@section('modal')
<!-- Modal container -->
<div id="modalView" class="fixed inset-0 items-center justify-center bg-[#00000073] z-30 hidden">
    <!-- Modal content -->
    <div class="bg-white rounded-lg p-8 shadow-lg transform transition-opacity scale-95">
        <div class="flex justify-between items-baseline border-b mb-4 pb-3">
            <h2 class="text-xl text-center font-semibold" id="modalTitle"></h2>
            <button id="closeModalView">
                <svg class="w-3" viewBox="0 0 384 512"><path d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/></svg>
            </button>
        </div>
        <div class="w-full">
            <h2 class="font-public font-semibold text-lg mb-2">Data Indentitas</h2>
            <table>
                <tbody>
                    <tr>
                        <td class="w-36">Invoice</td>
                        <td class="w-3">:</td>
                        <td class="max-w-lg" id="invoice"></td>
                    </tr>
                    <tr>
                        <td class="w-36">Nama Pembeli</td>
                        <td class="w-3">:</td>
                        <td class="max-w-lg" id="name"></td>
                    </tr>
                    <tr>
                        <td class="w-36">Alamat</td>
                        <td class="w-3">:</td>
                        <td class="max-w-lg" id="address"></td>
                    </tr>
                    <tr>
                        <td class="w-36">No. HP</td>
                        <td class="w-3">:</td>
                        <td class="max-w-lg" id="no_hp"></td>
                    </tr>
                </tbody>
            </table>
            <h2 class="font-public font-semibold text-lg mt-3 mb-2">Data Pesanan</h2>
            <table>
                <tbody>
                    <tr>
                        <td class="w-36">Ekspedisi</td>
                        <td class="w-3">:</td>
                        <td class="max-w-lg" id="courier"></td>
                    </tr>
                    <tr>
                        <td class="w-36">Nama Produk</td>
                        <td class="w-3">:</td>
                        <td class="max-w-lg" id="product"></td>
                    </tr>
                    <tr>
                        <td class="w-36">Jumlah</td>
                        <td class="w-3">:</td>
                        <td class="max-w-lg" id="qty"></td>
                    </tr>
                    <tr>
                        <td class="w-36">Harga</td>
                        <td class="w-3">:</td>
                        <td class="max-w-lg" id="price"></td>
                    </tr>
                    <tr>
                        <td class="w-36">Ongkos Kirim</td>
                        <td class="w-3">:</td>
                        <td class="max-w-lg" id="shipping_cost"></td>
                    </tr>
                    <tr>
                        <td class="w-36">Total</td>
                        <td class="w-3">:</td>
                        <td class="max-w-lg" id="total"></td>
                    </tr>
                    <tr>
                        <td class="w-36">Status</td>
                        <td class="w-3">:</td>
                        <td class="max-w-lg" id="status"></td>
                    </tr>
                    <tr>
                        <td class="w-36">Waktu Pemesanan</td>
                        <td class="w-3">:</td>
                        <td class="max-w-lg" id="time_order"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="modalStatus" class="fixed inset-0 items-center justify-center bg-[#00000073] z-30 hidden">
    <!-- Modal content -->
    <div class="bg-white rounded-lg p-8 shadow-lg transform transition-opacity scale-95">
        <div class="flex justify-between items-baseline border-b mb-4 pb-3">
            <h2 class="text-xl text-center font-semibold" id="modalTitle">Detail Pesanan</h2>
            <button id="closeModalStatus">
                <svg class="w-3" viewBox="0 0 384 512"><path d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/></svg>
            </button>
        </div>
        <p class="font-quick text-sm md:text-base">Sebelum merubah status pesanan, mohon untuk melakukan pengecekan ulang pembayaran.</p>
        <form class="mt-4 flex flex-col" id="formModal">
            @csrf
            <label for="status" class="font-public font-semibold">Status Pesanan</label>
            <select id="status" name="status" class="w-full font-quick border border-borderInput rounded focus:outline-button px-4 py-3 mt-2">
                <option value="unpaid">Belum Dibayar</option>
                <option value="paid">Sudah Dibayar</option>
            </select>
        </form>
        <button type="submit" id="submitBtn" class="w-full py-3 mt-6 bg-button rounded-md font-public font-semibold text-white">Simpan</button>
    </div>
</div>
@endsection

@section('js-script')
<script type="module">
    $(document).ready( function () {
        new DataTable('#ordersTable', {
            ordering: false,
            responsive: true,
            info: false,
        });

        new DataTable('#ordersTablePaid', {
            ordering: false,
            responsive: true,
            info: false,
        });

        $('#viewMore').click(function() {
            $('#modalView').removeClass('hidden');
            $('#modalView').addClass('flex');
            $('#modalView').addClass('animate-fade-in');


            $.ajax({
                type: 'GET',
                url: `/admin/getOrder?invoice=${$(this).data('invoice')}`,
                success: function (data) {
                    $('#invoice').text(data.data[0].invoice);
                    $('#name').text(data.data[0].name);
                    $('#address').text(data.data[0].address + ', ' + data.data[0].city + ', ' + data.data[0].province + " " + data.data[0].zipcode);
                    $('#no_hp').text(data.data[0].no_hp);
                    $('#courier').text(data.data[0].courier === 'jne' ? 'JNE' : 'TIKI');
                    $('#product').text(data.data[0].product);
                    $('#qty').text(data.data[0].qty);
                    $('#price').text("Rp " + data.data[0].price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
                    $('#shipping_cost').text("Rp " + data.data[0].shipping_cost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
                    $('#total').text("Rp " + data.data[0].total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
                    $('#status').text(data.data[0].status === 'unpaid' ? 'Belum Dibayar' : 'Sudah Dibayar');
                    $('#time_order').text(dayjs(data.data[0].time_order).format('DD-MM-YYYY h:mm'));
                },
                fail: function (request) {
                    console.log(request);
                }
            });

        });

        function closeModalView() {
            $('#modalView').addClass('hidden');
            $('#modalView').removeClass('flex');
            $('#modalView').removeClass('animate-fade-in');
        }

        $('#closeModalView').on('click', function() {
            closeModalView();
        });
        
        // Modal updateStatus
        $('#updateStatus').click(function() {
            $('#modalStatus').removeClass('hidden');
            $('#modalStatus').addClass('flex');
            $('#modalStatus').addClass('animate-fade-in');
            $('#formModal').find('select').val($(this).data('status'))
            
            const invoice = $(this).data('invoice');
        
            $('#submitBtn').click(function() {
                console.log(invoice);
                $.ajax({
                    type: 'POST',
                    url: `/admin/orders/update?invoice=${invoice}`,
                    data: {
                        status: $('#formModal').find('select').val(),
                        _token: "{{ csrf_token() }}",
                        _method: 'PUT',
                    },
                    success: function () {
                        setInterval(() => {
                            location.reload()
                        }, 1000);
                    },
                    fail: function (request) {
                        console.log(request);
                    }
                });
            })
        });

        function closeModalStatus() {
            $('#modalStatus').addClass('hidden');
            $('#modalStatus').removeClass('flex');
            $('#modalStatus').removeClass('animate-fade-in');
        }

        $('#closeModalStatus').on('click', function() {
            closeModalStatus();
        });
    });
</script>
    
@endsection