<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login | Bioneu Liquid</title>

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
                        <h1 class="font-bold text-primary text-2xl text-center mt-6 md:text-left md:text-3xl md:ps-32 lg:ps-0 ">Login</h1>
                        <div class="px-10 pt-6 md:px-32 lg:ps-0 lg:pe-28">
                            <div class="relative float-label-input mt-3 mb-7">
                                <input 
                                    type="email"
                                    id="email" 
                                    placeholder=" " 
                                    class="bg-transparent w-full focus:outline-none focus:shadow-outline border-b-[1.5px] border-black py-3 pe-3 block appearance-none leading-normal font-quick text-sm md:text-base" 
                                />
                                <label 
                                    class="absolute top-3 left-0 font-quick text-sm md:text-base opacity-50 font-medium pointer-events-none transition duration-200 ease-in-out pe-2"
                                    for="email"
                                >
                                    Email
                                </label>
                            </div>
                            <div class="relative float-label-input mt-3 mb-6">
                                <input 
                                    type="password"
                                    id="password" 
                                    placeholder=" " 
                                    class="bg-transparent w-full focus:outline-none focus:shadow-outline border-b-[1.5px] border-black py-3 pe-3 block appearance-none leading-normal font-quick text-sm md:text-bases" 
                                />
                                <label 
                                    class="absolute top-3 left-0 font-quick text-sm md:text-base opacity-50 font-medium pointer-events-none transition duration-200 ease-in-out pe-2"
                                    for="password"
                                >
                                    Password
                                </label>
                                <button class="absolute inset-y-0 right-0 flex items-center px-4" id="showPassword">
                                    <img src="{{ asset('assets/icons/eye.svg') }}" alt="showPasswordIcon" class="w-5 h-5" id="showPasswordIcon">
                                </button>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="remember" class="w-5 h-5 appearance-none rounded-full border-2 checked:bg-button"/>
                                <label for="remember" class="font-quick font-medium text-sm opacity-50 ms-2">Keep me logged in</label>
                            </div>
                            <div class="mt-5 mb-4">
                                <button class="bg-button font-public font-semibold text-lg text-white w-full rounded-xl py-3 px-13">
                                    Login
                                </button>
                            </div>
                            <a href="/forgot-pasword" class="font-quick font-medium text-sm opacity-50">Forgot password?</a>
                        </div>
                    </div>
            </section>
        </main>
        <script>
            const passwordBtn = document.querySelector('#showPassword');
            const showPasswordIcon = document.querySelector('#showPasswordIcon');
            const password = document.querySelector('#password')

            passwordBtn.addEventListener('click', () => {
                if (password.type === 'password') {
                    password.type = 'text';
                    showPasswordIcon.setAttribute('src', 'assets/icons/eye-off-outline.svg');
                } else {
                    password.type = 'password';
                    showPasswordIcon.setAttribute('src', 'assets/icons/eye.svg')
                }
            });
        </script>
    </body>
</html>
