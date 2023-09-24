@extends('layouts.pageLayout1')

@section('title', 'Checkout')

@section('content')
<section class="px-5 md:px-12 lg:px-24 h-screen">
    <form action="{{ route('storeCheckout') }}" method="POST">
        @csrf
        <div class="flex flex-col gap-3 mb-5 md:gap-4">
            <label for="name" class="font-public font-semibold text-sm text-textBlack">
                Nama
            </label>
            <input type="text" id="name" name="name" class="h-12 p-6 font-quick text-sm border border-borderInput rounded-[10px] focus:outline-second md:h-14 md:text-base" />
        </div>
        <div class="flex flex-col gap-3 mb-5 md:gap-4">
            <label for="no_hp" class="font-public font-semibold text-sm text-textBlack">
                Nomor Handphone
            </label>
            <input type="text" id="no_hp" name="no_hp" class="h-12 p-6 font-quick text-sm border border-borderInput rounded-[10px] focus:outline-second md:h-14 md:text-base" />
        </div>
        <div class="flex flex-col gap-3 mb-5 md:gap-4">
            <label for="address" class="font-public font-semibold text-sm text-textBlack">
                Alamat
            </label>
            <textarea id="address" name="address" class="p-6 min-h-[8rem] font-quick text-sm border border-borderInput rounded-[10px] focus:outline-second md:min-h-[10rem] md:text-base"></textarea>
        </div>
        <div class="flex flex-col md:flex-row md:gap-10">
            <div class="flex flex-col gap-3 mb-5 md:gap-4 md:w-1/2">
                <label for="province" class="font-public font-semibold text-sm text-textBlack">
                    Provinsi
                </label>
                <select id="province" name="province" class="h-12 px-2 font-quick text-sm border border-borderInput rounded-[10px] focus:outline-second md:h-14 md:text-base">
                    <option value="">Pilih provinsi</option>
                    @foreach ($provinces as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col gap-3 mb-5 md:gap-4 md:w-1/2">
                <label for="city" class="font-public font-semibold text-sm text-textBlack">
                    Kota
                </label>
                <select id="city" name="city" class="h-12 px-2 font-quick text-sm border border-borderInput rounded-[10px] focus:outline-second disabled:bg-zinc-100 md:h-14 md:text-base" disabled>
                    <option value="">Pilih kota/kabupaten</option>
                </select>
            </div>
        </div>
        <div class="flex flex-col gap-3 mb-5 md:gap-4">
            <label for="zipcode" class="font-public font-semibold text-sm text-textBlack">
                Kode Pos
            </label>
            <input type="text" id="zipcode" name="zipcode" class="h-12 p-6 font-quick text-sm border border-borderInput rounded-[10px] focus:outline-second md:h-14 md:text-base" />
        </div>
        <div class="flex flex-col md:flex-row md:gap-10">
            <div class="flex flex-col gap-3 mb-5 md:gap-4 md:w-1/2">
                <label for="courier" class="font-public font-semibold text-sm text-textBlack">
                    Ekspedisi
                </label>
                <select id="courier" name="courier" class="h-12 px-2 font-quick text-sm border border-borderInput rounded-[10px] focus:outline-second md:h-14 md:text-base" required>
                    <option selected>Pilih kurir pengiriman</option>
                    <option value="jne">JNE</option>
                    <option value="tiki">Tiki</option>
                </select>
            </div>
            <div class="flex flex-col gap-3 mb-5 md:gap-4 md:w-1/2">
                <label for="shipping-cost" class="font-public font-semibold text-sm text-textBlack">
                    Estimasi Ongkir
                </label>
                <input type="text" id="shipping-cost" name="shipping_cost" class="h-12 p-6 font-quick text-sm border border-borderInput rounded-[10px] focus:outline-second md:h-14 md:text-base" disabled />
            </div>
        </div>
        <div class="flex gap-4 mt-5 md:gap-8">
            <img src="{{ asset('assets/product.png') }}" alt="product" class="rounded-lg w-36 md:w-48">
            <div>
                <h1 class="font-public font-semibold text-xl text-textBlack">Bionev Liquid</h1>
                <p class="font-quick font-medium mt-2">500gr</p>
                <p class="font-quick font-medium mt-2">Rp 98.000</p>
                <div class="flex justify-between items-center w-40 border px-6 py-3 mt-6 rounded-[60px]">
                    <span id="minus">-</span>
                    <input type="text" name="qty" class="w-10 text-center focus:outline-none" id="total" value="1" />
                    <span id="plus">+</span>
                </div>
            </div>
        </div>
        <button class="bg-button w-full py-3 mt-10 mb-5 font-public font-semibold text-lg text-white rounded-[60px] md:py-4">Beli</button>
    </form> 
</section>
@endsection

@section('js-script')
<script type="module">
    const minus = document.querySelector("#minus");
    let totalInput = document.querySelector("#total");
    const plus = document.querySelector("#plus");

    minus.addEventListener('click', () => {
        let count = parseInt(totalInput.value);
        if (count > 1) {
            count--
            totalInput.value = count;
        }
    });

    plus.addEventListener('click', () => {
        let count = parseInt(totalInput.value);
        count++
        totalInput.value = count;
    });

    $(document).ready(function () {
        $('#province').change(function() {
            let province = $('#province').val();
            if (province) {
                $('#city').removeAttr('disabled');
                $.ajax({
                    url: `/getCity/${province}`,
                    type: "GET",
                    success: function (data) {
                        let options = [];
                        data.city.forEach((city) => {
                            options.push({value: city.id, text: `${city.type} ${city.name}`});
                        });
                        
                        options.forEach((item) => {
                            var newOption = $("<option>").attr("value", item.value).text(item.text);
                            $('#city').append(newOption);
                        });
                    }
                });
            } else {
                $('#city').prop('disabled', true);
            };
        });

        $('#courier, #province, #city, #total').change(function() {
            let courier = $('#courier').val();
            let city = $('#city').val();
            let weight = parseInt($('#total').val()) * 500;

            $.ajax({
                url: `/shipping-cost?destination=${city}&weight=${weight}&courier=${courier}`,
                type: "GET",
                success: function (data) {
                    console.log(data[0].costs[1].cost[0].value);
                    $('#shipping-cost').attr("value", data[0].costs[1].cost[0].value);
                }
            });
        });

        $('#plus, #minus').click(function() {
            let courier = $('#courier').val();
            let city = $('#city').val();
            let weight = parseInt($('#total').val()) * 500;

            $.ajax({
                url: `/shipping-cost?destination=${city}&weight=${weight}&courier=${courier}`,
                type: "GET",
                success: function (data) {
                    console.log(data[0].costs[1].cost[0].value);
                    $('#shipping-cost').attr("value", data[0].costs[1].cost[0].value);
                }
            });
        });
    });
</script>
@endsection