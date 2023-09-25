@extends('layouts.pageLayout1')

@section('title', 'Payment')

@section('content')
    <section class="px-5 md:px-12 lg:px-24 h-screen">
        <div class="w-full lg:w-3/4 lg:mx-auto">
            <h1 class="font-public font-semibold text-lg text-textBlack text-center leading-7">Selesaikan Segera Pembayaran Anda</h1>
            <p class="font-public text-[16px] text-[#707070] text-center mt-3">Tanggal Pemesanan</p>
            <p class="font-public font-medium text-[16px] text-center">{{ date('l, j F Y', strtotime($data->created_at)) }}</p>
            <div class="flex justify-between items-center border border-borderInput rounded-t-lg px-5 py-3 mt-5 md:mt-8">
                <h3 class="font-quick font-semibold text-[16px]">Transfer Bank BRI</h3>
                <img src="{{ asset('assets/logo-bri.png') }}" alt="Logo BRI">
            </div>
            <div class="border border-t-0 border-borderInput px-5 py-3">
                <div class="flex justify-between items-center mt-2">
                    <div>
                        <p class="font-quick text-xs">Nomor Rekening</p>
                        <p id="noRek" class="font-quick font-semibold text-[16px]">658401028142533</p>
                    </div>
                    <button type="button" id="copyBtn" class="flex justify-center items-center gap-2">
                        <p class="font-quick font-semibold text-[16px] text-[#8BB75E]">Salin</p>
                        <svg class="w-4" viewBox="0 0 18 20" fill="none">
                            <path d="M16 0C16.5304 0 17.0391 0.210714 17.4142 0.585786C17.7893 0.960859 18 1.46957 18 2V14C18 14.5304 17.7893 15.0391 17.4142 15.4142C17.0391 15.7893 16.5304 16 16 16H14V18C14 18.5304 13.7893 19.0391 13.4142 19.4142C13.0391 19.7893 12.5304 20 12 20H2C1.46957 20 0.960859 19.7893 0.585786 19.4142C0.210714 19.0391 0 18.5304 0 18V6C0 5.46957 0.210714 4.96086 0.585786 4.58579C0.960859 4.21071 1.46957 4 2 4H4V2C4 1.46957 4.21071 0.960859 4.58579 0.585786C4.96086 0.210714 5.46957 0 6 0H16ZM12 6H2V18H12V6ZM7 13C7.26522 13 7.51957 13.1054 7.70711 13.2929C7.89464 13.4804 8 13.7348 8 14C8 14.2652 7.89464 14.5196 7.70711 14.7071C7.51957 14.8946 7.26522 15 7 15H5C4.73478 15 4.48043 14.8946 4.29289 14.7071C4.10536 14.5196 4 14.2652 4 14C4 13.7348 4.10536 13.4804 4.29289 13.2929C4.48043 13.1054 4.73478 13 5 13H7ZM16 2H6V4H12C12.5304 4 13.0391 4.21071 13.4142 4.58579C13.7893 4.96086 14 5.46957 14 6V14H16V2ZM9 9C9.25488 9.00028 9.50003 9.09788 9.68537 9.27285C9.8707 9.44782 9.98223 9.68695 9.99717 9.94139C10.0121 10.1958 9.92933 10.4464 9.76574 10.6418C9.60215 10.8373 9.3701 10.9629 9.117 10.993L9 11H5C4.74512 10.9997 4.49997 10.9021 4.31463 10.7272C4.1293 10.5522 4.01777 10.313 4.00283 10.0586C3.98789 9.80416 4.07067 9.55362 4.23426 9.35817C4.39786 9.16271 4.6299 9.0371 4.883 9.007L5 9H9Z" fill="#8BB75E"/>
                          </svg>
                    </button>
                </div>
                <div class="mt-5 mb-2">
                    <p class="font-quick text-xs">Total Pembayaran</p>
                    <p class="font-quick font-semibold text-[16px]">Rp {{ number_format($data->total, 0, ',', '.') }}</p>
                </div>
            </div>
            <div class="border border-t-0 rounded-b-lg border-borderInput px-5 py-3">
                <h2 class="font-public font-semibold text-[16px]">Rician Pembayaran</h2>
                <table class="w-full mt-2">
                    <tbody class="font-quick text-sm">
                        <tr>
                            <td>Total Harga ({{ $data->qty }} Barang)</td>
                            <td class="text-end">Rp {{ number_format($data->price * $data->qty, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td>Total Ongkos Kirim</td>
                            <td class="text-end">Rp {{ number_format($data->shipping_cost, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td>Biaya Administrasi</td>
                            <td class="text-end">Rp {{ number_format((int)substr($data->invoice, -3), 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="flex justify-between items-center border-t my-3 pt-2 font-public font-semibold text-sm">
                    <p>Total Belanja</p>
                    <p>Rp {{ number_format($data->total, 0, ',', '.') }}</p>
                </div>
            </div>
            <div class="flex flex-col items-center gap-4 mt-5 md:flex-row md:gap-7 md:mt-7">
                <a href="{{ route('checkout') }}" class="bg-button py-4 w-full rounded-md font-public font-semibold text-white text-center">
                    <button>Belanja Lagi</button>
                </a>
                <a href="{{ route('pesanan') }}" class="border-2 border-button py-4 w-full rounded-md font-public font-semibold text-center">
                    <button>Riwayat Pesanan</button>
                </a>
            </div>
        </div>
    </section>
@endsection

@section('js-script')
<script type="module">
    $(document).ready(function() {
        $('#copyBtn').click(async () => {
            await navigator.clipboard.writeText($('#noRek').text());
        });
    });
</script>
    
@endsection