@extends('layouts.adminLayout')

@section('title', 'Dashboard')

@section('content')
<section >
    <h2 class="my-6 text-xl font-semibold">
        Dashboard
    </h2>
    <div class="grid grid-cols-12 gap-10">
        <div class="flex flex-col gap-5 col-span-3">
            <div class="flex items-center gap-14 bg-second text-white w-full px-5 py-3 rounded-lg">
                <div class="w-fit p-2 bg-button rounded-lg">
                    <svg class="w-8 text-white" viewBox="0 0 24 24"><path fill="currentColor" d="M17 18a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2c0-1.11.89-2 2-2M1 2h3.27l.94 2H20a1 1 0 0 1 1 1c0 .17-.05.34-.12.5l-3.58 6.47c-.34.61-1 1.03-1.75 1.03H8.1l-.9 1.63l-.03.12a.25.25 0 0 0 .25.25H19v2H7a2 2 0 0 1-2-2c0-.35.09-.68.24-.96l1.36-2.45L3 4H1V2m6 16a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2c0-1.11.89-2 2-2m9-7l2.78-5H6.14l2.36 5H16Z"/></svg>
                </div>
                <div class="font-public">
                    <h2 class="font-semibold">Pesanan Masuk</h2>
                    <p class="text-right text-lg">{{ $orderUnpaid }}</p>
                </div>
            </div>
            <div class="flex items-center gap-16 bg-second text-white w-full px-5 py-3 rounded-lg">
                <div class="w-fit p-2 bg-yellow-500 rounded-lg">
                    <svg class="w-8 text-white" viewBox="0 0 2048 2048"><path fill="currentColor" d="m2029 1453l-557 558l-269-270l90-90l179 178l467-466l90 90zM1024 640H640V512h384v128zm0 256H640V768h384v128zm-384 128h384v128H640v-128zM512 640H384V512h128v128zm0 256H384V768h128v128zm-128 128h128v128H384v-128zm768-384V128H256v1792h896v128H128V0h1115l549 549v731l-128 128V640h-512zm128-128h293l-293-293v293z"/></svg>
                </div>
                <div class="font-public">
                    <h2 class="font-semibold">Produk Terjual</h2>
                    <p class="text-right text-lg">{{ $orderPaid }}</p>
                </div>
            </div>
            <div class="flex items-center gap-10 bg-second text-white w-full px-5 py-3 rounded-lg">
                <div class="w-fit p-2 bg-purple-400 rounded-lg">
                    <svg class="w-8 text-white" viewBox="0 0 24 24"><path fill="currentColor" d="M15.999 8.5h2c0-2.837-2.755-4.131-5-4.429V2h-2v2.071c-2.245.298-5 1.592-5 4.429c0 2.706 2.666 4.113 5 4.43v4.97c-1.448-.251-3-1.024-3-2.4h-2c0 2.589 2.425 4.119 5 4.436V22h2v-2.07c2.245-.298 5-1.593 5-4.43s-2.755-4.131-5-4.429V6.1c1.33.239 3 .941 3 2.4zm-8 0c0-1.459 1.67-2.161 3-2.4v4.799c-1.371-.253-3-1.002-3-2.399zm8 7c0 1.459-1.67 2.161-3 2.4v-4.8c1.33.239 3 .941 3 2.4z"/></svg>
                </div>
                <div class="font-public">
                    <h2 class="font-semibold">Total Pendapatan</h2>
                    <p class="text-right text-lg">Rp {{ number_format($income, 0, ',', '.') }}</p>
                </div>
            </div>
            <div class="flex items-center gap-24 bg-second text-white w-full px-5 py-3 rounded-lg">
                <div class="w-fit p-2 bg-orange-400 rounded-lg">
                    <svg class="w-8 text-white" viewBox="0 0 256 256"><path fill="currentColor" d="M27.2 126.4a8 8 0 0 0 11.2-1.6a52 52 0 0 1 83.2 0a8 8 0 0 0 11.2 1.59a7.73 7.73 0 0 0 1.59-1.59a52 52 0 0 1 83.2 0a8 8 0 0 0 12.8-9.61A67.85 67.85 0 0 0 203 93.51a40 40 0 1 0-53.94 0a67.27 67.27 0 0 0-21 14.31a67.27 67.27 0 0 0-21-14.31a40 40 0 1 0-53.94 0A67.88 67.88 0 0 0 25.6 115.2a8 8 0 0 0 1.6 11.2ZM176 40a24 24 0 1 1-24 24a24 24 0 0 1 24-24Zm-96 0a24 24 0 1 1-24 24a24 24 0 0 1 24-24Zm123 157.51a40 40 0 1 0-53.94 0a67.27 67.27 0 0 0-21 14.31a67.27 67.27 0 0 0-21-14.31a40 40 0 1 0-53.94 0A67.88 67.88 0 0 0 25.6 219.2a8 8 0 1 0 12.8 9.6a52 52 0 0 1 83.2 0a8 8 0 0 0 11.2 1.59a7.73 7.73 0 0 0 1.59-1.59a52 52 0 0 1 83.2 0a8 8 0 0 0 12.8-9.61A67.85 67.85 0 0 0 203 197.51ZM80 144a24 24 0 1 1-24 24a24 24 0 0 1 24-24Zm96 0a24 24 0 1 1-24 24a24 24 0 0 1 24-24Z"/></svg>
                </div>
                <div class="font-public">
                    <h2 class="font-semibold">Total User</h2>
                    <p class="text-right text-lg">{{ $user }}</p>
                </div>
            </div>
        </div>
        <div class="col-span-9 p-5 border rounded">
            <div class="mb-3 flex items-center gap-3">
                <input type="date" id="from" class="border rounded px-3 py-2">
                <span>-</span>
                <input type="date" id="to" class="border rounded px-3 py-2">
                <button id="filter" class="w-fit bg-button p-3 rounded-lg text-white">
                    <svg class="w-5" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10a7 7 0 1 0 14 0a7 7 0 1 0-14 0m18 11l-6-6"/></svg>
                </button>
            </div>
            <canvas id="sales"></canvas>
        </div>
    </div>
</section>
@endsection

@section('js-script')
<script type="module">
    $(document).ready(function() {
        var orderData = @json($orderChartData);
        var chart = new Chart(document.querySelector('#sales'), {
            type: 'line',
            options: {
                plugins: {
                    legend: {
                    display: false
                    }
                }
            },
            data: {
                labels: orderData.periods,
                datasets: [{
                    data: orderData.totals,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            }
        });

        $('#filter').click(function() {
            var from = $('#from').val();
            var to = $('#to').val();
            window.location.href = `/admin?from=${from}&to=${to}`
        });  
    });
</script>
@endsection