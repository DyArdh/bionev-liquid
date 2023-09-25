<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title') | Bioneu Liquid</title>

        <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@100;400;700&family=Quicksand:wght@300;400;700&display=swap"
            rel="stylesheet">

        <!-- Swipper Js CDN -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

        <!-- Vite Plugin -->
        @vite(['resources/js/app.js', 'resources/css/app.css'])
    </head>
    <body class="no-scrollbar">
        @yield('modal')
        @include('layouts.topNavbar')
        <main class="w-full mt-[69px] lg:mt-[30px]">
            <div>
                @yield('content')
            </div>
        </main>
        @include('layouts/footer')
        <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
        <script type="text/javascript">
            const profileButton = document.querySelector('.profile-button');
            const dropdownMenu = document.querySelector('.dropdown-menu');

            profileButton.addEventListener('click', () => {
                dropdownMenu.classList.toggle('hidden');
            });

            // Close the dropdown when clicking outside of it
            document.addEventListener('click', (e) => {
                if (!profileButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
                }
            });
        </script>
        @yield('js-script')
    </body>
</html>
