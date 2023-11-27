@extends('Ims::Ims')
@section('title')
    Địa chỉ giao hàng
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
    <link rel="stylesheet" href="{{ mix('css/cart.css') }}" />
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

            <div class="bs-wizard max-md:hidden">
                <div class="bs-wizard-step active">
                    <div class="bs-wizard-stepnum">
                        <span>Đăng nhập</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <span class="bs-wizard-dot">1</span>
                </div>
                <div class="bs-wizard-step">
                    <div class="bs-wizard-stepnum">
                        <span class="hidden-xs">Địa chỉ giao hàng</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <span class="bs-wizard-dot">2</span>
                </div>
                <div class="bs-wizard-step disabled">
                    <div class="bs-wizard-stepnum">
                        <span class="hidden-xs">Thanh toán &amp; đặt mua</span>
                    </div>
                    <div class="progress progress_1">
                        <div class="progress-bar"></div>
                    </div>
                    <span class="bs-wizard-dot">3</span>
                </div>
                <span class="bs-wizard-step disabled bs-wizard-last">
                    <div class="bs-wizard-stepnum">
                        <span class="hidden-xs">Hoàn tất</span>
                    </div>
                    <span class="bs-wizard-dot">4</span>
                </span>
            </div>
            <h3 class="font-LexonRegular text-[18px]">Địa chỉ giao hàng</h3>
            <form action="{{ route('cart.checkout.step2.post') }}" method="post" class="form-register">
                @csrf
                <div class="shadow-full m-[20px] mx-auto p-[20px]">
                    <div class="flex max-md:flex-wrap justify-between">
                        <div class="sender w-full md:w-[48%]">
                            <p class="font-LexonMedium border-b border-[#ccc] py-[5px] text-[16px] uppercase text-[#9c9c9c]">Thông tin đặt hàng</p>
                            <div class="send-container">
                                <div class="form-group mt-[15px]">
                                    <label for="" class="font-LexonRegular">Họ và tên *</label>
                                    <input type="text" name="name_send" value="{{ auth()->user()->full_name ?? ($data['name_send'] ?? '') }}"
                                        class="form-control name mt-[10px] h-[34px] w-full border border-[#ccc] p-[6px_12px] text-[14px] text-[#555555]" placeholder="Nhập họ và tên" required>
                                </div>
                                <div class="form-group mt-[15px]">
                                    <label for="email" class="font-LexonRegular">Email *</label>
                                    <input type="email" name="email_send" value="{{ auth()->user()->email ?? ($data['email_send'] ?? '') }}"
                                        class="form-control email mt-[10px] h-[34px] w-full border border-[#ccc] p-[6px_12px] text-[14px] text-[#555555]" placeholder="Nhập email" required>

                                </div>
                                <div class="form-group mt-[15px]">
                                    <label for="phone" class="font-LexonRegular">Điện thoại *</label>
                                    <input type="text" name="phone_send" value="{{ auth()->user()->phone ?? ($data['phone_send'] ?? '') }}"
                                        class="form-control phone mt-[10px] h-[34px] w-full border border-[#ccc] p-[6px_12px] text-[14px] text-[#555555]" placeholder="Nhập số điện thoại">
                                </div>
                                <div class="form-group mt-[15px]">
                                    <label for="city" class="font-LexonRegular mb-[10px] block">Tỉnh / Thành phố</label>
                                    <select name="city_send" id="city-send" class="w-full">
                                        <option value="">Chọn ---</option>
                                        @forelse ($cities as $item)
                                            <option value="{{ $item->code }}" {{ in_array($item->code, [$data['city_send'] ?? 0, auth()->user()->province ?? 0]) ? 'selected' : '' }}>
                                                {{ $item->title ?? '' }}</option>
                                        @empty
                                            <option value="">Dữ liệu đang được cập nhật</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group mt-[15px]">
                                    <label for="district" class="font-LexonRegular mb-[10px] block">Quận / Huyện</label>
                                    <select name="district_send" id="district-send" class="w-full">
                                        <option value="">Chọn ---</option>
                                    </select>
                                </div>
                                <div class="form-group mt-[15px]">
                                    <label for="address" class="font-LexonRegular mb-[10px] block">Địa chỉ nhà</label>
                                    <input type="text" name="address_send" value="{{ auth()->user()->address ?? ($data['address_send'] ?? '') }}"
                                        class="form-control address h-[34px] w-full border border-[#ccc] p-[6px_12px] text-[14px] text-[#555555]" placeholder="Nhập địa chỉ nhà">

                                </div>
                            </div>
                        </div>
                        <div class="receiver w-full md:w-[48%] max-md:mt-[30px]">
                            <div class="md:flex items-center border-b border-[#ccc] max-md:pb-[20px]">
                                <p class="font-LexonMedium py-[5px] text-[16px] uppercase text-[#9c9c9c]">Thông tin nhận hàng</p>
                                <div class="md:ml-[20px]">
                                    <input type="checkbox" name="same-send-infor" id="same-send-infor" class="mr-[10px] h-[13px] w-[13px] cursor-pointer">
                                    <label for="same-send-infor" class="cursor-pointer">Giống thông tin đặt hàng</label>
                                </div>
                            </div>
                            <div class="receive-container">
                                <div class="form-group mt-[15px]">
                                    <label for="" class="font-LexonRegular">Họ và tên *</label>
                                    <input type="text" name="name_receive" value="{{ $data['name_receive'] ?? '' }}"
                                        class="form-control name mt-[10px] h-[34px] w-full border border-[#ccc] p-[6px_12px] text-[14px] text-[#555555]" placeholder="Nhập họ và tên" required>
                                </div>
                                <div class="form-group mt-[15px]">
                                    <label for="email" class="font-LexonRegular">Email *</label>
                                    <input type="email" name="email_receive" value="{{ $data['email_receive'] ?? '' }}"
                                        class="form-control email mt-[10px] h-[34px] w-full border border-[#ccc] p-[6px_12px] text-[14px] text-[#555555]" placeholder="Nhập email" required>

                                </div>
                                <div class="form-group mt-[15px]">
                                    <label for="phone" class="font-LexonRegular">Điện thoại *</label>
                                    <input type="text" name="phone_receive" value="{{ $data['phone_receive'] ?? '' }}"
                                        class="form-control phone mt-[10px] h-[34px] w-full border border-[#ccc] p-[6px_12px] text-[14px] text-[#555555]" placeholder="Nhập số điện thoại">
                                </div>
                                <div class="form-group mt-[15px]">
                                    <label for="city" class="font-LexonRegular mb-[10px] block">Tỉnh / Thành phố</label>
                                    <select name="city_receive" id="city-receive" class="w-full">
                                        <option value="">Chọn ---</option>
                                        @forelse ($cities as $item)
                                            <option value="{{ $item->code }}" {{ $item->code == ($data['city_receive'] ?? 0) ? 'selected' : '' }}>{{ $item->title ?? '' }}</option>
                                        @empty
                                            <option value="">Dữ liệu đang được cập nhật</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group mt-[15px]">
                                    <label for="district" class="font-LexonRegular mb-[10px] block">Quận / Huyện</label>
                                    <select name="district_receive" id="district-receive" class="w-full">
                                        <option value="">Chọn ---</option>
                                    </select>
                                </div>
                                <div class="form-group mt-[15px]">
                                    <label for="address" class="font-LexonRegular mb-[10px] block">Địa chỉ nhà</label>
                                    <input type="text" name="address_receive" value="{{ $data['address_receive'] ?? '' }}"
                                        class="form-control address h-[34px] w-full border border-[#ccc] p-[6px_12px] text-[14px] text-[#555555]" placeholder="Nhập địa chỉ nhà">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-[15px] flex justify-end">
                        <button type="submit" class="rounded border border-[#cd1233] bg-gradient-to-b from-[#e54d42] to-[#d72041] p-[8px_12px] text-white">Tiếp tục thanh toán</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection

