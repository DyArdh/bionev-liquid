<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Register | Bioneu Liquid</title>

        <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@100;400;700&family=Quicksand:wght@300;400;700&display=swap"
            rel="stylesheet">

        <!-- Vite Plugin -->
        @vite(['resources/js/app.js', 'resources/css/app.css'])
    </head>
    <body>
        <main class="h-screen flex">
            <section class="w-full flex flex-col my-auto lg:grid lg:grid-cols-12 lg:h-screen">
                <img src="{{ asset('assets/logo.png') }}" alt="logo" class="w-40 mx-auto md:scale-125 lg:hidden">
                <span class="bg-login bg-cover bg-center lg:col-span-7"></span>
                    <div class="flex flex-col lg:col-span-5 lg:my-auto">
                        <h1 class="font-bold text-primary text-2xl text-center mt-6 md:text-left md:text-3xl md:ps-32 lg:ps-0 ">Register</h1>
                        <div class="px-10 pt-6 md:px-32 lg:ps-0 lg:pe-28">
                            <form action="/register" method="POST">
                                @csrf
                                <div class="flex flex-col gap-2 font-quick">
                                    <label class="font-public font-medium" for="name">Nama Lengkap</label>
                                    <input type="text" name="name" id="name" class="px-4 py-2 border border-black rounded-md focus:caret-button focus:outline-button" />
                                </div>
                                <div class="flex flex-col gap-2 font-quick mt-3 lg:mt-3">
                                    <label class="font-public font-medium" for="address">Alamat</label>
                                    <textarea name="address" id="address" class="px-4 py-2 min-h-[5rem] border border-black rounded-md focus:caret-button focus:outline-button"></textarea>
                                </div>
                                <div class="flex flex-col gap-2 font-quick mt-4 lg:mt-3">
                                    <label class="font-public font-medium" for="phone">No. HP</label>
                                    <input type="text" name="phone" id="phone" class="px-4 py-2 border border-black rounded-md focus:caret-button focus:outline-button" />
                                </div>
                                <div class="flex flex-col gap-2 font-quick mt-4 lg:mt-3">
                                    <label class="font-public font-medium" for="email">Email</label>
                                    <input type="email" name="email" id="email" class="px-4 py-2 border border-black rounded-md focus:caret-button focus:outline-button" />
                                </div>
                                <div class="flex flex-col gap-2 font-quick mt-4 lg:mt-3">
                                    <label class="font-public font-medium" for="password">Password</label>
                                    <input type="text" name="password" id="password" class="px-4 py-2 border border-black rounded-md focus:caret-button focus:outline-button" />
                                </div>                                          
                                <div class="mt-5 mb-4">
                                    <button class="bg-button font-public font-semibold text-lg text-white w-full rounded-xl py-3 px-13" type="submit">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
            </section>
        </main>
    </body>
</html>
