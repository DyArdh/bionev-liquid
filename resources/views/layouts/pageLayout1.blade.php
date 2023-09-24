<!DOCTYPE html>
<html lang="en">
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

        <!-- JQuery CDN -->
        <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
        
        <!-- Select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


        <!-- Vite Plugin -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="no-scrollbar">
        @yield('modal')
        @include('layouts.header')
        <main class="w-full mt-[100px] lg:mt-[120px]">
            <div>
                @yield('content')
            </div>
        </main>
        @yield('js-script')
    </body>
</html>
