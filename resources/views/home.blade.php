@extends('layouts.landingPageLayout')

@section('title', 'Home')
@section('content')
    <section class="bg-second px-5 md:px-12 lg:px-24 lg:h-[800px]">
        <div class="flex flex-col">
            <img src="{{ asset('assets/hero.png') }}" alt="hero" class="mt-[75px] scale-110 mx-auto lg:mt-14 lg:scale-110 lg:w-[800px]">
            <a href="{{ route('checkout') }}" class="mx-auto">
                <button class="px-6 py-3 w-44 mt-10 mb-48 bg-button rounded-full font-public font-bold text-white uppercase mx-auto md:px-8 md:py-4 md:mt-8 md:mb:40 md:text-xl md:w-48 lg:px-10 lg:w-52 lg:mt-4 lg:mb-0">Get Now</button>
            </a>
        </div>
    </section>
    <section class="bg-white px-5 md:px-12 lg:px-24">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row md:gap-x-12 lg:gap-x-28 md:items-center md:my-10">
                <img src="{{ asset('assets/section2.png') }}" alt="section2" class="w-56 mx-auto mt-10 md:w-72 md:mt-0 lg:w-[420px] lg:ms-20 lg:">
                <div class="mt-3 text-center md:text-left">
                    <h1 class="font-public font-bold text-xl lg:text-4xl uppercase">MENGAPA BIONEV SPESIAL?</h1>
                    <p class="font-quick font-medium mt-3 text-sm lg:mr-28">BIO-NEV merupakan liquid vape pertama di Indonesia yang menggunakan bahan baku ektrak teh hijau alami.
                    Liquid BIO-NEV dibuat menggunakan alat dan bahan yang foodgrade serta produksi di dalam laboratorium. BIO-NEV dikemas dalam 2 packaging yakni dalam bentuk botol yang dicover dengan box packaging guna mencegah kerusakan produk.
                    </p>
                    <a href="{{ route('checkout') }}">
                        <button class="px-6 py-3 w-full my-10 bg-button rounded-lg font-public font-bold text-white md:w-44 md:rounded-full md:mb-0 md:text-lg">Beli</button>
                    </a>
                </div>
            </div>
        </div>
    
    </section>
    
    <section class="relative container mx-auto">
           
        <!-- Md:Lg content -->
            <div class="hidden md:block">

                <div class="w-full grid grid-cols-2 bg-section1 bg-cover mx-auto">
                    <div class="flex lg:justify-end">
                        <img class=" lg:mt-[250px] md:mt-16 lg:-mr-16 md:-mr-4 lg:mb-16 md:mb-0 md:w-[400px] md:h-[288px] lg:w-[620px] lg:h-[446px] " src="{{ asset('assets/product image 1.png') }}" alt="product_image1">
                    </div>
                    <div class="lg:ml-56 md:mx-28">
                        <img class="lg:mt-[150px] lg:w-[185px] lg:h-[286px] " src="{{ asset('assets/product image 1-2.png') }}" alt="product_image1">
                        <h1 class="font-semibold text-xl lg:max-w-[150px]">Mengapa Harus Bionev?</h1>
                        <p class="font-quick lg:max-w-[150px] md:max-w-[140px] text-sm mt-1" >Teh hijau terbukti memiliki kandungan katekin dengan aktivitas antioksidan paling tinggi</p>
                    </div>
                </div>
                
                <div class="w-full grid grid-cols-2 bg-section2 bg-cover md:mt-20 lg:mt-8 mx-auto">
                    <div class="lg:ml-[347px] md:mx-28">
                        <img class="md:-ml-9 lg:-ml-0 md:w-[160px] lg:w-[200px]" src="{{ asset('assets/product image 2-2.png') }}" alt="product 2-2">
                        <h1 class="font-semibold text-xl lg:max-w-[150px] lg:ml-[40px]">Mengapa Harus Bionev?</h1>
                        <p class="font-quick lg:max-w-[150px] md:max-w-[140px] lg:ml-[40px] text-sm mt-1" >Kandungan katekin terbukti bersifat fibropreventif terhadap pengurangan luas area fibrosis</p>
                    </div>
                    <div>
                        <img class="md:w-[400px] lg:w-[620px] lg:-ml-14 md:mt-2 lg:mt-2" src="{{ asset('assets/product image 2.png') }}" alt="product 2">
                    </div>
                </div>
                
                <div class="w-full grid grid-cols-2 bg-section3 bg-cover md:mt-20 lg:mt-8 mx-auto">
                    <div class="flex justify-end">
                        <img class="lg:mt-[140px] md:mt-8 lg:-mr-16 lg:mb-16 md:w-[400px] md:h-[323px] lg:w-[620px] lg:h-[480px]" src="{{ asset('assets/product image 3.png') }}" alt="product_image1">
                    </div>
                    <div class="lg:ml-52 md:mx-24">
                        <img class="lg:mt-[120px] mt-6 lg:w-[194px] lg:h-[275px]" src="{{ asset('assets/product image 3-2.png') }}" alt="product_image1">
                        <h1 class="font-semibold text-xl lg:max-w-[150px] md:ml-3 lg:ml-3">Mengapa Harus Bionev?</h1>
                        <p class="font-quick lg:max-w-[150px] md:ml-3 lg:ml-3 text-sm mt-1" >Senyawa tanin pada teh hijau mempunyai aktivitas dalam menghambat produksi oksidan oleh neutrofil, monosit dan makrofag</p>
                    </div>
                </div>
            </div>
                
                
                <!--   -->
                
                <!-- Mobile content -->
                <div class="md:hidden lg:hidden">
                    <img class="mx-auto w-[300px]" src="{{ asset('assets/product image 1.png') }}" alt="product_image1">
            <div class="mt-4 px-5">
                <h1 class="text-center font-semibold text-lg">Why Must Vape With Bionev</h1>
                <p class="text-center font-quick mt-3">Teh hijau terbukti memiliki kandungan katekin dengan aktivitas antioksidan paling tinggi</p>
            </div>
            
            <img class="mt-16 mx-auto w-[300px]" src="{{ asset('assets/product image 2.png') }}" alt="product_image2">
            <div class="mt-4 px-5">
                <h1 class="text-center font-semibold text-lg">Why Must Vape With Bionev</h1>
                <p class="text-center font-quick mt-3">Kandungan katekin terbukti bersifat fibropreventif terhadap pengurangan luas area fibrosis</p>
            </div>
            
            <img class="mt-16 mx-auto w-[300px]" src="{{ asset('assets/product image 3.png') }}" alt="product_image3">
            <div class="mt-4 px-5">
                <h1 class="text-center font-semibold text-lg">Why Must Vape With Bionev</h1>
                <p class="text-center font-quick mt-3">Senyawa tanin pada teh hijau mempunyai aktivitas dalam menghambat produksi oksidan oleh neutrofil, monosit dan makrofag</p>
            </div>
        </div>
        <!-- Mobile content -->

            

    </section>

    <section class="container mx-auto mt-10">
        <div class="flex flex-col">
            <h1 class="font-public font-bold text-textBlack text-xl lg:text-4xl text-center uppercase">Instagram</h1>
            <!-- Swipper Md -->
            <div class="swiper hidden md:block md:mt-8 lg:mt-12 md:px-10 lg:px-32">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/ig1.png') }}" alt="ig">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/ig2.png') }}" alt="ig">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/ig3.png') }}" alt="ig">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/ig4.png') }}" alt="ig">
                    </div>
                </div>
            </div>
            <!-- Swipper Mobile -->
            <div class="swiper swiperMobile mt-8 md:hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/ig1.png') }}" alt="ig">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/ig2.png') }}" alt="ig">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/ig3.png') }}" alt="ig">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/ig4.png') }}" alt="ig">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white px-5 py-16 md:px-12 lg:px-24">
        <div class="flex flex-col">
            <h1 class="font-public font-bold text-textBlack text-xl lg:text-4xl text-center uppercase">Testimoni</h1>
            <div class="mt-10 lg:mt-14 mx-2 flex flex-col justify-center gap-5 md:flex-row">
                <div class="border border-[#CCC] rounded-xl md:w-[540px]">
                    <img src="{{ asset('assets/testi1.png') }}" alt="testimoni1">
                    <p class="font-public font-medium text-lg text-center mt-5">Zhico</p>
                    <p class="font-quick font-light text-center leading-5 mt-2 mb-6 px-5">"Bionev ini merupakan jawaban bagi mereka yang mencari alternatif yang lebih sehat dalam dunia vape. Rasa herbalnya benar-benar alami dan menyegarkan, serta memberikan pengalaman yang jauh lebih bersih dan lebih baik bagi tubuh saya. Saya sangat menghargai upaya untuk memberikan opsi vape yang lebih sehat, dan produk ini telah memenuhi semua ekspektasi saya"</p>
                </div>
                <div class="border border-[#CCC] rounded-xl md:w-[540px]">
                    <img src="{{ asset('assets/testi2.png') }}" alt="testimoni2">
                    <p class="font-public font-medium text-lg text-center mt-5">Arkan</p>
                    <p class="font-quick font-light text-center leading-5 mt-2 mb-6 px-5">"Produk liquid vape ini benar-benar luar biasa! Rasa dan aroma yang dihasilkan sangat autentik, dan saya sangat senang dengan inovasi yang dibawa Bionev. Selain itu, kemasannya juga sangat praktis dan mudah digunakan. Ini adalah produk yang sangat memuaskan bagi para pecinta vaping seperti saya"</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js-script')
<script type="module">
    const swiper = new Swiper('.swiper', {
        slidesPerView: 3,
        centeredSlides: false,
        spaceBetween: 30,
    });

    const swiperMobile = new Swiper('.swiperMobile', {
        slidesPerView: 1,
        centeredSlides: true,
        spaceBetween: 30,
    });
</script> 
@endsection