@extends('Ims::Ims')
@section('title')
    {{ $news['detail']['title'] ?? '' }}
@endsection
@section('meta')
    <meta name="description" content="{{ $news['detail']['meta_desc'] ?? '' }}" />
    <meta name="keywords" content="{{ $news['detail']['meta_key'] ?? '' }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" name="title" content="{{ $news['detail']['meta_title'] ?? '' }}" />
    <meta property="og:description" content="{{ $news['detail']['meta_desc'] ?? '' }}" />
    <meta property="og:url" content="{{ Request::url() ?? '' }}" />
    <meta property="og:image" content="{{ route('uploads', $news['detail']->picture ?? '') }}" />
@endsection

@section('content')
    <main class="font-LexonLight text-[#232323]">
        @include('Ims::Component.Banner')
        <div class="container mt-[60px] bg-[#F6F3E9] px-[30px] pb-[60px] pt-[50px] lg:px-[80px]">
            <h3 class="font-CormorantGaramondSemiBold mx-auto w-[90%] pb-[30px] text-center text-[20px] uppercase text-[#530507] md:text-[30px] lg:w-1/2">{{ $news['detail']->title ?? '' }}</h3>
            <div class="content text-justify">{!! html_entity_decode($news['detail']->content ?? '') !!}</div>
        </div>
        <div class="container mb-[40px] mt-[50px] overflow-hidden sm:px-0">
            <div class="flex items-center justify-between">
                <h4 class="font-LexonSemiBold text-[18px] uppercase text-[#530507] md:text-[25px]">Tin tức liên quan</h4>
                <div class="arrow flex items-center">
                    <svg class="prev-arrow rotate-90 max-md:h-[30px] max-md:w-[30px]" id="Group_58968" data-name="Group 58968" xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                        viewBox="0 0 50 50">
                        <g id="Ellipse_1289" data-name="Ellipse 1289" fill="none" stroke="#7f7f7f" stroke-width="1">
                            <circle cx="25" cy="25" r="25" stroke="none" />
                            <circle cx="25" cy="25" r="24.5" fill="none" />
                        </g>
                        <path id="Path_105159" data-name="Path 105159"
                            d="M0,6.183c.123.386.418.46.779.46,7.062,0,9.059,0,16.121,0h.353c-.1.11-.161.178-.225.243l-4.194,4.208c-.045.045-.091.088-.133.135a.554.554,0,0,0-.019.787.546.546,0,0,0,.784-.007c.053-.047.1-.1.153-.148l5.234-5.243c.391-.392.394-.659.008-1.045L13.545.244a.567.567,0,0,0-.834-.1.525.525,0,0,0-.087.7,2.149,2.149,0,0,0,.235.265Q14.948,3.2,17.038,5.3c.06.06.116.122.22.232h-.347c-7.07,0-9.074,0-16.144,0A.728.728,0,0,0,0,5.946Z"
                            transform="translate(31.25 15.179) rotate(90)" fill="#3a3a3a" />
                    </svg>

                    <svg class="next-arrow ml-[10px] rotate-90 max-md:h-[30px] max-md:w-[30px]" id="Group_58969" data-name="Group 58969" xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                        viewBox="0 0 50 50">
                        <g id="Ellipse_1289" data-name="Ellipse 1289" fill="none" stroke="#7f7f7f" stroke-width="1">
                            <circle cx="25" cy="25" r="25" stroke="none" />
                            <circle cx="25" cy="25" r="24.5" fill="none" />
                        </g>
                        <path id="Path_105159" data-name="Path 105159"
                            d="M0,5.992c.123-.386.418-.46.779-.46,7.062,0,9.059,0,16.121,0h.353c-.1-.11-.161-.178-.225-.243L12.834,1.084C12.789,1.039,12.743,1,12.7.949a.554.554,0,0,1-.019-.787.546.546,0,0,1,.784.007c.053.047.1.1.153.148l5.234,5.243c.391.392.394.659.008,1.045l-5.317,5.327a.567.567,0,0,1-.834.1.525.525,0,0,1-.087-.7,2.149,2.149,0,0,1,.235-.265q2.089-2.1,4.179-4.189c.06-.06.116-.122.22-.232h-.347c-7.07,0-9.074,0-16.144,0A.728.728,0,0,1,0,6.229Z"
                            transform="translate(19.075 34.821) rotate(-90)" fill="#3a3a3a" />
                    </svg>

                </div>
            </div>
            <div class="news-related mr-[-20px] mt-[10px]">
                @forelse ($news['related'] as $item)
                    <div class="">
                        <div class="pr-[20px]">
                            <div class="aspect-[286/286]">
                                <img data-src="{{ route('uploads', $item->picture ?? '') }}" alt="{{ $item->title ?? '' }}" class="lazyload w-full object-cover">
                            </div>
                            <div class="font-CormorantGaramondSemiBold mb-[5px] mt-[15px] line-clamp-2 min-h-[55px] uppercase leading-[28px] md:min-h-[60px] md:text-[20px]">
                                {{ $item->title_limit ?? '' }}
                            </div>
                            <div class="short line-clamp-2 min-h-[39px] max-md:text-[13px] md:min-h-[48px]">
                                {{ $item->short_normal_limit ?? '' }}
                            </div>
                            <div class="group w-fit">
                                <a href="{{ route('news.detail', $item->friendly_link ?? '') }}"
                                    class="font-LexonLight mt-[25px] flex w-fit items-center border border-[#CE4D00] px-[10px] py-[5px] text-[#CE4D00] group-hover:bg-[#CE4D00] group-hover:text-white md:px-[25px] md:py-[14px]">Xem
                                    chi tiết
                                    <svg class="ml-[10px] fill-[#CE4D00] group-hover:fill-white" xmlns="http://www.w3.org/2000/svg" width="20" height="12.716" viewBox="0 0 20 12.716">
                                        <path id="Path_134434" data-name="Path 134434"
                                            d="M0,6.258c.128-.4.437-.481.813-.481,7.376,0,9.461,0,16.837,0h.369c-.106-.115-.168-.186-.235-.253L13.4,1.132c-.047-.047-.1-.092-.139-.141a.579.579,0,0,1-.019-.822.571.571,0,0,1,.818.007c.056.049.108.1.16.154l5.467,5.476c.408.409.411.688.009,1.091l-5.553,5.564a.592.592,0,0,1-.871.108.548.548,0,0,1-.091-.736,2.244,2.244,0,0,1,.246-.276Q15.612,9.369,17.8,7.182c.062-.062.121-.128.23-.242h-.363c-7.384,0-9.478,0-16.862,0A.761.761,0,0,1,0,6.506Z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <span>Không có thông tin liên quan.</span>
                @endforelse
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script type="module">
        $(function() {
            $('.news-related').slick({
                slidesToShow: 4,
                slidesToScroll: 4,
                autoplay: false,
                arrows: true,
                prevArrow: $('.prev-arrow'),
                nextArrow: $('.next-arrow'),
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    }
                ]
            });
        })
    </script>
@endsection
