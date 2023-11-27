@extends('Ims::Ims')
@section('title')
    {{ $about['setting']['about_meta_title'] ?? 'Đăng nhập' }}
@endsection
@section('meta')
    <meta name="description" content="{{ $about['setting']['about_meta_desc'] ?? '' }}" />
    <meta name="keywords" content="{{ $about['setting']['about_meta_key'] ?? '' }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" name="title" content="{{ $about['setting']['about_meta_title'] ?? '' }}" />
    <meta property="og:description" content="{{ $about['setting']['about_meta_desc'] ?? '' }}" />
    <meta property="og:url" content={{ $ims['url'] ?? '' }} />
    <meta property="og:image" content={{ route('uploads', $ims['logo']->content ?? '') }} />
@endsection

@section('css')
    <link rel="stylesheet" href="{{ mix('css/user.css') }}">
    <style>
        .register-email-container {
            display: none
        }
    </style>
@endsection
@section('content')
    @php
        $cities = getAllCity() ?: [];
    @endphp
    <main class="font-LexonLight main-container cursor-default bg-[#FCFCF8] text-[14px] text-[#303036]">
        <div class="register container mt-[81px]">
            <h3 class="font-LexonMedium border-separate border-b border-[#e0e0e0] text-center text-[18px] uppercase">Đăng ký tài khoản</h3>
            <form action="{{ route('register.post') }}" method="post" class="form-register">
                @csrf
                <div class="shadow-full m-[20px] mx-auto max-w-[740px] p-[20px]">
                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                        <div class="">
                            <div class="form-group">
                                <label for="email" class="font-LexonRegular">Email *</label>
                                {{-- <input type="email" name="email" pattern="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/" oninvalid="$(this).parent().find('span').text('Vui lòng nhập email hợp lệ')"
                                    oninput="$(this).parent().find('span').text('')" class="form-control email mt-[10px] h-[34px] w-full border border-[#ccc] p-[6px_12px] text-[14px] text-[#555555]"
                                    placeholder="Nhập email" required> --}}
                                <input type="email" name="email" value="{{ old('email') }}"
                                    class="form-control email mt-[10px] h-[34px] w-full border border-[#ccc] p-[6px_12px] text-[14px] text-[#555555]" placeholder="Nhập email" required>
                                <span class="error-email block h-[12px] text-[12px] text-[#e54d42]"></span>
                            </div>
                            <div class="form-group mt-[5px]">
                                <label for="password" class="font-LexonRegular">Mật khẩu *</label>
                                <input type="password" name="password" value="{{ old('password') }}"
                                    class="form-control password mt-[10px] h-[34px] w-full border border-[#ccc] p-[6px_12px] text-[14px] text-[#555555]" placeholder="Nhập mật khẩu" required>
                                <span class="error-password block h-[12px] text-[12px] text-[#e54d42]"></span>

                            </div>
                            <div class="form-group mt-[5px]">
                                <label for="repasword" class="font-LexonRegular">Nhập lại mật khẩu *</label>
                                <input type="password" name="repassword" value="{{ old('repassword') }}"
                                    class="form-control repassword mt-[10px] h-[34px] w-full border border-[#ccc] p-[6px_12px] text-[14px] text-[#555555]" placeholder="Nhập lại mật khẩu" required>
                                <span class="error-repassword block h-[12px] text-[12px] text-[#e54d42]"></span>

                            </div>
                            <div class="form-group mt-[5px]">
                                <label for="" class="font-LexonRegular">Họ và tên *</label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="form-control name mt-[10px] h-[34px] w-full border border-[#ccc] p-[6px_12px] text-[14px] text-[#555555]" placeholder="Nhập họ và tên" required>
                                <span class="error-name block h-[12px] text-[12px] text-[#e54d42]"></span>

                            </div>
                            <div class="form-group mt-[5px]">
                                <label for="phone" class="font-LexonRegular">Số điện thoại</label>
                                <input type="text" name="phone" value="{{ old('phone') }}"
                                    class="form-control phone mt-[10px] h-[34px] w-full border border-[#ccc] p-[6px_12px] text-[14px] text-[#555555]" placeholder="Nhập số điện thoại">
                                <span class="error-phone block h-[12px] text-[12px] text-[#e54d42]"></span>

                            </div>
                        </div>
                        <div>
                            <div class="form-group">
                                <label for="address" class="font-LexonRegular mb-[10px] block">Địa chỉ nhà</label>
                                {{-- <input type="email" name="email" pattern="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/" oninvalid="$(this).parent().find('span').text('Vui lòng nhập email hợp lệ')"
                                    oninput="$(this).parent().find('span').text('')" class="form-control email mt-[10px] h-[34px] w-full border border-[#ccc] p-[6px_12px] text-[14px] text-[#555555]"
                                    placeholder="Nhập email" required> --}}
                                <input type="text" name="address" class="form-control email h-[34px] w-full border border-[#ccc] p-[6px_12px] text-[14px] text-[#555555]" placeholder="Nhập địa chỉ nhà">
                            </div>
                            <div class="form-group mt-[15px]">
                                <label for="city" class="font-LexonRegular mb-[10px] block">Tỉnh / Thành phố</label>
                                <select name="city" id="city" class="w-full">
                                    <option value="">Chọn ---</option>
                                    @forelse ($cities as $item)
                                        <option value="{{ $item->code }}">{{ $item->title ?? '' }}</option>
                                    @empty
                                        <option value="">Dữ liệu đang được cập nhật</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group mt-[15px]">
                                <label for="district" class="font-LexonRegular mb-[10px] block">Quận / Huyện</label>
                                <select name="district" id="district" class="w-full">
                                    <option value="">Chọn ---</option>
                                </select>
                            </div>
                            <div class="form-group mt-[15px]">
                                <label for="ward" class="font-LexonRegular mb-[10px] block">Phường / Xã</label>
                                <select name="ward" id="ward" class="w-full">
                                    <option value="">Chọn ---</option>
                                </select>
                            </div>
                            <label for="ward" class="font-LexonRegular mb-[10px] block h-[35px]"></label>
                            <div class="form-group flex items-center">
                                <div class="relative w-1/2">
                                    <span class="material-icons-outlined load-new-captcha absolute bottom-[-5px] right-[-5px] cursor-pointer rounded-full bg-white !text-[14px]">autorenew</span>
                                    <img class="captcha-image" src="{{ captcha_src() }}" alt="">
                                </div>
                                <input type="text" class="form-control captcha ml-[20px] h-[34px] w-full border border-[#ccc] p-[6px_12px] text-[14px] text-[#555555]" placeholder="Nhập mã bảo mật"
                                    name="captcha">
                            </div>
                            <p class="error-captcha block h-[20px] text-right text-[12px] text-red-700"></p>

                        </div>
                    </div>
                    <div class="mt-[15px] flex justify-center">
                        <button class="mr-[10px] rounded border border-[#cd1233] bg-gradient-to-b from-[#e54d42] to-[#d72041] p-[8px_12px] text-white">Đăng ký</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection

