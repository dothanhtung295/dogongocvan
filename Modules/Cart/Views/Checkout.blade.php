@extends('Ims::Ims')

@section('title')
    Giỏ hàng
@endsection

@section('meta')
    <meta name="description" content="{{ $product['product_detail']['meta_desc'] ?? '' }}" />
    <meta name="keywords" content="{{ $product['product_detail']['meta_key'] ?? '' }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" name="title" content="{{ $product['product_detail']['meta_title'] ?? '' }}" />
    <meta property="og:description" content="{{ $product['product_detail']['meta_desc'] ?? '' }}" />
    <meta property="og:url" content="{{ Request::url() ?? '' }}" />
    <meta property="og:image" content="{{ route('uploads', $product['product_detail']['picture'] ?? '') }}" />
@endsection

@section('css')
    <link rel="stylesheet" href="{{ mix('css/cart.css') }}" />
@endsection

@section('content')
    <main class="font-LexonLight cursor-default bg-[#FCFCF8] text-[14px] text-[#232323]">
        <div class="container mb-[30px] mt-[81px]">
            <div class="step-1">
                <div class="bs-wizard max-md:hidden">
                    <div class="bs-wizard-step">
                        <div class="bs-wizard-stepnum">
                            <span>Đăng nhập</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <span class="bs-wizard-dot">1</span>
                    </div>
                    <div class="bs-wizard-step disabled">
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

                <h3 class="font-LexonRegular text-[18px]">Khách hàng mới / Đăng nhập</h3>

                <div class="login mt-[30px] flex max-md:flex-wrap-reverse text-[14px]">
                    <div class="w-full md:w-[65%] border border-[#c5c5c5] p-[20px]">
                        <div class="mb-[10px] border border-[#ef5e09] p-[5px]">Nếu muốn đặt hàng không cần <b>ĐĂNG NHẬP</b> ấn vào nút <b>Tiếp tục</b> ở bên dưới.</div>
                        <form action="{{route('login.post')}}" method="POST" class="form-login">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="font-LexonRegular">Email</label>
                                {{-- <input type="email" name="email" pattern="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/" oninvalid="this.setCustomValidity('Vui lòng nhập email hợp lệ')"
                                    oninput="this.setCustomValidity('')" class="form-control email mt-[10px] h-[34px] w-full border border-[#ccc] p-[6px_12px] text-[14px] text-[#555555]"
                                    placeholder="Nhập email" required> --}}
                                    <input type="email" name="email" value="{{old('email')}}" pattern="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/" class="form-control email mt-[10px] h-[34px] w-full border border-[#ccc] p-[6px_12px] text-[14px] text-[#555555]"
                                    placeholder="Nhập email" required>

                            </div>
                            <div class="form-group mt-[15px]">
                                <label for="email" class="font-LexonRegular">Mật khẩu</label>
                                <input type="password" name="password" value="{{old('password')}}"
                                    class="form-control password mt-[10px] h-[34px] w-full border border-[#ccc] p-[6px_12px] text-[14px] text-[#555555]" placeholder="Nhập mật khẩu" required>
                            </div>
                            <div class="mt-[15px] inline-block">
                                <button class="mr-[10px] rounded border border-[#cd1233] bg-gradient-to-b from-[#e54d42] to-[#d72041] p-[8px_12px] text-white">Đăng nhập</button>
                                <a href="{{route('register')}}" class="inline-block h-[39px] rounded border border-[#97E7F8] bg-gradient-to-b from-[#97E7F8] to-[#00A0CE] p-[8px_12px] text-white">Đăng ký</a>
                            </div>
                            <div class="forget_password mt-[10px]">
                                Quên mật khẩu? Khôi phục mật khẩu <a href="javascript:void(0)" class="forgot-btn"><b>Tại đây</b></a>
                            </div>
                        </form>

                        <div class="hidden form-forgot">
                            <h3 class="text-[22px] ">Quên mật khẩu</h3>
                            <div class="wrapper">
                                Bước 1: Anh chị nhập theo yêu cầu bên dưới. Sau đó 1 email sẽ được gửi đến cho anh chị để xác nhận.<br>
                                Bước 2: Kiểm tra email (Có thể nằm trong spam). Click vào link để đổi mật khẩu mới<br>
                                Bước 3: Đổi lại mật khẩu của anh chị!<br>Chúc anh chị thành công!!!<br>
                                Vui lòng cung cấp thông tin dưới đây để khôi phục mật khẩu của bạn.
                                <div id="user_forgot_pass" class="user_form">

                                    <form id="form_change_pass" name="form_change_pass" method="post" action="{{route('forgot-password.post')}}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email" class="font-LexonRegular">Email</label>
                                            {{-- <input type="email" name="email" pattern="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/" oninvalid="this.setCustomValidity('Vui lòng nhập email hợp lệ')"
                                                oninput="this.setCustomValidity('')" class="form-control email mt-[10px] h-[34px] w-full border border-[#ccc] p-[6px_12px] text-[14px] text-[#555555]"
                                                placeholder="Nhập email" required> --}}
                                                <input type="email" name="email" value="{{old('email')}}" pattern="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/" class="form-control email mt-[10px] h-[34px] w-full border border-[#ccc] p-[6px_12px] text-[14px] text-[#555555]"
                                                placeholder="Nhập email" required>
                                                <span class="error-email block h-[12px] text-[12px] text-[#e54d42]"></span>

                                        </div>
                                        <button class="mr-[10px] mt-[10px] rounded border border-[#cd1233] bg-gradient-to-b from-[#e54d42] to-[#d72041] p-[8px_12px] text-white">Gửi</button>

                                    </form>

                                </div>
                            </div>
                        </div>
                        <a href="{{ route('cart.checkout.step2') }}" class="mt-[10px] flex w-fit items-center bg-[#ccc] p-[5px] text-[14px]">Tiếp tục đặt hàng <span
                                class="material-icons-outlined ml-[5px] rounded !text-[14px]">keyboard_double_arrow_right</span></a>
                    </div>
                    <div class="w-full md:w-[33%] p-[20px]">
                        <div class="flex items-center justify-between border-b border-[#c9c9c9] pb-[15px]">
                            <span>Đơn hàng ({{ count(getCart() ?: []) }}) sản phẩm</span>
                            <a href="{{ route('cart.index') }}" class="border border-[#d2d2d2] bg-gradient-to-b from-white to-[#e6e6e6] p-[4px_12px]">Sửa</a>
                        </div>
                        @foreach ($cart as $item)
                            <div class="item border-b border-[#c5c5c5] p-[5px]">
                                <b>{{ $item['qty'] }} x </b>
                                <span class="max-w-[65%] text-[#337ab7]">{{ $item['attributes']['name'] }}</span>
                                <span class="float-right">{{ price_format($item['price'] * $item['qty']) }}</span>
                            </div>
                        @endforeach
                        {{-- <p>Tạm tính <span class="float-right">{{ price_format(getTotal()) }}</span></p> --}}
                        <p class="font-LexonRegular border-t border-[#c5c5c5] px-[5px] py-[10px]">Tổng cộng <span class="float-right text-[18px] text-red-700">{{ price_format(getTotal()) }}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script type="module">
        $(function() {
            @if (session()->has('error'))
                Swal.fire({
                    icon: 'error',
                    text: '{{session('error')}}'
                })
            @endif
            @if (session()->has('success'))
                Swal.fire({
                    icon: 'success',
                    text: '{{session('success')}}'
                })
            @endif
            $('.forgot-btn').click(function () {
                $('.form-login').addClass('hidden');
                $('.form-forgot').removeClass('hidden');
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

            $('input[name="password"]').keyup(function () {
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
        });
    </script>
@endsection
