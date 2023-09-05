@extends('layouts.landingPageLayout')

@section('title', 'Home')
@section('content')
    <section class="bg-second px-5 md:px-12 lg:px-24 lg:h-screen">
        <div class="flex flex-col">
            <img src="{{ asset('assets/hero.png') }}" alt="hero" class="mt-[75px] scale-110 mx-auto lg:mt-0 lg:scale-100 lg:w-[950px]">
            <button class="px-6 py-3 w-44 mt-10 mb-48 bg-button rounded-full font-public font-bold text-white uppercase mx-auto md:px-8 md:py-4 md:mt-8 md:mb:40 md:text-xl md:w-48 lg:px-10 lg:w-52 lg:mt-0 lg:mb-0">Get Now</button>
        </div>
    </section>
    <section class="h-screen bg-white px-5 md:px-12 lg:px-24">
        <div class="flex flex-col md:flex-row md:gap-x-12 md:items-center md:my-10 lg:gap-x-16">
            <img src="{{ asset('assets/section2.png') }}" alt="section2" class="w-56 mx-auto mt-10 md:w-72 md:mt-0 lg:w-96 lg:ms-20">
            <div class="mt-3 text-center md:text-left">
                <h1 class="font-public font-bold text-xl uppercase">WHAT MAKE IT special?</h1>
                <p class="font-quick font-medium mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. In aliquid explicabo quibusdam architecto asperiores tenetur libero repellat omnis, maxime voluptatibus quasi quos alias, earum temporibus ratione quidem. Possimus, inventore libero!</p>
                <button class="px-6 py-3 w-full my-10 bg-button rounded-lg font-public font-bold text-white md:w-44 md:rounded-full md:mb-0 md:text-lg">Beli</button>
            </div>
        </div>
    </section>
    <div class="mt-[1400px] bg-white">
        test bre
    </div>
@endsection

