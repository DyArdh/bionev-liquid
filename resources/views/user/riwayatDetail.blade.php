@extends('layouts.pageLayout1')

@section('title', 'Checkout')

@section('content')
<section class="px-5 md:px-12 lg:px-24">
    <h1 class="font-semibold text-xl mb-3">Detail Pesanan</h1>
    <div class="border shadow-card rounded px-3 py-4 mb-3 md:mb-5">
        <h1 class="font-semibold text-sm">Detail Produk</h1>
        <div class="flex items-center gap-3 mt-2">
            <img src="{{ asset('assets/product.png') }}" alt="product" class="w-10 rounded md:w-12">
            <div class="font-quick">
                <div>
                    <p class="font-semibold text-sm md:text-base">Bionev Liquid</p>
                    <p class="text-[8px] md:text-[12px]">{{ $data->qty }} x Rp {{ number_format($data->price, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <div class="flex justify-between items-center font-quick mt-2">
            <div>
                <p class="text-[10px] md:text-sm">Total Belanja</p>
                <p class="font-bold text-[10px] md:text-sm">Rp {{ number_format($data->total, 0, ',', '.') }}</p>
            </div>
            <a href="/checkout">
                <button class="font-public font-semibold text-xs text-white bg-button rounded px-3 py-1.5 md:px-4 md:py-2 md:text-sm">Belanja Lagi</button>
            </a>
        </div>
    </div>
    <div class="md:grid md:grid-cols-8">
        <div class="md:col-span-3">
            <h1 class="font-semibold text-sm">Informasi Pengiriman</h1>
            <table class="mt-2">
                <tbody class="font-quick text-xs md:text-sm">
                    <tr>
                        <td class="w-1/4">Kurir</td>
                        <td class="w-5">:</td>
                        <td><span class="uppercase">{{ $data->courier }}</span> - Reguler</td>
                    </tr>
                    <tr>
                        <td class="w-1/4">No Resi</td>
                        <td class="w-5">:</td>
                        <td>43824724724</td>
                    </tr>
                    <tr>
                        <td class="w-1/4">Alamat</td>
                        <td class="w-5">:</td>
                        <td>
                            <p class="font-semibold">lorem Ipsum</p>
                            <p>087777777777</p>
                            <p>Jl. Banaran, Kec. Kauman, Kabupaten Tulungagung, Jawa Timur, 66261</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="md:col-span-2"></div>
        <div class="md:col-span-3">
            <h1 class="font-semibold text-sm my-2">Rincian Pembayaran</h1>
            <div class="font-quick text-xs md:text-sm">
                <div class="flex justify-between mb-1">
                    <p>Metode Pembayaran</p>
                    <p>Bank Transfer</p>
                </div>
                <div class="flex justify-between mb-1">
                    <p>Total Harga ({{ $data->qty }} Barang)</p>
                    <p>Rp {{ number_format($data->price * $data->qty, 0, ',', '.') }}</p>
                </div>
                <div class="flex justify-between mb-1">
                    <p>Total Ongkos Kirim</p>
                    <p>Rp {{ number_format($data->shipping_cost, 0, ',', '.') }}</p>
                </div>
                <div class="flex justify-between mb-1">
                    <p>Biaya Administrasi</p>
                    <p>Rp {{ number_format((int)substr($data->invoice, -3), 0, ',', '.') }}</p>
                </div>
                <div class="flex justify-between mt-3 font-semibold">
                    <p>Total Belanja</p>
                    <p>Rp {{ number_format($data->total, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection