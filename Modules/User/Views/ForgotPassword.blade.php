@extends('Ims::Ims')
@section('title')
    {{ $user['setting']['user_meta_title'] ?? '' }}
@endsection
@section('meta')
    <meta name="description" content="{{ $user['setting']['user_meta_desc'] ?? '' }}" />
    <meta name="keywords" content="{{ $user['setting']['user_meta_key'] ?? '' }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" name="title" content="{{ $user['setting']['user_meta_title'] ?? '' }}" />
    <meta property="og:description" content="{{ $user['setting']['user_meta_desc'] ?? '' }}" />
    <meta property="og:url" content={{ $ims['url'] ?? '' }} />
    <meta property="og:image" content={{ route('uploads', $ims['logo']->content ?? '') }} />
@endsection

@section('css')
    {{-- <link rel="stylesheet" href="{{ mix('css/user.css') }}"> --}}
@endsection
@section('content')
    <main class="font-LexonLight min-h-screen cursor-default text-[#303036] container">
        <div class="mt-[81px] w-full md:w-[40%] border border-[#c5c5c5] mx-auto shadow-full p-[20px]">
            <h3 class="font-LexonRegular text-[18px] text-center">Đặt lại mật khẩu</h3>
            <div class="wrapper">
                <div id="user_forgot_pass" class="user_form">
                    <form id="form_change_pass" name="form_change_pass" method="post" action="{{ route('user.update.password') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ request('token') ?? '' }}">
                        <input type="hidden" name="email" value="{{ request('email') ?? '' }}">
                        <div class="form-group mt-[15px]">
                            <label for="email" class="font-LexonRegular">Mật khẩu *</label>
                            <input type="password" name="password" value="{{ old('password') }}"
                                class="form-control password mt-[10px] h-[34px] w-full border border-[#ccc] p-[6px_12px] text-[14px] text-[#555555]" placeholder="Nhập mật khẩu" required>
                        </div>
                        <div class="form-group mt-[15px]">
                            <label for="repasword" class="font-LexonRegular">Nhập lại mật khẩu *</label>
                            <input type="password" name="repassword" value="{{ old('repassword') }}"
                                class="form-control repassword mt-[10px] h-[34px] w-full border border-[#ccc] p-[6px_12px] text-[14px] text-[#555555]" placeholder="Nhập lại mật khẩu" required>
                        </div>
                        <button class="mt-[15px] block mx-auto rounded border border-[#cd1233] bg-gradient-to-b from-[#e54d42] to-[#d72041] p-[8px_12px] text-white">Xác nhận</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('js')
    <script type="module">
        $(function() {
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
            if (password != repassword) {
                this.setCustomValidity('Mật khẩu không khớp')
            } else {
                this.setCustomValidity('');
            }
        });
        })
    </script>
@endsection
