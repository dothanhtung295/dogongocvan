@extends('Ims::Ims')
@section('title')
    {{ $news['setting']['news_meta_title'] ?? '' }}
@endsection
@section('meta')
    <meta name="description" content="{{ $news['setting']['news_meta_desc'] ?? '' }}" />
    <meta name="keywords" content="{{ $news['setting']['news_meta_key'] ?? '' }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" name="title" content="{{ $news['setting']['news_meta_title'] ?? '' }}" />
    <meta property="og:description" content="{{ $news['setting']['news_meta_desc'] ?? '' }}" />
    <meta property="og:url" content={{ Request::url() ?? '' }} />
    <meta property="og:image" content={{ route('uploads', $ims['logo']->content ?? '') }} />
@endsection
@section('content')
    @php
        if (!empty($news['news_focus'])) {
            $newsFirst = $news['news_focus'][0];
        }
    @endphp
    @include('Ims::Component.Banner')
    <main class="cursor-default container pt-[60px] pb-[40px]">
        <h3 class="text-[25px] font-LexonSemiBold text-[#530507] uppercase mb-[20px]">Tin tức nổi bật</h3>
        @if (!empty($newsFirst))
            <div class="flex flex-wrap bg-[#F6F3E9] w-full">
                <div class="w-full md:w-[41.46%] md:pr-[3.15%]">
                    <div class="aspect-[459/459]">
                        <img data-src="{{ route('uploads', $newsFirst->picture ?? '') }}" alt="{{ $newsFirst->title ?? '' }}" width="459px" height="459px" class="lazyload h-full w-full object-cover">
                    </div>
                </div>
                <div class="w-full md:w-[58.54%] my-auto max-lg:p-[15px]">
                    <span class="block mb-[25px] text-[18px] lg:text-[23px] font-CormorantGaramondSemiBold lg:w-[59.52%] leading-[35px] uppercase">{{ $newsFirst->title ?? '' }}</span>
                    <div class="line-clamp-4 max-lg:text-[14px] font-LexonLight lg:w-[78.56%]">{!! html_entity_decode($newsFirst->short_focus_limit) !!}</div>
                    <a href="{{ route('news.detail', $newsFirst->friendly_link ?? '') }}" class="bg-[#CE4D00] py-[10px] lg:py-[14px] font-LexonLight px-[10px] lg:px-[25px] mt-[30px] max-lg:text-[13px] lg:mt-[50px] flex w-fit text-white items-center ">Xem chi
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
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-[20px] md:gap-x-[1.74%] gap-y-[30px] md:gap-y-[50px]">
                    @foreach ($news['news_focus'] as $key => $item)
                        @if ($key == 0)
                            @continue
                        @endif
                        <div class="w-full">
                            <div class="w-full">
                                <a href="{{ route('news.detail', $item->friendly_link ?? '') }}">
                                    <img data-src="{{ route('thumbs', $item->picture ?? ''). '?w=286&h=286&fit=crop' }}" alt="{{ $item->title ?? '' }}" class="lazyload w-full object-cover" width="286">
                                </a>
                            </div>
                            <a href="{{ route('news.detail', $item->friendly_link ?? '') }}"
                                class="font-CormorantGaramondSemiBold md:text-[20px] line-clamp-2 mt-[20px] mb-[15px] uppercase">
                                <p class="inline">{{ $item->title ?? '' }}</p></a>
                            <div class="font-LexonLight max-md:text-[14px] line-clamp-2">
                                <p class="inline">{!! strip_tags(html_entity_decode($item->short ?? '')) !!}</p>
                            </div>
                            <div class="group w-fit">
                                <a href="{{ route('news.detail', $item->friendly_link ?? '') }}"
                                    class="py-[5px] md:py-[12px] font-LexonLight px-[10px] md:px-[25px] mt-[25px] max-md:text-[13px] flex w-fit text-[#CE4D00] items-center border border-[#CE4D00] group-hover:bg-[#CE4D00] group-hover:text-white ">Xem
                                    chi tiết
                                    <svg class="ml-[10px] max-md:w-[15px] group-hover:fill-white fill-[#CE4D00]" xmlns="http://www.w3.org/2000/svg" width="20" height="12.716" viewBox="0 0 20 12.716">
                                        <path id="Path_134434" data-name="Path 134434"
                                            d="M0,6.258c.128-.4.437-.481.813-.481,7.376,0,9.461,0,16.837,0h.369c-.106-.115-.168-.186-.235-.253L13.4,1.132c-.047-.047-.1-.092-.139-.141a.579.579,0,0,1-.019-.822.571.571,0,0,1,.818.007c.056.049.108.1.16.154l5.467,5.476c.408.409.411.688.009,1.091l-5.553,5.564a.592.592,0,0,1-.871.108.548.548,0,0,1-.091-.736,2.244,2.244,0,0,1,.246-.276Q15.612,9.369,17.8,7.182c.062-.062.121-.128.23-.242h-.363c-7.384,0-9.478,0-16.862,0A.761.761,0,0,1,0,6.506Z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        @if (!empty($news['list_news']))
            <div class="news mt-[30px] md:mt-[60px]">
                <h4 class="text-[25px] font-LexonSemiBold text-[#530507] text-center uppercase mb-[20px]">Tất cả tin tức</h4>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-[20px] md:gap-x-[1.74%] gap-y-[30px] md:gap-y-[50px] pb-[50px]">
                    @foreach ($news['list_news'] as $key => $item)
                        <div class="w-full">
                            <div class="w-full">
                                <a href="{{ route('news.detail', $item->friendly_link ?? '') }}">
                                    <img data-src="{{ route('thumbs', $item->picture ?? ''). '?w=286&h=286&fit=crop' }}" alt="{{ $item->title ?? '' }}" class="lazyload w-full object-cover" width="286">
                                </a>
                            </div>
                            <a href="{{ route('news.detail', $item->friendly_link ?? '') }}"
                                class="font-CormorantGaramondSemiBold md:text-[20px] line-clamp-2 mt-[20px] mb-[15px] uppercase">
                                <p class="inline">{{ $item->title ?? '' }}</p></a>
                            <div class="font-LexonLight max-md:text-[14px] line-clamp-2">
                                <p class="inline">{!! strip_tags(html_entity_decode($item->short ?? '')) !!}</p>
                            </div>
                            <div class="group w-fit">
                                <a href="{{ route('news.detail', $item->friendly_link ?? '') }}"
                                    class="py-[5px] md:py-[12px] font-LexonLight px-[10px] md:px-[25px] max-md:text-[13px] mt-[25px] flex w-fit text-[#CE4D00] items-center border border-[#CE4D00] group-hover:bg-[#CE4D00] group-hover:text-white">Xem
                                    chi tiết
                                    <svg class="ml-[10px] max-md:w-[15px] group-hover:fill-white fill-[#CE4D00]" xmlns="http://www.w3.org/2000/svg" width="20" height="12.716" viewBox="0 0 20 12.716">
                                        <path id="Path_134434" data-name="Path 134434"
                                            d="M0,6.258c.128-.4.437-.481.813-.481,7.376,0,9.461,0,16.837,0h.369c-.106-.115-.168-.186-.235-.253L13.4,1.132c-.047-.047-.1-.092-.139-.141a.579.579,0,0,1-.019-.822.571.571,0,0,1,.818.007c.056.049.108.1.16.154l5.467,5.476c.408.409.411.688.009,1.091l-5.553,5.564a.592.592,0,0,1-.871.108.548.548,0,0,1-.091-.736,2.244,2.244,0,0,1,.246-.276Q15.612,9.369,17.8,7.182c.062-.062.121-.128.23-.242h-.363c-7.384,0-9.478,0-16.862,0A.761.761,0,0,1,0,6.506Z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{$news['list_news']->links('Ims::Component.Paging')}}
            </div>
        @endif
    </main>
@endsection

@section('js')
    <script type="module">

    </script>
@endsection