@section('js')
    <script type="module">
        $(function($) {
            $('#city, #district, #ward').select2({});
            @if (session()->has('error'))
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: '{{ session()->get('error') }}',
                });
            @endif
        });

        $('.load-new-captcha').click(function() {
            $.loading.start();
            $.ajax({
                type: "get",
                url: '{{ route('captcha.render.re') }}',
                success: function(response) {
                    $.loading.end();
                    $('.captcha-image').attr('src', response.src);
                }
            });
        });

        $('input[name="email"]').keyup(function(e) {
            e.preventDefault();
            var email = $(this).val();
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (email.length == 0) {
                $(this).parent().find('span').text('Vui lòng nhập email');
            } else {
                if (!regex.test(email)) {
                    $(this).parent().find('span').text('Email không hợp lệ');
                } else {
                    var exist = false;
                    $.ajax({
                        type: "get",
                        url: '{{ route('email.check') }}',
                        data: {
                            email: email
                        },
                        success: function(response) {
                            if (response.errors) {
                                $('input[name="email"]').parent().find('span').text('Email này đã được đăng ký.');
                            } else {
                                $('input[name="email"]').parent().find('span').text('');
                            }
                        }
                    });
                }
            }
        });

        $('input[name="password"]').keyup(function() {
            var password = $(this).val();
            // var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (password.length == 0) {
                $(this).parent().find('span').text('Vui lòng nhập mật khẩu')
            } else {
                if (password.length < 8) {
                    $(this).parent().find('span').text('Mật khẩu phải từ 8 ký tự trở lên');
                } else {
                    $(this).parent().find('span').text('');
                }
            }
        });

        $('input[name="repassword"]').keyup(function() {
            var password = $('.password').val();
            var repassword = $(this).val();
            // var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (password != repassword) {
                $(this).parent().find('span').text('Mật khẩu không khớp')
            } else {
                $(this).parent().find('span').text('');
            }
        });

        $('input[name="name"]').keyup(function(e) {
            e.preventDefault();
            var name = $(this).val();
            var regex = /^([a-zA-Z-ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i;
            if (name.length == 0) {
                $(this).parent().find('span').text('Vui lòng nhập họ tên')
            } else {
                if (!regex.test(name)) {
                    $(this).parent().find('span').text('Họ tên không được chứa số và ký tự đặc biệt');
                } else {
                    $(this).parent().find('span').text('');
                }
            }
        });
        $('input[name="phone"]').keyup(function(e) {
            e.preventDefault();
            var name = $(this).val();
            var regex = /^(0)(3[2-9]|2[0-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}([0-9]?)$/;
            if (name.length == 0) {
                $(this).parent().find('span').text('')
            } else {
                if (!regex.test(name)) {
                    $(this).parent().find('span').text('Số điện thoại không đúng định dạng');
                } else {
                    $(this).parent().find('span').text('');
                }
            }
        });
        $('.form-register').submit(function(e) {
            e.preventDefault();
            var captcha = $('.captcha').val();
            // var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (captcha.length == 0) {
                $('.error-captcha').text('Vui lòng nhập mã bảo mật')
            } else {
                $.ajax({
                    type: "get",
                    url: '{{ route('captcha.check') }}',
                    data: {
                        captcha: captcha
                    },
                    success: function(response) {
                        var error2 = false;
                        if (response.errors) {
                            $('.error-captcha').text('Mã bảo mật không đúng');
                            $.loading.end();
                            return;
                        }
                        $('.error-captcha').text('');
                        $.loading.start();
                        $('.form-register').unbind('submit').submit();
                    }
                });
                // $(this).parent().find('span').text('');
            }
        });

        $('#city').change(function(e) {
            $.loading.start();
            var city = $(this).val();
            $.ajax({
                type: "get",
                url: '{{ route('get-district') }}',
                data: {
                    city: city
                },
                success: function(response) {
                    $.loading.end();
                    $('#district').html(response.html);
                }
            });
        })

        $('#district').change(function(e) {
            $.loading.start();
            var district = $(this).val();
            var city = $('#city').val();
            $.ajax({
                type: "get",
                url: '{{ route('get-ward') }}',
                data: {
                    city: city,
                    district: district
                },
                success: function(response) {
                    $.loading.end();
                    $('#ward').html(response.html);
                }
            });
        })
    </script>
@endsection
