@extends('layouts.pageLayout1')

@section('title', 'Tentang Kami')

@section('content')
<section class="px-5 md:px-12 lg:px-24">
    <img src="{{ asset('assets/about_us.png') }}" alt="hero" class="mt-40 scale-100 mx-auto lg:mt-0 lg:scale-100 lg:w-[800px]">

    <div class="mt-16">
        <h1 class="text-center text-xl lg:text-2xl font-bold mb-4 uppercase">Keberlanjutan</h1>
        <div class="timeline max-w-[365px] mb-12 mx-auto md:max-w-[550px] lg:max-w-[750px]">
            <ul>
            <li>
                <span class="font-semibold">Tahun 2023</span>
                <div class="content">
                <p class="text-black">
                    Peningkatan kualitas produk dan produksi secara berkala.
                </p>
                </div>
            </li>
            <li>
                <span class="font-semibold">Tahun 2024</span>
                <div class="content">
                <p class="text-black">
                    Diversifikasi produk seperti pembuatan liquid dengan bahan alami lain dan melakukan ekspansi pasar.
                </p>
                </div>
            </li>
            <li>
                <span class="font-semibold">Tahun 2025</span>
                <div class="content">
                <p class="text-black">
                    Mendirikan vape store serta membuat liquid khusus nebulizer.
                </p>
                </div>
            </li>
            <li>
                <span class="font-semibold">Tahun 2026</span>
                <div class="content">
                <p class="text-black">
                    Mendirikan industri liquid dengan bahan alami.
                </p>
                </div>
            </li>
            </ul>
        </div>
    </div>
</section>
@endsection
