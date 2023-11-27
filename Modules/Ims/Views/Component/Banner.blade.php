<section>
    <div class="relative w-full max-md:h-[50vh] banner-main">
        @foreach ($ims['banner_main'] as $item)
        <div class="absolute text-[30px] md:text-[50px] text-white w-full top-[42%] z-[1]">
            <div class="container">
                <h2 class="font-LexonBold uppercase">{{$item->title ?? ''}}</h2>
                <span class="font-CormorantGaramondRegular">{!! html_entity_decode($item->short ?? '') !!}</span>
            </div>
        </div>
        <div class="relative w-full h-full">
            <div class="absolute w-full h-full shadow-banner">
                <div class="absolute top-0 left-0 h-1/3 w-full bg-gradient-to-b from-[#2C1100] to-none"></div>
                <div class="absolute top-0 left-0 h-full w-3/4 bg-gradient-to-r from-[#2C1100] to-none"></div>
            </div>
            <img class="w-full h-full object-cover lazyload " data-src="{{ route('uploads', $item->content ?? '') }}" alt="{{ $item->title ?? '' }}">
        </div>
        @endforeach
    </div>
</section>
