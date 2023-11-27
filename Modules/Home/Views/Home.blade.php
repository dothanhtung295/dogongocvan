@extends('Ims::Ims')
@section('title')
    {{ $home['setting']['home_meta_title'] ?? '' }}
@endsection
@section('meta')
    <meta name="description" content="{{ $home['setting']['home_meta_desc'] ?? '' }}" />
    <meta name="keywords" content="{{ $home['setting']['home_meta_key'] ?? '' }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" name="title" content="{{ $home['setting']['home_meta_title'] ?? '' }}" />
    <meta property="og:description" content="{{ $home['setting']['home_meta_desc'] ?? '' }}" />
    <meta property="og:url" content={{ $ims['url'] ?? '' }} />
    <meta property="og:image" content={{ route('uploads', $ims['logo']->content ?? '') }} />
@endsection

@section('css')
    <link rel="stylesheet" href="{{ mix('css/home.css') }}">
@endsection

@section('content')
    <main class="font-LexonLight cursor-default bg-[#FCFCF8] text-[#232323]">
        {{-- banner --}}
        <section class="w-full max-md:h-[70vh]">
            <div class="{{ count($ims['banner_main']) > 1 ? 'banner-main' : '' }} swiper relative w-full">
                <div class="swiper-wrapper w-full">
                    @foreach ($ims['banner_main'] as $item)
                        <div class="swiper-slide relative w-full">
                            <div class="absolute top-[25%] z-[1] w-full text-[30px] text-white lg:text-[50px]">
                                <div class="container">
                                    <p class="font-CormorantGaramondRegular text-[30px] lg:text-[61px] lg:leading-[74px]">Đồ gỗ nội thất</p>
                                    <h2 class="font-LexonBold text-[40px] uppercase lg:text-[80px] lg:leading-[100px]">Ngọc Văn</h2>
                                    <span class="font-LexonLight mt-[20px] block text-[19px]">{!! html_entity_decode($item->short ?? '') !!}</span>
                                    <a href="{{ route('contact') }}" class="font-LexonRegular mt-[70px] flex w-fit items-center border border-white px-[26px] py-[15px] text-[16px]">
                                        <span>Liên hệ ngay</span>
                                        <svg class="ml-[10px]" xmlns="http://www.w3.org/2000/svg" width="20" height="12.716" viewBox="0 0 20 12.716">
                                            <path id="Path_134434" data-name="Path 134434"
                                                d="M0,6.258c.128-.4.437-.481.813-.481,7.376,0,9.461,0,16.837,0h.369c-.106-.115-.168-.186-.235-.253L13.4,1.132c-.047-.047-.1-.092-.139-.141a.579.579,0,0,1-.019-.822.571.571,0,0,1,.818.007c.056.049.108.1.16.154l5.467,5.476c.408.409.411.688.009,1.091l-5.553,5.564a.592.592,0,0,1-.871.108.548.548,0,0,1-.091-.736,2.244,2.244,0,0,1,.246-.276Q15.612,9.369,17.8,7.182c.062-.062.121-.128.23-.242h-.363c-7.384,0-9.478,0-16.862,0A.761.761,0,0,1,0,6.506Z"
                                                fill="#fff" />
                                        </svg>

                                    </a>
                                </div>
                            </div>
                            <div class="relative h-full w-full max-md:h-[70vh]">
                                <div class="shadow-banner absolute h-full w-full">
                                    <div class="to-none absolute left-0 top-0 h-1/3 w-full bg-gradient-to-b from-[#2C1100]"></div>
                                    <div class="to-none absolute left-0 top-0 h-full w-3/4 bg-gradient-to-r from-[#2C1100]"></div>
                                </div>
                                <img class="lazyload h-full w-full object-cover" width="1366px" height="685px" data-src="{{ route('uploads', $item->content ?? '') }}" alt="{{ $item->title ?? '' }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        {{-- end abnner --}}
        {{-- product focus --}}
        @if (!empty($home['products_focus']))
            <section class="product-focus-container container mt-[40px]">
                <p class="title text-center uppercase">Sản phẩm nổi bật</p>
                <div class="relative">
                    <div class="absolute top-[-50px] flex w-full justify-between lg:top-[28%]">
                        <div class="prev-btn flex h-[30px] w-[30px] items-center justify-center rounded-full border border-[#7F7F7F] lg:h-[50px] lg:w-[50px]">
                            <svg class="rotate-[270deg] max-lg:w-[10px]" xmlns="http://www.w3.org/2000/svg" width="12.175" height="19.148" viewBox="0 0 12.175 19.148">
                                <path id="Path_105159" data-name="Path 105159"
                                    d="M0,6.183c.123.386.418.46.779.46,7.062,0,9.059,0,16.121,0h.353c-.1.11-.161.178-.225.243l-4.194,4.208c-.045.045-.091.088-.133.135a.554.554,0,0,0-.019.787.546.546,0,0,0,.784-.007c.053-.047.1-.1.153-.148l5.234-5.243c.391-.392.394-.659.008-1.045L13.545.244a.567.567,0,0,0-.834-.1.525.525,0,0,0-.087.7,2.149,2.149,0,0,0,.235.265Q14.948,3.2,17.038,5.3c.06.06.116.122.22.232h-.347c-7.07,0-9.074,0-16.144,0A.728.728,0,0,0,0,5.946Z"
                                    transform="translate(0 19.148) rotate(-90)" fill="#3a3a3a" />
                            </svg>
                        </div>
                        <div class="next-btn flex h-[30px] w-[30px] items-center justify-center rounded-full border border-[#7F7F7F] lg:h-[50px] lg:w-[50px]">
                            <svg class="rotate-[270deg] max-lg:w-[10px]" xmlns="http://www.w3.org/2000/svg" width="12.175" height="19.148" viewBox="0 0 12.175 19.148">
                                <path id="Path_105159" data-name="Path 105159"
                                    d="M0,5.992c.123-.386.418-.46.779-.46,7.062,0,9.059,0,16.121,0h.353c-.1-.11-.161-.178-.225-.243L12.834,1.084C12.789,1.039,12.743,1,12.7.949a.554.554,0,0,1-.019-.787.546.546,0,0,1,.784.007c.053.047.1.1.153.148l5.234,5.243c.391.392.394.659.008,1.045l-5.317,5.327a.567.567,0,0,1-.834.1.525.525,0,0,1-.087-.7,2.149,2.149,0,0,1,.235-.265q2.089-2.1,4.179-4.189c.06-.06.116-.122.22-.232h-.347c-7.07,0-9.074,0-16.144,0A.728.728,0,0,1,0,6.229Z"
                                    transform="translate(12.175) rotate(90)" fill="#3a3a3a" />
                            </svg>
                        </div>
                    </div>

                    <div class="products-focus mx-auto mt-[20px] w-full lg:w-[86.74%] swiper">
                        <div class="swiper-wrapper">
                            @foreach ($home['products_focus'] as $item)
                                <div class="swiper-slide">
                                    <div class="item mx-auto flex flex-col justify-between" loading="lazy">
                                        <div>
                                            <div class="w-full border border-[#DED9CA] p-[5px]">
                                                <a href="{{ route('product.detail', [$item->group, $item]) }}" class="aspect-[325/242]">
                                                    <img data-src="{{ route('thumbs', $item->picture ?? '') . '?w=325&h=242&fit=crop' }}" height="242" width="325" alt="{{ $item->title ?? '' }}"
                                                        class="lazyload w-full md:max-w-[325px] object-cover">
                                                </a>
                                            </div>
                                            <div class="max-md:hidden">
                                                <a href="{{ route('product', $item->group) }}" class="group-product mt-[17px] block text-[14px] uppercase">{{ $item->group->title ?? '' }}</a>
                                                <a href="{{ route('product.detail', [$item->group, $item]) }}"
                                                    class="font-CormorantGaramondSemiBold mt-[10px] block text-[16px] uppercase md:text-[23px]">{{ $item->title ?? '' }}</a>
                                            </div>
                                            <div class="md:hidden">
                                                <a href="{{ route('product', $item->group) }}" class="group-product mt-[17px] block text-[14px] uppercase">{{ $item->group->title_limit ?? '' }}</a>
                                                <a href="{{ route('product.detail', [$item->group, $item]) }}"
                                                    class="font-CormorantGaramondSemiBold mt-[10px] block text-[16px] uppercase md:text-[23px]">{{ $item->title_limit ?? '' }}</a>
                                            </div>
                                        </div>
                                        <span class="font-LexonRegular mt-[16px] block text-[12px] text-[#CF0005] md:text-[15px]">{{ $item->price == 0 ? 'Giá liên hệ' : price_format($item->price) }}</span>
                                    </div>
                                    {{-- <div class="swiper-lazy-preloader"></div> --}}
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </section>
        @endif
        {{-- end product focus --}}

        @if (!empty($home['groups_focus']))
            <section class="container md:mt-[60px]">
                <div class="mb-[20px] flex items-center justify-between">
                    <p class="title uppercase">Danh mục phổ biến</p>
                    <a href="{{ route('product') }}" class="flex items-center">
                        <span class="font-LexonRegular pr-[8px] text-[15px]">Xem tất cả</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="12.716" viewBox="0 0 20 12.716">
                            <path id="Path_134453" data-name="Path 134453"
                                d="M0,6.258c.128-.4.437-.481.813-.481,7.376,0,9.461,0,16.837,0h.369c-.106-.115-.168-.186-.235-.253L13.4,1.132c-.047-.047-.1-.092-.139-.141a.579.579,0,0,1-.019-.822.571.571,0,0,1,.818.007c.056.049.108.1.16.154l5.467,5.476c.408.409.411.688.009,1.091l-5.553,5.564a.592.592,0,0,1-.871.108.548.548,0,0,1-.091-.736,2.244,2.244,0,0,1,.246-.276Q15.612,9.369,17.8,7.182c.062-.062.121-.128.23-.242h-.363c-7.384,0-9.478,0-16.862,0A.761.761,0,0,1,0,6.506Z"
                                fill="#3a3a3a" />
                        </svg>
                    </a>
                </div>

                @php
                    $arr1 = [$home['groups_focus'][0] ?? [], $home['groups_focus'][1] ?? []];
                @endphp
                <div class="grid grid-cols-1 gap-[20px] md:grid-cols-2">
                    @foreach ($arr1 as $key => $item)
                        <div class="group-item relative overflow-hidden">
                            <div class="item absolute h-full w-full bg-[#530507] text-white">
                                <div class="flex h-full w-full flex-col items-center justify-center px-[10px]">
                                    <p class="font-LexonSemiBold pb-[15px] text-[16px] md:text-[25px]">{{ $item->title ?? '' }}</p>
                                    <span class="text-[15px]">{!! html_entity_decode($item->short ?? '') !!}</span>
                                    <a href="{{ route('product', $item) }}"
                                        class="font-LexonRegular mt-[30px] flex w-fit items-center border border-white bg-white px-[10px] py-[5px] text-[16px] text-[#530507] lg:px-[25px] lg:py-[15px]">
                                        <span>Xem chi tiết </span>
                                        <svg class="ml-[10px]" xmlns="http://www.w3.org/2000/svg" width="20" height="12.716" viewBox="0 0 20 12.716">
                                            <path id="Path_134434" data-name="Path 134434"
                                                d="M0,6.258c.128-.4.437-.481.813-.481,7.376,0,9.461,0,16.837,0h.369c-.106-.115-.168-.186-.235-.253L13.4,1.132c-.047-.047-.1-.092-.139-.141a.579.579,0,0,1-.019-.822.571.571,0,0,1,.818.007c.056.049.108.1.16.154l5.467,5.476c.408.409.411.688.009,1.091l-5.553,5.564a.592.592,0,0,1-.871.108.548.548,0,0,1-.091-.736,2.244,2.244,0,0,1,.246-.276Q15.612,9.369,17.8,7.182c.062-.062.121-.128.23-.242h-.363c-7.384,0-9.478,0-16.862,0A.761.761,0,0,1,0,6.506Z"
                                                fill="#530507" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="image w-full">
                                <img data-src="{{ route('thumbs', $item->picture ?? '') . '?w=593&h=455&fit=crop' }}" alt="{{ $item->title ?? '' }}" class="lazyload w-full object-cover">
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-[20px] grid grid-cols-1 gap-[20px] md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($home['groups_focus'] as $key => $item)
                        @if ($key < 2)
                            @continue
                        @endif
                        <div class="group-item relative overflow-hidden">
                            <div class="item absolute h-full w-full bg-[#530507] text-white">
                                <div class="flex h-full w-full flex-col items-center justify-center px-[10px]">
                                    <p class="font-LexonSemiBold pb-[15px] text-[16px] md:text-[25px]">{{ $item->title ?? '' }}</p>
                                    <span class="text-[15px]">{!! html_entity_decode($item->short ?? '') !!}</span>
                                    <a href="{{ route('product', $item) }}"
                                        class="font-LexonRegular mt-[30px] flex w-fit items-center border border-white bg-white px-[10px] py-[5px] text-[16px] text-[#530507] lg:px-[25px] lg:py-[15px]">
                                        <span>Xem chi tiết </span>
                                        <svg class="ml-[10px]" xmlns="http://www.w3.org/2000/svg" width="20" height="12.716" viewBox="0 0 20 12.716">
                                            <path id="Path_134434" data-name="Path 134434"
                                                d="M0,6.258c.128-.4.437-.481.813-.481,7.376,0,9.461,0,16.837,0h.369c-.106-.115-.168-.186-.235-.253L13.4,1.132c-.047-.047-.1-.092-.139-.141a.579.579,0,0,1-.019-.822.571.571,0,0,1,.818.007c.056.049.108.1.16.154l5.467,5.476c.408.409.411.688.009,1.091l-5.553,5.564a.592.592,0,0,1-.871.108.548.548,0,0,1-.091-.736,2.244,2.244,0,0,1,.246-.276Q15.612,9.369,17.8,7.182c.062-.062.121-.128.23-.242h-.363c-7.384,0-9.478,0-16.862,0A.761.761,0,0,1,0,6.506Z"
                                                fill="#530507" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="image w-full">
                                <img data-src="{{ route('thumbs', $item->picture ?? '') . '?w=593&h=455&fit=crop' }}" alt="{{ $item->title ?? '' }}" class="lazyload w-full object-cover">
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
        {{--  --}}
        {{-- new products --}}
        @if (!empty($home['products_new']))
            <section class="products-new-container container mt-[30px] md:mt-[60px]">
                <div class="mb-[5px] flex items-center justify-between md:mb-[20px]">
                    <p class="title uppercase">Sản phẩm mới</p>
                    <a href="{{ route('product') }}" class="flex items-center">
                        <span class="font-LexonRegular pr-[8px] text-[15px]">Xem tất cả</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="12.716" viewBox="0 0 20 12.716">
                            <path id="Path_134453" data-name="Path 134453"
                                d="M0,6.258c.128-.4.437-.481.813-.481,7.376,0,9.461,0,16.837,0h.369c-.106-.115-.168-.186-.235-.253L13.4,1.132c-.047-.047-.1-.092-.139-.141a.579.579,0,0,1-.019-.822.571.571,0,0,1,.818.007c.056.049.108.1.16.154l5.467,5.476c.408.409.411.688.009,1.091l-5.553,5.564a.592.592,0,0,1-.871.108.548.548,0,0,1-.091-.736,2.244,2.244,0,0,1,.246-.276Q15.612,9.369,17.8,7.182c.062-.062.121-.128.23-.242h-.363c-7.384,0-9.478,0-16.862,0A.761.761,0,0,1,0,6.506Z"
                                fill="#3a3a3a" />
                        </svg>
                    </a>
                </div>
                <div class="relative max-md:pt-[40px]">
                    <div class="absolute top-0 z-[2] flex w-full items-end gap-[10px] max-md:justify-end max-md:pb-[10px] md:flex-col lg:top-[35%]">
                        <div class="prev-btn flex h-[30px] w-[30px] items-center justify-center rounded-full border border-[#7F7F7F] lg:h-[50px] lg:w-[50px]">
                            <svg class="max-lg:w-[10px] max-md:rotate-[270deg]" xmlns="http://www.w3.org/2000/svg" width="12.175" height="19.148" viewBox="0 0 12.175 19.148">
                                <path id="Path_105159" data-name="Path 105159"
                                    d="M0,6.183c.123.386.418.46.779.46,7.062,0,9.059,0,16.121,0h.353c-.1.11-.161.178-.225.243l-4.194,4.208c-.045.045-.091.088-.133.135a.554.554,0,0,0-.019.787.546.546,0,0,0,.784-.007c.053-.047.1-.1.153-.148l5.234-5.243c.391-.392.394-.659.008-1.045L13.545.244a.567.567,0,0,0-.834-.1.525.525,0,0,0-.087.7,2.149,2.149,0,0,0,.235.265Q14.948,3.2,17.038,5.3c.06.06.116.122.22.232h-.347c-7.07,0-9.074,0-16.144,0A.728.728,0,0,0,0,5.946Z"
                                    transform="translate(0 19.148) rotate(-90)" fill="#3a3a3a" />
                            </svg>
                        </div>
                        <div class="next-btn flex h-[30px] w-[30px] items-center justify-center rounded-full border border-[#7F7F7F] lg:h-[50px] lg:w-[50px]">
                            <svg class="max-lg:w-[10px] max-md:rotate-[270deg]" xmlns="http://www.w3.org/2000/svg" width="12.175" height="19.148" viewBox="0 0 12.175 19.148">
                                <path id="Path_105159" data-name="Path 105159"
                                    d="M0,5.992c.123-.386.418-.46.779-.46,7.062,0,9.059,0,16.121,0h.353c-.1-.11-.161-.178-.225-.243L12.834,1.084C12.789,1.039,12.743,1,12.7.949a.554.554,0,0,1-.019-.787.546.546,0,0,1,.784.007c.053.047.1.1.153.148l5.234,5.243c.391.392.394.659.008,1.045l-5.317,5.327a.567.567,0,0,1-.834.1.525.525,0,0,1-.087-.7,2.149,2.149,0,0,1,.235-.265q2.089-2.1,4.179-4.189c.06-.06.116-.122.22-.232h-.347c-7.07,0-9.074,0-16.144,0A.728.728,0,0,1,0,6.229Z"
                                    transform="translate(12.175) rotate(90)" fill="#3a3a3a" />
                            </svg>
                        </div>
                    </div>
                    <div class="products-new w-full md:h-[420px] swiper">
                        <div class="swiper-wrapper">
                            @foreach ($home['products_new'] as $item)
                                <div class="swiper-slide">
                                    <div class="lg:flex">
                                        <div class="image w-full lg:w-[42.28%] my-auto">
                                            <a href="{{ route('product.detail', [$item->group, $item]) }}">
                                                <img src="{{ route('thumbs', $item->picture ?? '') . '?w=510&h=420&fit=crop' }}" alt="{{ $item->title ?? '' }}"
                                                    class="w-full max-w-[510px] object-cover">
                                            </a>
                                        </div>
                                        <div class="w-full lg:ml-[-40px] lg:w-[52.63%] my-auto">
                                            <div class="flex flex-col justify-between rounded-[20px] bg-[#fff] p-[15px] lg:border lg:border-[#DED9CA] lg:bg-opacity-20 lg:px-[14.61%] lg:py-[40px] lg:brightness-[1.03] lg:backdrop-blur-[3px]"
                                                style="height: calc(100% - 50px);">
                                                <a href="{{ route('product.detail', [$item->group, $item]) }}">
                                                    <p class="group-product">{{ $item->group->title ?? '' }}</p>
                                                    <p class="font-CormorantGaramondSemiBold mt-[10px] text-[15px] uppercase lg:mt-[20px] lg:text-[30px]">{{ $item->title ?? '' }}</p>
                                                    <div class="py-[30px] max-md:hidden">{{ $item->short_limit ?? '' }}</div>
                                                    <div class="py-[10px] md:hidden">{{ \Str::limit($item->short_limit ?? '', 30) }}</div>
                                                    <span
                                                        class="font-LexonRegular block mb-[10px] text-[15px] text-[#CF0005] max-lg:pb-[10px] md:text-[20px]">{{ $item->price == 0 ? 'Giá liên hệ' : price_format($item->price) }}</span>
                                                </a>
                                                <a href="{{ route('product.detail', [$item->group, $item]) }}"
                                                    class="font-LexonRegular flex w-fit items-center bg-[#CE4D00] p-[15px] text-[16px] text-white max-lg:hidden lg:px-[30px] lg:py-[15px]">
                                                    <span>Mua ngay</span>
                                                    <svg class="ml-[10px]" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
                                                        <g id="Group_58967" data-name="Group 58967" transform="translate(-230 -557)">
                                                            <rect id="Rectangle_17640" data-name="Rectangle 17640" width="22" height="2" rx="1"
                                                                transform="translate(242 557) rotate(90)" fill="#fff" />
                                                            <rect id="Rectangle_17639" data-name="Rectangle 17639" width="22" height="2" rx="1" transform="translate(230 567)"
                                                                fill="#fff" />
                                                        </g>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @endif
        {{--  --}}
        {{-- product --}}
        @if (!empty($home['products_group_focus']))
            @foreach ($home['products_group_focus'] as $item)
                <section class="container mt-[30px] md:mt-[52px]">
                    <div class="mb-[10px] flex items-center justify-between">
                        <p class="title uppercase">{{ $item->title ?? '' }}</p>
                        <a href="{{ route('product', $item) }}" class="flex items-center">
                            <span class="font-LexonRegular pr-[8px] text-[15px]">Xem tất cả</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="12.716" viewBox="0 0 20 12.716">
                                <path id="Path_134453" data-name="Path 134453"
                                    d="M0,6.258c.128-.4.437-.481.813-.481,7.376,0,9.461,0,16.837,0h.369c-.106-.115-.168-.186-.235-.253L13.4,1.132c-.047-.047-.1-.092-.139-.141a.579.579,0,0,1-.019-.822.571.571,0,0,1,.818.007c.056.049.108.1.16.154l5.467,5.476c.408.409.411.688.009,1.091l-5.553,5.564a.592.592,0,0,1-.871.108.548.548,0,0,1-.091-.736,2.244,2.244,0,0,1,.246-.276Q15.612,9.369,17.8,7.182c.062-.062.121-.128.23-.242h-.363c-7.384,0-9.478,0-16.862,0A.761.761,0,0,1,0,6.506Z"
                                    fill="#3a3a3a" />
                            </svg>
                        </a>
                    </div>
                    <div class="products mb-[40px] flex flex-wrap">
                        @forelse ($item->products as $item1)
                            <div class="item flex w-full flex-col justify-between border border-transparent p-[10px] hover:border-[#DED9CA] max-md:my-[10px] max-md:border md:w-1/3">
                                <div>
                                    <a href="{{ route('product.detail', [$item, $item1]) }}" class="block aspect-[382/300]">
                                        <img data-src="{{ route('thumbs', $item1->picture ?? '') . '?w=382&h=300&fit=crop' }}" alt="{{ $item1->title ?? '' }}" class="lazyload w-full object-cover">
                                    </a>
                                    <a href="{{ route('product', $item) }}" class="font-LexonRegular mt-[18px] block text-[12px] uppercase text-[#CE4D00] md:text-[14px]">{{ $item->title ?? '' }}</a>
                                    <a href="{{ route('product.detail', [$item, $item1]) }}"
                                        class="font-CormorantGaramondSemiBold mt-[5px] block text-[18px] uppercase md:text-[23px]">{{ $item1->title ?? '' }}</a>
                                </div>
                                <div class="">
                                    <div class="font-LexonLight my-[14px] line-clamp-2 max-md:text-[13px]">{{ $item1->short_limit ?? '' }}</div>
                                    <span
                                        class="font-LexonRegular mb-[10px] block text-[12px] text-[#CF0005] md:text-[15px]">{{ $item1->price == 0 ? 'Giá liên hệ' : price_format($item1->price) }}</span>
                                </div>
                            </div>
                        @empty
                            <span>Đang cập nhật...</span>
                        @endforelse
                    </div>
                </section>
            @endforeach
        @endif
        {{--  --}}
        @if (!empty($home['videos']))
            <section class="container">
                <div class="video-container container h-[520px] overflow-hidden">
                    <div class="swiper-wrapper">
                        @foreach ($home['videos'] as $key => $item)
                            @if ($item->type == 'video')
                                <div class="swiper-slide video-item lazyYT open-video-youtube relative" data-youtube-id="{{ $item->content }}" data-modal-target="defaultModal"
                                    data-modal-toggle="defaultModal" data-title="{{ $item->title ?? '' }}">
                                    <div class="absolute flex h-full w-full items-center justify-center bg-[#000000] bg-opacity-40">
                                        <svg class="hidden" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
                                            <g id="Group_58871" data-name="Group 58871" transform="translate(-0.5)">
                                                <circle id="Ellipse_1293" data-name="Ellipse 1293" cx="25" cy="25" r="25" transform="translate(0.5 0)" opacity="0.7" />
                                                <path id="Polygon_1" data-name="Polygon 1" d="M8.983,1.465a1,1,0,0,1,1.724,0L18.8,15.23a1,1,0,0,1-.862,1.507H1.748A1,1,0,0,1,.886,15.23Z"
                                                    transform="translate(35.338 15.147) rotate(90)" fill="#fff" />
                                            </g>
                                        </svg>
                                    </div>
                                    <img src="" alt="" class="h-full w-full object-cover">
                                    {{-- <div class="swiper-lazy-preloader"></div> --}}
                                </div>
                            @endif
                            @if ($item->type == 'file')
                                <div class="swiper-slide video-item relative" data-modal-target="defaultModal" data-modal-toggle="defaultModal" data-title="{{ $item->title ?? '' }}">
                                    <div class="absolute flex h-full w-full items-center justify-center bg-[#000000] bg-opacity-40">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
                                            <g id="Group_58871" data-name="Group 58871" transform="translate(-0.5)">
                                                <circle id="Ellipse_1293" data-name="Ellipse 1293" cx="25" cy="25" r="25" transform="translate(0.5 0)" opacity="0.7" />
                                                <path id="Polygon_1" data-name="Polygon 1" d="M8.983,1.465a1,1,0,0,1,1.724,0L18.8,15.23a1,1,0,0,1-.862,1.507H1.748A1,1,0,0,1,.886,15.23Z"
                                                    transform="translate(35.338 15.147) rotate(90)" fill="#fff" />
                                            </g>
                                        </svg>
                                    </div>
                                    <video class="lazyload h-full w-full object-cover" autoplay muted playsinline data-src="{{ url('storage/uploads/' . $item['content'] ?? '') }}">
                                    </video>
                                    {{-- <div class="swiper-lazy-preloader"></div> --}}
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        @if (!empty($home['news_focus']))
            <section class="container mt-[30px] pb-[40px] md:mt-[60px]">
                <div class="mb-[20px] flex items-center justify-between">
                    <p class="title uppercase">Tin tức nổi bật</p>
                    <a href="{{ route('news') }}" class="flex items-center">
                        <span class="font-LexonRegular pr-[8px] text-[15px]">Xem tất cả</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="12.716" viewBox="0 0 20 12.716">
                            <path id="Path_134453" data-name="Path 134453"
                                d="M0,6.258c.128-.4.437-.481.813-.481,7.376,0,9.461,0,16.837,0h.369c-.106-.115-.168-.186-.235-.253L13.4,1.132c-.047-.047-.1-.092-.139-.141a.579.579,0,0,1-.019-.822.571.571,0,0,1,.818.007c.056.049.108.1.16.154l5.467,5.476c.408.409.411.688.009,1.091l-5.553,5.564a.592.592,0,0,1-.871.108.548.548,0,0,1-.091-.736,2.244,2.244,0,0,1,.246-.276Q15.612,9.369,17.8,7.182c.062-.062.121-.128.23-.242h-.363c-7.384,0-9.478,0-16.862,0A.761.761,0,0,1,0,6.506Z"
                                fill="#3a3a3a" />
                        </svg>
                    </a>
                </div>
                <div class="flex w-full flex-wrap bg-[#F6F3E9]">
                    <div class="w-full md:w-[41.21%] md:pr-[3.15%]">
                        <div class="aspect-[459/459]">
                            <img data-src="{{ route('uploads', $home['news_focus'][0]->picture ?? '') }}" alt="{{ $home['news_focus'][0]->title ?? '' }}" width="459px" height="459px"
                                class="lazyload h-full w-full object-cover">
                        </div>
                    </div>
                    <div class="my-auto w-full max-lg:p-[15px] md:w-[58.54%]">
                        <span class="font-CormorantGaramondSemiBold mb-[25px] block text-[18px] uppercase leading-[35px] lg:w-[59.52%] lg:text-[23px]">{{ $home['news_focus'][0]->title ?? '' }}</span>
                        <div class="font-LexonLight line-clamp-4 max-lg:text-[14px] lg:w-[78.56%]">
                            <p class="inline">{!! strip_tags(html_entity_decode($home['news_focus'][0]->short_focus_limit)) !!}</p>
                        </div>
                        <a href="{{ route('news.detail', $home['news_focus'][0]->friendly_link ?? '') }}"
                            class="font-LexonLight mt-[30px] flex w-fit items-center bg-[#CE4D00] px-[10px] py-[10px] text-white max-lg:text-[13px] lg:mt-[50px] lg:px-[25px] lg:py-[14px]">Xem chi
                            tiết
                            <svg class="ml-[10px] max-lg:w-[15px]" xmlns="http://www.w3.org/2000/svg" width="20" height="12.716" viewBox="0 0 20 12.716">
                                <path id="Path_134434" data-name="Path 134434"
                                    d="M0,6.258c.128-.4.437-.481.813-.481,7.376,0,9.461,0,16.837,0h.369c-.106-.115-.168-.186-.235-.253L13.4,1.132c-.047-.047-.1-.092-.139-.141a.579.579,0,0,1-.019-.822.571.571,0,0,1,.818.007c.056.049.108.1.16.154l5.467,5.476c.408.409.411.688.009,1.091l-5.553,5.564a.592.592,0,0,1-.871.108.548.548,0,0,1-.091-.736,2.244,2.244,0,0,1,.246-.276Q15.612,9.369,17.8,7.182c.062-.062.121-.128.23-.242h-.363c-7.384,0-9.478,0-16.862,0A.761.761,0,0,1,0,6.506Z"
                                    fill="#fff" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="mt-[20px]">
                    <div class="grid grid-cols-2 gap-x-[20px] gap-y-[30px] md:grid-cols-3 md:gap-x-[1.74%] md:gap-y-[50px] lg:grid-cols-4">
                        @foreach ($home['news_focus'] as $key => $item)
                            @if ($key == 0)
                                @continue
                            @endif
                            <div class="w-full">
                                <div class="w-full">
                                    <a href="{{ route('news.detail', $item->friendly_link ?? '') }}" class="">
                                        <img data-src="{{ route('thumbs', $item->picture ?? '') . '?w=286&h=286&fit=crop' }}" alt="{{ $item->title ?? '' }}" class="lazyload w-full object-cover" width="286" height="286" class="w-full object-cover">
                                    </a>
                                </div>
                                <a href="{{ route('news.detail', $item->friendly_link ?? '') }}"
                                    class="font-CormorantGaramondSemiBold mb-[15px] mt-[20px] uppercase md:text-[20px] line-clamp-2"><p class="inline">{{ $item->title ?? '' }}</p></a>
                                <div class="font-LexonLight max-md:text-[14px] line-clamp-2">
                                    <p class="inline">{!! strip_tags(html_entity_decode($item->short ?? '')) !!}</p>
                                </div>
                                <div class="group w-fit">
                                    <a href="{{ route('news.detail', $item->friendly_link ?? '') }}"
                                        class="font-LexonLight mt-[25px] flex w-fit items-center border border-[#CE4D00] px-[10px] py-[5px] text-[#CE4D00] group-hover:bg-[#CE4D00] group-hover:text-white max-md:text-[13px] md:px-[25px] md:py-[14px]">Xem
                                        chi tiết
                                        <svg class="ml-[10px] fill-[#CE4D00] group-hover:fill-white max-md:w-[15px]" xmlns="http://www.w3.org/2000/svg" width="20" height="12.716"
                                            viewBox="0 0 20 12.716">
                                            <path id="Path_134434" data-name="Path 134434"
                                                d="M0,6.258c.128-.4.437-.481.813-.481,7.376,0,9.461,0,16.837,0h.369c-.106-.115-.168-.186-.235-.253L13.4,1.132c-.047-.047-.1-.092-.139-.141a.579.579,0,0,1-.019-.822.571.571,0,0,1,.818.007c.056.049.108.1.16.154l5.467,5.476c.408.409.411.688.009,1.091l-5.553,5.564a.592.592,0,0,1-.871.108.548.548,0,0,1-.091-.736,2.244,2.244,0,0,1,.246-.276Q15.612,9.369,17.8,7.182c.062-.062.121-.128.23-.242h-.363c-7.384,0-9.478,0-16.862,0A.761.761,0,0,1,0,6.506Z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
            <div class="relative max-h-full w-full max-w-2xl">
                <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                    <div class="flex items-start justify-between rounded-t border-b p-4 dark:border-gray-600">
                        <h3 class="video-title text-xl font-semibold text-gray-900 dark:text-white"></h3>
                        <button type="button"
                            class="ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="defaultModal">
                            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <div class="space-y-6 p-6">
                        <div class="iframe-youtube" id="iframe-youtube"></div>
                        <video data-src="" autoplay controls playsinline type="video/mp4" class="lazyload video-popup h-full w-full object-cover"></video>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('js')
    <script type="module">
        $(function() {
            // Hàm để lấy link thumbnail từ ID video
            function getYouTubeThumbnail(videoId) {
                return `https://img.youtube.com/vi/${videoId}/maxresdefault.jpg`;
            }

            var player;

            function onYouTubeIframeAPIReady(id) {
                player = new YT.Player('iframe-youtube', {
                    height: '390',
                    width: '640',
                    videoId: id,
                    playerVars: {
                        autoplay: 0, // Auto-play the video on load
                        mute: 1,
                        controls: 1, // Show pause/play buttons in player
                        showinfo: 1, // Hide the video title
                        modestbranding: 1, // Hide the Youtube Logo
                        loop: 1, // Run the video in a loop
                        fs: 0, // Hide the full screen button
                        // cc_load_policy: 0, // Hide closed captions
                        // iv_load_policy: 3,  // Hide the Video Annotations
                        playlist: id,
                        autohide: 1, // Hide video controls when playing
                        playsinline: 1, //forbid fullscreen on ios
                    }
                });

            }
            $(".lazyYT").each(function() {
                const videoId = $(this).data('youtube-id');
                const thumbnailUrl = getYouTubeThumbnail(videoId);
                $(this).find('img').prop('src', thumbnailUrl);
            });
            $('.lazyYT').click(function() {
                $('.video-popup').hide();
                onYouTubeIframeAPIReady($(this).data('youtube-id'));
            })
            // $('.banner-main').slick({
            //     arrows: false,
            //     infinite: true,
            // })
            var swiper = new Swiper(".banner-main", {
                slidesPerView: 1,
                spaceBetween: 0
            });
            var mySwiper = new Swiper(".video-container", {
                spaceBetween: 0,
                slidesPerView: 1,
                centeredSlides: true,
                // roundLengths: true,
                // lazyPreloadPrevNext: 3,
                // loop: true,
                // loopAdditionalSlides: 30,
                initialSlide: 1,
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    },
                    1024: {
                        slidesPerView: 2,
                        spaceBetween: 0,
                    },
                },
            });
            $('.video-item').click(function() {
                var src = $(this).find('video').attr('src');
                $('.video-popup').prop('src', src);
                $('.video-title').text($(this).data('title'));
            })
            // $('.products-new').slick({
            //     arrows: true,
            //     infinite: true,
            //     slidesToShow: 1,
            //     slidesToScroll: 1,
            //     swipe: true,
            //     swipeToSlide: true,
            //     prevArrow: $('.products-new-container .prev-btn'),
            //     nextArrow: $('.products-new-container .next-btn'),
            //     vertical: true,
            //     verticalSwiping: true,
            //     responsive: [{
            //             breakpoint: 1024,
            //             settings: {
            //                 vertical: false,
            //                 verticalSwiping: false,
            //                 slidesToShow: 2,
            //                 slidesToScroll: 2,
            //             }
            //         },
            //         {
            //             breakpoint: 768,
            //             settings: {
            //                 verticalSwiping: false,
            //                 vertical: false,
            //             }
            //         }
            //     ]
            // })
            var swiper = new Swiper(".products-new", {
                slidesPerView: 1,
                spaceBetween: 0,
                lazyPreloadPrevNext: 1,
                navigation: {
                    nextEl: '.products-new-container .next-btn',
                    prevEl: '.products-new-container .prev-btn',
                },
                breakpoints: {
                    768: {
                        direction: "vertical",

                    }
                },
            });
            // $('.products-focus').slick({
            //     arrows: true,
            //     infinite: true,
            //     slidesToShow: 3,
            //     slidesToScroll: 3,
            //     prevArrow: $('.product-focus-container .prev-btn'),
            //     nextArrow: $('.product-focus-container .next-btn'),
            //     centerMode: true,
            //     centerPadding: '0',
            //     responsive: [{
            //             breakpoint: 768,
            //             settings: {
            //                 slidesToShow: 2,
            //                 centerMode: false,
            //             }
            //         },
            //         {
            //             breakpoint: 480,
            //             settings: {
            //                 slidesToShow: 2,
            //                 centerMode: false,
            //             }
            //         }
            //     ]
            // })

            var swiper = new Swiper(".products-focus", {
                slidesPerView: 1,
                centeredSlides: true,
                spaceBetween: 20,
                initialSlide: 1,
                centerInsufficientSlides: true,
                // autoHeight: true,
                // height: 491,
                navigation: {
                    nextEl: '.product-focus-container .next-btn',
                    prevEl: '.product-focus-container .prev-btn',
                },
                breakpoints: {
                    768: {
                        // direction: "vertical",
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    }
                },
            });

        });
        $(window).on('load', function(){
            var max = 0;
            $('.products-focus .swiper-wrapper > .swiper-slide').each(function(){
                if(max < $(this).innerHeight()){
                    max = $(this).innerHeight();
                }
            });
            $('.products-focus .swiper-wrapper').css('height', max + 40);
        })
    </script>
@endsection
