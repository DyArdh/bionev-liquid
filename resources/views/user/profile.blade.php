@extends('layouts.pageLayout1')

@section('title', 'Profile')

@section('content')
<section class="px-5 md:px-12 lg:px-24">
    <h1 class="font-public font-semibold text-xl mb-3">Biodata Diri</h1>
    <div class="font-quick text-sm md:text-base">
        <div class="grid grid-cols-4 mt-0.5 md:grid-cols-8 lg:grid-cols-12">
            <p class="col-span-1 md:col-span-2">Nama</p>
            <div class="col-span-3 md:col-span-5 md:gap-5 lg:gap-7">
                <p>{{ Auth::user()->name }}<button id="modalName" class="ms-5 cursor-pointer text-blue-500">Ubah</button></p>
            </div>
        </div>
        <div class="grid grid-cols-4 mt-0.5 md:grid-cols-8 lg:grid-cols-12">
            <p class="col-span-1 md:col-span-2">Tanggal Lahir</p>
            <div class="col-span-3 md:col-span-5 md:gap-5 lg:gap-7">
                <p>{{ date('d F Y', strtotime(Auth::user()->bod)) }}<button id="modalBoD" class="ms-5 cursor-pointer text-blue-500">Ubah</button></p>
            </div>
        </div>
        <div class="grid grid-cols-4 mt-0.5 md:grid-cols-8 lg:grid-cols-12">
            <p class="col-span-1 md:col-span-2">Jenis Kelamin</p>
            <div class="col-span-3 md:col-span-5 md:gap-5 lg:gap-7">
                <p>@if (Auth::user()->gender === 'male') Laki - Laki @else Perempuan @endif<button id="modalGender" class="ms-5 cursor-pointer text-blue-500">Ubah</button></p>
            </div>
        </div>
        <div class="grid grid-cols-4 mt-0.5 md:grid-cols-8 lg:grid-cols-12">
            <p class="col-span-1 md:col-span-2">Alamat</p>
            <div class="col-span-3 md:col-span-5 md:gap-5 lg:gap-7">
                <p>{{ Auth::user()->address }}<button id="modalAddress" class="ms-5 cursor-pointer text-blue-500">Ubah</button></p>  
            </div>
        </div>
        @if (Auth::user()->role === 'admin')
            <div class="grid grid-cols-4 mt-0.5 md:grid-cols-8 lg:grid-cols-12">
                <p class="col-span-1 md:col-span-2">Role</p>
                <div class="col-span-3 md:col-span-5 md:gap-5 lg:gap-7">
                    <p>{{ Auth::user()->role }}</p>  
                </div>
            </div>
        @endif
    </div>

    <h1 class="font-public font-semibold text-xl mt-4 mb-3">Kontak</h1>
    <div class="font-quick text-sm md:text-base">
        <div class="grid grid-cols-4 mt-0.5 md:grid-cols-8 lg:grid-cols-12">
            <p class="col-span-1 md:col-span-2">Email</p>
            <div class="col-span-3 md:col-span-5 md:gap-5 lg:gap-7">
                <p>{{ Auth::user()->email }}<button id="modalEmail" class="ms-5 cursor-pointer text-blue-500">Ubah</button></p>
            </div>
        </div>
        <div class="grid grid-cols-4 mt-0.5 md:grid-cols-8 lg:grid-cols-12">
            <p class="col-span-1 md:col-span-2">No. HP</p>
            <div class="col-span-3 md:col-span-5 md:gap-5 lg:gap-7">
                <p>{{ Auth::user()->phone }}<button id="modalNoHp" class="ms-5 cursor-pointer text-blue-500">Ubah</button></p>
            </div>
        </div>
    </div>
    <button id="modalPassword" class="font-quick text-sm border border-[#BDBDBD] rounded px-5 py-2 mt-3 md:text-base md:mt-4">Ubah Kata Sandi</button>
</section>
@endsection

@section('modal')
<!-- Modal container -->
<div id="modal" class="fixed inset-0 items-center justify-center bg-[#00000073] z-20 hidden">
    <!-- Modal content -->
    <div class="bg-white rounded-lg p-8 shadow-lg transform transition-opacity scale-95">
        <div class="flex justify-between items-baseline border-b mb-4 pb-3">
            <h2 class="text-xl text-center font-semibold" id="modalTitle"></h2>
            <button id="closeModal">
                <svg class="w-3" viewBox="0 0 384 512"><path d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/></svg>
            </button>
        </div>
        <p class="font-quick text-sm md:text-base" id="modalDescription"></p>
        <form class="mt-4 flex flex-col" id="formModal">@csrf</form>
        <button type="submit" id="submitBtn" class="w-full py-3 mt-6 bg-button rounded-md font-public font-semibold text-white">Simpan</button>
    </div>
