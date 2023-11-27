@extends('Ims::Ims')
@section('title')
    {{ $about['setting']['about_meta_title'] ?? '' }}
@endsection
@section('meta')
    <meta name="description" content="{{ $about['setting']['about_meta_desc'] ?? '' }}" />
    <meta name="keywords" content="{{ $about['setting']['about_meta_key'] ?? '' }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" name="title" content="{{ $about['setting']['about_meta_title'] ?? '' }}" />
    <meta property="og:description" content="{{ $about['setting']['about_meta_desc'] ?? '' }}" />
    <meta property="og:url" content={{ Request::url() ?? '' }} />
    <meta property="og:image" content={{ route('uploads', $ims['logo']->content ?? '') }} />
@endsection

@section('css')
    <link rel="stylesheet" href="{{ mix('css/about.css') }}">
@endsection
@section('content')
    <main class="cursor-default bg-[#FCFCF8]">
        @include('Ims::Component.Banner')
        <div class="container py-[30px] md:py-[60px] text-[#232323]">
            <div class="title font-LexonBold text-[18px] md:text-[25px] text-[#530507] text-center uppercase">
                <p>
                    {{ $about['about_lang']['title1'] ?? '' }}</p>
                <p>{{ $about['about_lang']['title2'] ?? '' }}</p>
            </div>
            @if (!empty($about['about']->arr_custom))
                <div class="content w-full mt-[30px]">
                    @php
                        $about['about']->arr_custom = array_values($about['about']->arr_custom);
                    @endphp
                    @foreach ($about['about']->arr_custom as $key => $item)
                        @if ($key % 2 == 0)
                            <div class="max-md:flex-wrap max-md:flex-col-reverse flex w-full" style="margin-top: {{ $key != 0 ? '40px' : '0' }}">
                                <div class="w-full md:w-[48.61%] md:pr-[8.29%] pt-[33px]">
                                    <h3 class="font-CormorantGaramondSemiBold text-[20px] md:text-[30px] leading-[40px] pb-[30px] uppercase md:w-[63%]">
                                        {{ $item['title'] ?? '' }}
                                    </h3>
                                    <div class="font-LexonLight leading-[25px] max-md:text-justify">
                                        {!! html_entity_decode($item['short'] ?? '') !!}
                                    </div>
                                </div>
                                <div class="w-full md:w-[51.39%] mx-auto md:my-auto lg:my-0">
                                    <img src="{{ route('uploads', $item['picture'] ?? '') }}" alt="{{ $item['title'] ?? '' }}" class="w-full">
                                </div>
                            </div>
                        @else
                            <div class="md:flex w-full" style="margin-top: {{ $key != 0 ? '40px' : '0' }}">
                                <div class="w-full md:w-[55.06%] pr-[9.04%] mx-auto md:my-auto lg:my-0">
                                        <img src="{{ route('uploads', $item['picture'] ?? '') }}" alt="{{ $item['title'] ?? '' }}" class="w-full object-cover">
                                </div>
                                <div class="w-full md:w-[44.94%] pb-[33px] pt-[30px] md:pt-[80px]">
                                    <h3 class="font-CormorantGaramondSemiBold text-[20px] md:text-[30px] leading-[40px] pb-[30px] uppercase">
                                        {{ $item['title'] ?? '' }}
                                    </h3>
                                    <div class="font-LexonLight leading-[25px] max-sm:text-justify">
                                        {!! html_entity_decode($item['short'] ?? '') !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
        @if (!empty($about['banner-about']))
            <div class="banner-content w-full pb-[30px]">
                @foreach ($about['banner-about'] as $item)
                    @php
                        $arr_picture = unserialize($item->arr_picture);
                    @endphp
                    <div class="image w-full mb-[44px]">
                        @if ($item->type == 'file')
                            <video autoplay loop playsinline data-src="{{ url(Storage::url('uploads/' . $item->content ?? '')) }}" class="w-full lazyload"></video>
                        @elseif($item->type == 'video')
                            <div id="player-about" class="w-full object-cover h-[60vh]" data-id="{{ $item->content ?? '' }}"></div>
                        @elseif ($item->type == 'image')
                            <img data-src="{{ route('uploads', $item->content) }}" alt="{{ $item->title ?? '' }}" width="1366" class="w-full lazyload">
                        @endif
                    </div>
                    <h4 class="font-CormorantGaramondSemiBold text-[20px] md:text-[30px] uppercase text-center">{{ $item->title ?? '' }}</h4>
                    <div class="container mt-[20px] mb-[30px]">
                        <div class="font-LexonLight text-[#232323] md:w-[64.51%] mx-auto text-justify md:text-center">
                            {!! html_entity_decode($item->short ?? '') !!}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        {{-- @include('Ims::Component.RegisterEmail') --}}
    </main>
@endsection
@section('js')
    <script type="module">
    window.onload = function(){
        // 3. This function creates an <iframe> (and YouTube player)
        //    after the API code downloads.
        var player;
        var id = $('#player-about').data('id');
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player-about', {
                // height: '1080',
                // width: '1024',
                videoId: id,
                playerVars: {
                    autoplay: 1,        // Auto-play the video on load
                    mute: 1,
                    controls: 0,        // Show pause/play buttons in player
                    showinfo: 1,        // Hide the video title
                    modestbranding: 1,  // Hide the Youtube Logo
                    loop: 1,            // Run the video in a loop
                    fs: 0,              // Hide the full screen button
                    // cc_load_policy: 0, // Hide closed captions
                    // iv_load_policy: 3,  // Hide the Video Annotations
                    playlist: id,
                    autohide: 1,         // Hide video controls when playing
                    playsinline: 1, //forbid fullscreen on ios
                },
                events: {
                    'onReady': onPlayerReady,
                    // 'onStateChange': onPlayerStateChange,
                }
            });
        }

        // 4. The API will call this function when the video player is ready.
        function onPlayerReady(event) {
            event.target.playVideo();
        }

        // 5. The API calls this function when the player's state changes.
        //    The function indicates that when playing a video (state=1),
        //    the player should play for six seconds and then stop.
        var done = false;
        // function onPlayerStateChange(event) {
        // 	if (event.data == YT.PlayerState.PLAYING && !done) {
        // 		// setTimeout(stopVideo, 6000);
        // 		done = true;
        // 	}
        // }
        function stopVideo() {
            player.stopVideo();
        }
        onYouTubeIframeAPIReady();
    }
</script>
@endsection
