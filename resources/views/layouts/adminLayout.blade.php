<!DOCTYPE html>
<html x-data="data()" lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title') | Bioneu Liquid</title>

        <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@100;400;700&family=Quicksand:wght@300;400;700&display=swap" rel="stylesheet">

        <!-- JQuery CDN -->
        <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>

        <!-- Alpinejs Function -->
        <script src="{{ asset('js/alpine-init.js') }}"></script>

        <!-- DataTables CDN -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

        <!-- Vite Plugin -->
        @vite(['resources/js/app.js', 'resources/css/app.css'])
    </head>
    <body>
        @yield('modal')
        <div class="flex h-screen bg-gray-50" :class="{ 'overflow-hidden': isSideMenuOpen }">
            <!-- Dekstop Sidebar -->
            <aside class="z-20 hidden w-52 overflow-y-auto bg-gray-800 md:block flex-shrink-0">
                <div class="py-4 text-gray-500">
                    <a class="ml-6 text-lg font-bold text-gray-200" href="#">
                        Bionev Liquid
                    </a>
                    <ul class="mt-6">
                        <li class="relative px-6 py-2">
                            <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg @if (Request::url() === url('/admin/dashboard')) {{ "bg-purple-600" }} @else {{ "bg-transparent" }} @endif" aria-hidden="true"></span>
                            <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 hover:text-purple-600" href="/admin">
                                <svg
                                    class="w-5 h-5"
                                    aria-hidden="true"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                    ></path>
                                </svg>
                                <span class="ml-4">Dashboard</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-2 mt-2">
                            <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg @if (Request::url() === url('/admin/users')) {{ "bg-purple-600" }} @else {{ "bg-transparent" }} @endif" aria-hidden="true"></span>
                            <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 hover:text-purple-600" href="/admin/users">
                                <svg class="w-5 h-5" aria-hidden="true" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><circle cx="9" cy="9" r="4"/><path d="M16 19c0-3.314-3.134-6-7-6s-7 2.686-7 6m13-6a4 4 0 1 0-3-6.646"/><path d="M22 19c0-3.314-3.134-6-7-6c-.807 0-2.103-.293-3-1.235"/></g></svg>
                                <span class="ml-4">User</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-2 mt-2">
                            <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg @if (Request::url() === url('/admin/orders')) {{ "bg-purple-600" }} @else {{ "bg-transparent" }} @endif" aria-hidden="true"></span>
                            <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 hover:text-purple-600" href="/admin/orders">
                                <svg class="w-5 h-5" aria-hidden="true" viewBox="0 0 2048 2048"><path fill="currentColor" d="M896 512v128H512V512h384zM512 896V768h384v128H512zm0 256v-128h256v128H512zM384 512v128H256V512h128zm0 256v128H256V768h128zm-128 384v-128h128v128H256zM128 128v1792h640v128H0V0h1115l549 549v219h-128V640h-512V128H128zm1024 91v293h293l-293-293zm640 805h256v1024H896V1024h256V896h128v128h384V896h128v128zm128 896v-512h-896v512h896zm0-640v-128h-896v128h896z"/></svg>
                                <span class="ml-4">Pesanan</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>

            <!-- Mobile Sidebar -->
            <!-- Backdrop -->
            <div
                x-show="isSideMenuOpen"
                x-transition:enter="transition ease-in-out duration-150"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in-out duration-150"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
            ></div>
            <aside 
                class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
                x-show="isSideMenuOpen"
                x-transition:enter="transition ease-in-out duration-150"
                x-transition:enter-start="opacity-0 transform -translate-x-20"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in-out duration-150"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0 transform -translate-x-20"
                @click.away="closeSideMenu"
                @keydown.escape="closeSideMenu"
            >
                <div class="py-4 text-gray-500">
                    <a class="ml-6 text-lg font-bold text-gray-200" href="#">
                        Bionev Liquid
                    </a>
                    <ul class="mt-6">
                        <li class="relative px-6 py-3">
                            <span
                                class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                                aria-hidden="true"
                            ></span>
                            <a
                                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                                href="/admin"
                            >
                                <svg
                                    class="w-5 h-5"
                                    aria-hidden="true"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                    ></path>
                                </svg>
                                <span class="ml-4">Dashboard</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <span
                                class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                                aria-hidden="true"
                            ></span>
                            <a
                                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                                href="/admin/users"
                            >
                                <svg class="w-5 h-5" aria-hidden="true" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><circle cx="9" cy="9" r="4"/><path d="M16 19c0-3.314-3.134-6-7-6s-7 2.686-7 6m13-6a4 4 0 1 0-3-6.646"/><path d="M22 19c0-3.314-3.134-6-7-6c-.807 0-2.103-.293-3-1.235"/></g></svg>
                                <span class="ml-4">User</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <span
                                class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                                aria-hidden="true"
                            ></span>
                            <a
                                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                                href="/admin/orders"
                            >
                                <svg class="w-5 h-5" aria-hidden="true" viewBox="0 0 2048 2048"><path fill="currentColor" d="M896 512v128H512V512h384zM512 896V768h384v128H512zm0 256v-128h256v128H512zM384 512v128H256V512h128zm0 256v128H256V768h128zm-128 384v-128h128v128H256zM128 128v1792h640v128H0V0h1115l549 549v219h-128V640h-512V128H128zm1024 91v293h293l-293-293zm640 805h256v1024H896V1024h256V896h128v128h384V896h128v128zm128 896v-512h-896v512h896zm0-640v-128h-896v128h896z"/></svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>

            <!-- Header -->
            <div class="flex flex-col flex-1 w-full">
                <header class="z-10 py-4 bg-white shadow-md">
                    <div class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 md:justify-end">
                        <!-- Mobile hamburger -->
                        <button
                        class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
                        @click="toggleSideMenu"
                        aria-label="Menu"
                        >
                        <svg
                            class="w-6 h-6"
                            aria-hidden="true"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                            fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"
                            ></path>
                        </svg>
                        </button>
                        <!-- Profile -->
                        <div class="relative">
                            <button 
                                class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                                @click="toggleProfileMenu"
                                @click.away="closeProfileMenu"
                                @keydown.escape="closeProfileMenu"
                                aria-label="Account"
                                aria-haspopup="true"
                            >
                                <img
                                    class="object-cover w-8 h-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=aa3a807e1bbdfd4364d1f449eaa96d82"
                                    alt=""
                                    aria-hidden="true"
                                />
                            </button>
                            <template x-if="isProfileMenuOpen">
                                <ul
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    @click="closeProfileMenu"
                                    @keydown.escape="closeProfileMenu"
                                    class="absolute right-0 w-56 p-2 mt-3 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md "
                                    aria-label="submenu"
                                >
                                    <li class="flex">
                                        <a
                                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800"
                                        href="/profile"
                                    >
                                        <svg
                                        class="w-4 h-4 mr-3"
                                        aria-hidden="true"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        >
                                        <path
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                        ></path>
                                        </svg>
                                        <span>Profile</span>
                                    </a>
                                    </li>
                                    <li class="flex">
                                        <a
                                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800"
                                        href="{{ route('logout') }}"
                                        >
                                        <svg
                                            class="w-4 h-4 mr-3"
                                            aria-hidden="true"
                                            fill="none"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                            <path
                                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                                            ></path>
                                        </svg>
                                        <span>Log out</span>
                                        </a>
                                    </li>
                                </ul>
                            </template>
                        </div>
                    </div>  
                </header>
                <main class="h-full overflow-y-hidden bg-white">
                    <div class="container px-6 mx-auto">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
        @yield('js-script')
    </body>
</html>