@section('js')
    <script type="module">
        $(function($) { // console.log(citySend);
            $('#city-send, #district-send, #city-receive, #district-receive').select2({});
            @if (session()->has('error'))
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: '{{ session()->get('error') }}',
                });
            @endif

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
                    this.setCustomValidity('Vui lòng nhập email')
                } else {
                    if (!regex.test(email)) {
                        this.setCustomValidity('Email không hợp lệ');
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
                                    exist = true;
                                }
                                // error = response.errors;
                            }
                        });
                        if (exist) {
                            this.setCustomValidity('Email này đã được đăng ký.');
                        } else {
                            this.setCustomValidity('');
                        }
                    }
                }
            });

            $('input[name="password"]').keyup(function() {
                var password = $(this).val();
                // var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if (password.length == 0) {
                    this.setCustomValidity('Vui lòng nhập mật khẩu')
                } else {
                    if (password.length < 8) {
                        this.setCustomValidity('Mật khẩu phải từ 8 ký tự trở lên');
                    } else {
                        this.setCustomValidity('');
                    }
                }
            });

            $('input[name="repassword"]').keyup(function() {
                var password = $('.password').val();
                var repassword = $(this).val();
                // var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if (password != repassword) {
                    this.setCustomValidity('Mật khẩu không khớp')
                } else {
                    this.setCustomValidity('');
                }
            });

            $('input[name="name"]').keyup(function(e) {
                e.preventDefault();
                var name = $(this).val();
                var regex = /^([a-zA-Z-ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i;
                if (name.length == 0) {
                    this.setCustomValidity('Vui lòng nhập họ tên')
                } else {
                    if (!regex.test(name)) {
                        this.setCustomValidity('Họ tên không được chứa số và ký tự đặc biệt');
                    } else {
                        this.setCustomValidity('');
                    }
                }
            });

            $('#city-send').change(function(e) {
                $.loading.start();
                var city = $(this).val();
                $.ajax({
                    type: "get",
                    url: '{{ route('get-district') }}',
                    data: {
                        city: city,
                    },
                    success: function(response) {
                        $.loading.end();
                        $('#district-send').html(response.html);
                        if (districtSend !== 0) {
                            $('#district-send option[value="' + districtSend + '"]').prop('selected', true);
                        }
                    }
                });
            })

            $('#city-receive').change(function(e) {
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
                        $('#district-receive').html(response.html);
                        if (districtReceive !== 0) {
                            $('#district-receive option[value="' + districtReceive + '"]').prop('selected', true);
                        }
                    }
                });
            });
            let districtSend = 0;
            let districtReceive = 0;
            @if (!empty($data['city_send']))
                $('#city-send').change();
                districtSend = {{ $data['district_send'] ?? 0 }};
            @endif
            @if (!empty($data['city_receive']))
                $('#city-receive').change();
                districtReceive = {{ $data['district_receive'] ?? 0 }};
            @endif

            @if (!empty(auth()->user()->province))
                $('#city-send').change();
                districtSend = {{ auth()->user()->district ?? 0 }};
            @endif

            $('#same-send-infor').change(function (e) {
                var checked = $(this).is(':checked');
                if (checked) {
                    // $('.receive-container').hide();
                    // $('.send-container').parent().css('width', '100%');
                    $('.receive-container .name').val($('.send-container .name').val());
                    $('.receive-container .email').val($('.send-container .email').val());
                    $('.receive-container .phone').val($('.send-container .phone').val());
                    $('.receive-container #city-receive').val($('.send-container #city-send').val()).change();
                    setTimeout(() => {
                        $('.receive-container #district-receive').val($('.send-container #district-send').val()).change();
                    }, 1000);
                    $('.receive-container .address').val($('.send-container .address').val());
                } else {
                    $('.receive-container').show();
                    $('.send-container').parent().css('width', '48%');
                }
            })
        });
    </script>
@endsection
