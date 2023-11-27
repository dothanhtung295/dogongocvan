@extends('Ims::Ims')
@section('title')
    Thanh toán & đặt mua
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
                <div class="bs-wizard-step active">
                    <div class="bs-wizard-stepnum">
                        <span class="hidden-xs">Địa chỉ giao hàng</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <span class="bs-wizard-dot">2</span>
                </div>
                <div class="bs-wizard-step active">
                    <div class="bs-wizard-stepnum">
                        <span class="hidden-xs">Thanh toán &amp; đặt mua</span>
                    </div>
                    <div class="progress progress_1">
                        <div class="progress-bar"></div>
                    </div>
                    <span class="bs-wizard-dot">3</span>
                </div>
                <span class="bs-wizard-step bs-wizard-last">
                    <div class="bs-wizard-stepnum">
                        <span class="hidden-xs">Hoàn tất</span>
                    </div>
                    <span class="bs-wizard-dot">4</span>
                </span>
            </div>
            <h3 class="font-LexonRegular text-[18px]">Hoàn tất đơn hàng</h3>

            <div class="mx-auto md:w-[65%] mt-[30px]">
                <h3 class="font-LexonMedium text-[16px] md:text-[18px] mb-[20px]">{{$ims['global_lang']['complete_order'] ?? ''}}</h3>
                <a href="{{route('product')}}" class="p-[10px] block w-fit mx-auto bg-[#d9d9d9]">Tiếp tục mua hàng</a>
            </div>

        </div>
    </main>
@endsection

@section('js')
    <script type="module">
        $(function() {
            @if (session()->has('success'))
                Swal.fire({
                    icon: 'success',
                    title: '{{session('success')}}'
                })
            @endif
        });
    </script>
@endsection
