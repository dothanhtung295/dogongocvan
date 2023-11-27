@extends('Ims::Ims')

@section('title')
    {{ $product['group_current']->meta_title ?? ($product['setting']['product_meta_title'] ?? '') }}
@endsection

@section('meta')
    <meta name="description" content="{{ $product['group_current']->meta_title ?? ($product['setting']['product_meta_desc'] ?? '') }}" />
    <meta name="keywords" content="{{ $product['group_current']->meta_title ?? ($product['setting']['product_meta_key'] ?? '') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" name="title" content="{{ $product['group_current']->meta_title ?? ($product['setting']['product_meta_title'] ?? '') }}" />
    <meta property="og:description" content="{{ $product['group_current']->meta_title ?? ($product['setting']['product_meta_desc'] ?? '') }}" />
    <meta property="og:url" content="{{ Request::url() ?? '' }}" />
    <meta property="og:image" content="{{ route('uploads', $ims['logo']->content ?? '') }}" />
@endsection
@section('css')
    <link rel="stylesheet" href="{{ mix('css/product.css') }}" />
@endsection
@section('content')
    <main class="cursor-default text-[#232323] bg-[#FCFCF8]">
        @include('Ims::Component.Banner')
        <div class="container">
            <div class="menu flex">
                <svg class="mr-[10px] rotate-90 mt-[20px] cursor-pointer scroll-left" id="Group_58968" data-name="Group 58968" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
                    <g id="Ellipse_1289" data-name="Ellipse 1289" fill="none" stroke="#7f7f7f" stroke-width="1">
                        <circle cx="25" cy="25" r="25" stroke="none" />
                        <circle cx="25" cy="25" r="24.5" fill="none" />
                    </g>
                    <path id="Path_105159" data-name="Path 105159"
                        d="M0,5.992c.123-.386.418-.46.779-.46,7.062,0,9.059,0,16.121,0h.353c-.1-.11-.161-.178-.225-.243L12.834,1.084C12.789,1.039,12.743,1,12.7.949a.554.554,0,0,1-.019-.787.546.546,0,0,1,.784.007c.053.047.1.1.153.148l5.234,5.243c.391.392.394.659.008,1.045l-5.317,5.327a.567.567,0,0,1-.834.1.525.525,0,0,1-.087-.7,2.149,2.149,0,0,1,.235-.265q2.089-2.1,4.179-4.189c.06-.06.116-.122.22-.232h-.347c-7.07,0-9.074,0-16.144,0A.728.728,0,0,1,0,6.229Z"
                        transform="translate(30.925 15.179) rotate(90)" fill="#3a3a3a" />
                </svg>
                <div class="flex w-full overflow-scroll no-scrollbar mt-[20px] group-container">
                    @foreach ($product['groups'] as $item)
                        <a href="{{route('product', $item)}}"  class="item-group {{ (!empty($product['group_current']) && $product['group_current']->id == $item->id) ? 'active' : '' }} font-LexonRegular max-md:my-auto mr-[10px] min-w-max rounded-3xl bg-[#F5F5F5] px-[13px] md:px-[25px] py-[6px] md:py-[12px] text-[14px] md:text-[17px] text-[#3B3B3B] last:mr-0">{{ $item->title ?? '' }}</a>
                    @endforeach
                </div>
                <svg class="ml-[10px] rotate-90 mt-[20px] cursor-pointer scroll-right" id="Group_58968" data-name="Group 58968" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
                    <g id="Ellipse_1289" data-name="Ellipse 1289" fill="none" stroke="#7f7f7f" stroke-width="1">
                        <circle cx="25" cy="25" r="25" stroke="none" />
                        <circle cx="25" cy="25" r="24.5" fill="none" />
                    </g>
                    <path id="Path_105159" data-name="Path 105159"
                        d="M0,6.183c.123.386.418.46.779.46,7.062,0,9.059,0,16.121,0h.353c-.1.11-.161.178-.225.243l-4.194,4.208c-.045.045-.091.088-.133.135a.554.554,0,0,0-.019.787.546.546,0,0,0,.784-.007c.053-.047.1-.1.153-.148l5.234-5.243c.391-.392.394-.659.008-1.045L13.545.244a.567.567,0,0,0-.834-.1.525.525,0,0,0-.087.7,2.149,2.149,0,0,0,.235.265Q14.948,3.2,17.038,5.3c.06.06.116.122.22.232h-.347c-7.07,0-9.074,0-16.144,0A.728.728,0,0,0,0,5.946Z"
                        transform="translate(18.75 34.821) rotate(-90)" fill="#3a3a3a" />
                </svg>
            </div>

            <h4 class="font-LexonBold max-md:my-[15px] md:mb-[40px] md:mt-[50px] text-center text-[18px] md:text-[25px] uppercase text-[#530507]">{{ empty($product['group_current']) ? 'Sản phẩm' : $product['group_current']->title ?? '' }}
            </h4>
            @if (request()->has('keyword'))
                <span class="px-[10px] text-[14px] md:text-[16px] text-[#530507] font-LexonBold">Có {{ $product['products']->total() ?? 0 }} kết quả tìm kiếm từ khóa: "{{request('keyword') ?? ''}}"</span>
            @endif
            <div class="products flex flex-wrap mb-[40px]">
                @forelse ($product['products'] as $item)
                {{-- <img data-src="{{route('thumbs', $item->picture ?? '')}}" alt="{{$item->title ?? ''}}" class="lazyload w-full object-cover"> --}}
                    <div class="w-full md:w-1/3 item p-[10px] max-md:border max-md:my-[10px] border border-transparent hover:border-[#DED9CA] flex flex-col justify-between">
                        <div>
                            <a href="{{route('product.detail', [$item->group, $item])}}" class="aspect-[382/382] block">
                                <img data-src="{{route('thumbs', $item->picture ?? '') . '?w=382&h=382&fit=crop'}}" alt="{{$item->title ?? ''}}" class="lazyload w-full object-cover">
                            </a>
                            <a href="{{route('product', $item->group)}}" class="mt-[18px] font-LexonRegular text-[12px] md:text-[14px] block uppercase text-[#CE4D00]">{{$item->group->title ?? ''}}</a>
                            <a href="{{route('product.detail', [$item->group, $item])}}" class="font-CormorantGaramondSemiBold block text-[18px] md:text-[23px] mt-[5px] uppercase">{{ $item->title ?? '' }}</a>
                        </div>
                        <div class="">
                            <div class="my-[14px] font-LexonLight line-clamp-2 max-md:text-[13px]">{{$item->short_limit ?? ''}}</div>
                            <span class="text-[#CF0005] font-LexonRegular text-[12px] md:text-[15px] mb-[10px] block">{{ $item->price == 0 ? 'Giá liên hệ' : price_format($item->price) }}</span>
                        </div>
                    </div>
                @empty
                    <span>Không có sản phẩm phù hợp...</span>
                @endforelse
            </div>
            <div class="pagination mb-[30px] md:mb-[40px]">
                {{ $product['products']->links('Ims::Component.Paging') }}
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script type="module">
        $(function () {
            var e = $('.group-container');
            $('.scroll-left').click(function () {
                var left = e.scrollLeft();
                e.animate({scrollLeft: left - 400}, 500);
            })

            $('.scroll-right').click(function () {
                var left = e.scrollLeft();
                $('.group-container').animate({scrollLeft: left + 400}, 500);
            })

            var activeE = $(".item-group.active");
                if (activeE.length) {
                    var scrollContainer = $(".group-container");
                    var containerLeft = scrollContainer.offset().left;
                    var activeLiLeft = activeE.offset().left - containerLeft;
                    scrollContainer.animate({ scrollLeft: activeLiLeft }, 500);
                }
        })
    </script>
@endsection
