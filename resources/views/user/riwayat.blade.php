@extends('layouts.pageLayout1')

@section('title', 'Riwayat Pemesanan')

@section('content')
<section class="px-5 md:px-12 lg:px-24 h-screen">
    <h1 class="font-public font-semibold text-xl mb-3">Riwayat Transaksi</h1>
    <div class="border border-[#F0F0F0] rounded p-3 md:p-5">
        @foreach ($pesanan as $data)
            <a href="/riwayat-pesanan/detail?invoice={{ $data->invoice }}">
                <div class="border shadow-card rounded px-3 py-4 mb-3 md:mb-5">
                    <div class="flex items-center gap-3">
                        <p class="font-quick text-xs md:text-sm">{{ date('d M Y', strtotime($data->created_at)) }}</p>
                        @if ($data->status === 'paid')
                            <span class="border border-button rounded-md text-button text-xs px-2 py-0.5 md:px-3 md:py-0.5">Selesai</span>
                        @else
                            <span class="border border-red-500 rounded-md text-red-500 text-xs px-2 py-0.5">Belum Dibayar</span>
                        @endif
                    </div>
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
            </a>
        @endforeach
    </div>
</section>
@endsection