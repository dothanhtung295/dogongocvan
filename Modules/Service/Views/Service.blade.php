@extends('Ims::Ims')
@section('title')
    {{ $service['setting']['service_meta_title'] ?? '' }}
@endsection
@section('meta')
    <meta name="description" content="{{ $service['setting']['service_meta_desc'] ?? '' }}" />
    <meta name="keywords" content="{{ $service['setting']['service_meta_key'] ?? '' }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" name="title" content="{{ $service['setting']['service_meta_title'] ?? '' }}" />
    <meta property="og:description" content="{{ $service['setting']['service_meta_desc'] ?? '' }}" />
    <meta property="og:url" content={{ request()->url() ?? '' }} />
    <meta property="og:image" content={{ route('uploads', $service['service_detail']->picture ?? '') }} />
@endsection
@section('css')
    <link rel="stylesheet" href="{{ mix('css/service.css') }}" />
@endsection
@section('content')
    @include('Ims::Component.Banner')
    <main class="cursor-default font-LexonLight min-h-screen text-[#3B3B3B] container">
        <h3 class="font-LexonBold text-[25px] text-center leading-[29px] mt-[30px] md:mt-[60px] text-[#530507] mb-[30px] uppercase">Dịch vụ</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-x-[15px] gap-y-[40px] pb-[40px]">
        {{-- <div class="flex flex-wrap"> --}}
            @forelse ($service['services'] as $item)
                <div class="group item item-service">
                    <div class="aspect-[392/551] relative">
                        <div class="absolute hidden group-hover:flex flex-col text-white bg-[#530507] w-full h-full px-[35px]">
                            <div class="my-auto text-center">
                                <p class="font-LexonMedium text-[14px] md:w-6/12 md:text-[20px] text-center mx-auto">{{ $item->title ?? '' }}</p>
                                <div class="mt-[25px] md:mt-[45px]">{!! html_entity_decode($item->short ?? '') !!}</div>
                                <div>
                                    <a href="{{ route('contact') }}" class="px-[46px] py-[13px] mt-[70px] bg-white text-[#530507] mx-auto block w-fit">Liên hệ</a>
                                </div>
                            </div>
                        </div>
                        <img data-src="{{ route('uploads', $item->picture ?? '') }}" alt="{{ $item->title ?? '' }}" class="w-full h-full object-cover lazyload">
                    </div>
                    <div class="text-[20px] group-hover:text-transparent font-LexonMedium mt-[15px] leading-[28px] text-center">{{ $item->title ?? '' }}</div>
                </div>
            @empty
                <span>Không có dữ liệu.</span>
            @endforelse
        </div>
    </main>
@endsection

@section('js')
    <script type="module">
        window.onload = function () {
            var header = $('.header-container').outerHeight();
            $('main').css('margin-top', header);
        }
    </script>
@endsection