</div>
@endsection

@section('js-script')
<script type="module">
    $(document).ready(function() {
        // Change Name
        $('#modalName').click(function() {
            $('#modal').removeClass('hidden');
            $('#modal').addClass('flex');
            $('#modal').addClass('animate-fade-in');
            modalContent(
                'Ubah Nama', 
                'Ubah nama anda dengan bijak. Pastikan nama sudah benar dan sesuai dengan identitas anda.',
                `<label for="name" class="font-public font-semibold">Nama</label>
                <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" class="w-full font-quick border border-borderInput rounded focus:outline-button px-4 py-3 mt-2" />`
            );

            $('#submitBtn').click(function() {
                const data = {
                    name: $('#formModal').find('input').val(),
                    _token: "{{ csrf_token() }}",
                    _method: 'PUT',
                }
                putAPI(data);
            });
        });

        // Change BoD
        $('#modalBoD').click(function() {
            $('#modal').removeClass('hidden');
            $('#modal').addClass('flex');
            $('#modal').addClass('animate-fade-in');
            modalContent(
                'Ubah Tanggal Lahir', 
                'Ubah tanggal lahir anda. Pastikan tanggal lahir sudah benar dan sesuai dengan identitas anda.',
                `<label for="bod" class="font-public font-semibold">Tanggal Lahir</label>
                <input type="date" id="bod" name="bod" value="{{ Auth::user()->bod }}" class="w-full font-quick border border-borderInput rounded focus:outline-button px-4 py-3 mt-2" />`
            );

            $('#submitBtn').click(function() {
                const data = {
                    bod: $('#formModal').find('input').val(),
                    _token: "{{ csrf_token() }}",
                    _method: 'PUT',
                }
                putAPI(data);
            });
        });

        // Change Gender
        $('#modalGender').click(function() {
            $('#modal').removeClass('hidden');
            $('#modal').addClass('flex');
            $('#modal').addClass('animate-fade-in');
            modalContent(
                'Ubah Jenis Kelamin', 
                'Ubah jenis kelamin anda. Pastikan jenis kelamin sudah benar dan sesuai dengan identitas anda.',
                `<label for="gender" class="font-public font-semibold">Jenis Kelamin</label>
                <select id="gender" name="gender" value="{{ Auth::user()->gender }}" class="w-full font-quick border border-borderInput rounded focus:outline-button px-4 py-3 mt-2">
                    <option value="male">Laki - Laki</option>
                    <option value="female">Perempuan</option>
                </select>`
            );

            $('#submitBtn').click(function() {
                const data = {
                    gender: $('#formModal').find('select').val(),
                    _token: "{{ csrf_token() }}",
                    _method: 'PUT',
                }
                putAPI(data);
            });
        });

        // Change Address
        $('#modalAddress').click(function() {
            $('#modal').removeClass('hidden');
            $('#modal').addClass('flex');
            $('#modal').addClass('animate-fade-in');
            modalContent(
                'Ubah Alamat', 
                'Ubah alamat anda. Pastikan alamat sudah benar dan sesuai dengan identitas anda.',
                `<label for="address" class="font-public font-semibold">Alamat</label>
                <textarea id="address" name="address" class="w-full min-h-[8rem] font-quick border border-borderInput rounded focus:outline-button md:min-h-[10rem] px-4 py-3 mt-2">{{ Auth::user()->address }}</textarea>`
            );

            $('#submitBtn').click(function() {
                const data = {
                    address: $('#formModal').find('textarea').val(),
                    _token: "{{ csrf_token() }}",
                    _method: 'PUT',
                }
                putAPI(data);
            });
        });

        // Change Email
        $('#modalEmail').click(function() {
            $('#modal').removeClass('hidden');
            $('#modal').addClass('flex');
            $('#modal').addClass('animate-fade-in');
            modalContent(
                'Ubah Email', 
                'Ubah email anda. Pastikan Email sudah benar dan sesuai dengan identitas anda.',
                `<label for="email" class="font-public font-semibold">Email</label>
                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" class="w-full font-quick border border-borderInput rounded focus:outline-button px-4 py-3 mt-2" />`
            );

            $('#submitBtn').click(function() {
                const data = {
                    email: $('#formModal').find('input').val(),
                    _token: "{{ csrf_token() }}",
                    _method: 'PUT',
                }
                putAPI(data);
            });
        });

        // Change No. HP
        $('#modalNoHp').click(function() {
            $('#modal').removeClass('hidden');
            $('#modal').addClass('flex');
            $('#modal').addClass('animate-fade-in');
            modalContent(
                'Ubah No. HP', 
                'Ubah no. hp anda. Pastikan no. hp sudah benar dan sesuai dengan identitas anda.',
                `<label for="phone" class="font-public font-semibold">No. HP</label>
                <input type="text" id="phone" name="phone" value="{{ Auth::user()->phone }}" class="w-full font-quick border border-borderInput rounded focus:outline-button px-4 py-3 mt-2" />`
            );

            $('#submitBtn').click(function() {
                const data = {
                    phone: $('#formModal').find('input').val(),
                    _token: "{{ csrf_token() }}",
                    _method: 'PUT',
                }
                putAPI(data);
            });
        });

        // Change Password
        $('#modalPassword').click(function() {
            $('#modal').removeClass('hidden');
            $('#modal').addClass('flex');
            $('#modal').addClass('animate-fade-in');
            modalContent(
                'Ubah Password', 
                'Jaga keamanan akun Anda dengan mengganti password lama Anda dengan yang baru.',
                `
                    <div id="errorBox" class="bg-red-500 px-4 py-3 font-quick font-medium text-white rounded hidden">
                        <p id="errorMessage"></p>
                    </div>
                    <div class="mt-3">
                        <label for="password" class="font-public font-semibold">Password Lama</label>
                        <input type="password" id="password" name="password" class="w-full font-quick border border-borderInput rounded focus:outline-button px-4 py-3 mt-2" />
                    </div>
                    <div class="mt-3">
                        <label for="newPassword" class="font-public font-semibold">Password Baru</label>
                        <input type="password" id="newPassword" name="newPassword" class="w-full font-quick border border-borderInput rounded focus:outline-button px-4 py-3 mt-2" />
                    </div>
                    <div class="mt-3">
                        <label for="confirmPassword" class="font-public font-semibold">Konfirmasi Password Baru</label>
                        <input type="password" id="confirmPassword" name="confirmPassword" class="w-full font-quick border border-borderInput rounded focus:outline-button px-4 py-3 mt-2" />
                    </div>
                `
            );

            $('#submitBtn').click(function() {
                const data = {
                    password: $('#formModal').find('input[id=password]').val(),
                    new_password: $('#formModal').find('input[id=newPassword]').val(),
                    confirm_password: $('#formModal').find('input[id=confirmPassword]').val(),
                    _token: "{{ csrf_token() }}",
                    _method: 'PUT',
                }
                
                $.ajax({
                    type: 'POST',
                    url: '/profile/changePassword',
                    data: data,
                    success: function () {
                        setInterval(() => {
                            location.reload()
                        }, 1000);
                    },
                    statusCode: {
                        400: function(res) {
                            $('#errorBox').removeClass('hidden');
                            $('#errorBox').addClass('block');
                            $('#errorMessage').text(res.responseJSON.message);
                        },
                        403: function(res) {
                            $('#errorBox').removeClass('hidden');
                            $('#errorBox').addClass('block');
                            $('#errorMessage').text(res.responseJSON.message);
                        }
                    },
                    fail: function (request) {
                        console.log(request);
                    }
                });
            });
        });

        $('#closeModal').on('click', function() {
            closeModal();
        });

        function modalContent(title, summary, form) {
            $('#modalTitle').text(title);
            $('#modalDescription').text(summary);
            $('#formModal').html(form);
        }

        function putAPI(data) {
            $.ajax({
                type: 'POST',
                url: '/profile/update',
                data: data,
                success: function () {
                    setInterval(() => {
                        location.reload()
                    }, 1000);
                },
                fail: function (request) {
                    console.log(request);
                }
            });
        }

        function closeModal() {
            $('#modal').addClass('hidden');
            $('#modal').removeClass('flex');
            $('#modal').removeClass('animate-fade-in');
        }   
    });
</script>
@endsection