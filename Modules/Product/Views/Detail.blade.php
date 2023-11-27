@extends('Ims::Ims')

@section('title')
    {{ $product['product_detail']['meta_title'] ?? '' }}
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
    <link rel="stylesheet" href="{{ mix('css/product.css') }}" />
@endsection

@section('content')
    @php
        $arrOption = unserialize($product['product_detail']->arr_option);
        if (!empty($arrOption)) {
            foreach ($arrOption as $key => $item) {
                if (empty($item)) {
                    unset($arrOption[$key]);
                }
            }
            $arrOption = array_values($arrOption);
        }
    @endphp
    <main class="cursor-default">
        <div class="container mt-[81px]">
            <div class="mt-[30px] flex bg-[#FCFCF8] max-md:flex-col">
                <div class="md:pr-[7.3%] max-md:w-full md:w-[54.22%]">
                    <div class="relative w-full" id="product_about">
                        <div class="relative w-full">
                            <div class="sider__right-thumbs absolute left-[10px] top-1/2 z-[1] flex w-full max-w-[98px] -translate-y-1/2">
                                <div class="slider slider-nav w-full bg-white pt-[7px]">
                                    @foreach ($product['product_detail']->arr_picture as $item)
                                        <div class="px-[7px]">
                                            <div class="image relative aspect-[84/84] w-full max-w-[84px]">
                                                <img width="84" height="84" class="h-full w-full object-cover" src="{{ route('uploads', $item) }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="slider slider-for">
                                {{-- @dd($product['product_detail']->arr_picture); --}}
                                @foreach ($product['product_detail']->arr_picture as $item)
                                    <div class="">
                                        <a data-fancybox="group" class="fancybox block aspect-[712/615] max-md:px-[7px]" href="{{ route('uploads', $item) }}">
                                            <img width="712" height="615" src="{{ route('thumbs', $item) . '?w=712&h=615&fit=crop' }}" class="border-solid object-cover max-md:w-full">
                                        </a>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-auto flex flex-col justify-between max-md:w-full md:w-[38%] lg:w-[48%]">
                    <div>
                        <div class="font-LexonLight mt-[30px] md:mt-[74px] flex flex-wrap items-center text-[15px] lg:mt-[15px] xl:mt-[10px]">
                            <a class="leading-[25px] text-[#7F7F7F]" href="{{ route('home') }}">Trang chủ</a>
                            <span class="px-[8px]"><svg xmlns="http://www.w3.org/2000/svg" width="8.484" height="8.484" viewBox="0 0 8.484 8.484">
                                    <path id="Union_7" data-name="Union 7" d="M4.667,5.332v-4h-4A.666.666,0,1,1,.667,0H5.332A.667.667,0,0,1,6,.667V5.332a.666.666,0,1,1-1.333,0Z"
                                        transform="translate(4.242) rotate(45)" fill="#7f7f7f" />
                                </svg>
                            </span>

                            <a class="leading-[25px] text-[#7F7F7F]" href="{{ route('product', []) }}">{{ $product['setting']['product_meta_title'] ?? '' }}</a>

                            <span class="px-[8px]"><svg xmlns="http://www.w3.org/2000/svg" width="8.484" height="8.484" viewBox="0 0 8.484 8.484">
                                    <path id="Union_7" data-name="Union 7" d="M4.667,5.332v-4h-4A.666.666,0,1,1,.667,0H5.332A.667.667,0,0,1,6,.667V5.332a.666.666,0,1,1-1.333,0Z"
                                        transform="translate(4.242) rotate(45)" fill="#7f7f7f" />
                                </svg>
                            </span>
                            <a class="leading-[25px] text-[#7F7F7F]" href="{{ route('product', [$product['product_detail']->group]) }}">{{ $product['product_detail']->group->title ?? '' }}</a>
                            <span class="px-[8px]"><svg xmlns="http://www.w3.org/2000/svg" width="8.484" height="8.484" viewBox="0 0 8.484 8.484">
                                    <path id="Union_7" data-name="Union 7" d="M4.667,5.332v-4h-4A.666.666,0,1,1,.667,0H5.332A.667.667,0,0,1,6,.667V5.332a.666.666,0,1,1-1.333,0Z"
                                        transform="translate(4.242) rotate(45)" fill="#7f7f7f" />
                                </svg>
                            </span>
                            <a class="font-SFProDisPlayRegular text-[14px] leading-[25px] text-[#232323]"
                                href="{{ route('product.detail', [$product['product_detail']->group, $product['product_detail']]) }}">{{ $product['product_detail']->title ?? '' }}</a>
                        </div>
                        <div class="font-LexonRegular mb-[10px] mt-[35px]">
                            <h3 class="font-LexonRegular mb-[10px] mt-[35px] text-[14px] uppercase leading-[18px] text-[#CE4D00]">
                                {{ $product['product_detail']->group->title ?? '' }}</h3>
                            <h4 class="font-CormorantGaramondBold mb-[13px] text-[23px] md:text-[30px] uppercase leading-10 text-[#3B3B3B]">
                                {{ $product['product_detail']->title ?? '' }}</h4>
                            <p class="font-LexonLight mb-[6px] text-[#232323]">
                                {{ $ims['global_lang']['code'] ?? '' }} <span class="font-LexonMedium text-[15px] text-[#7F7F7F]">{{ $product['product_detail']->item_code ?? '' }}</span> </p>
                            <p class="font-LexonLight mb-[6px] text-[#232323]">
                                {{ $ims['global_lang']['material'] ?? '' }} <span class="font-LexonMedium text-[15px] text-[#7F7F7F]">{{ $arrOption[0] ?? 'Đang cập nhật' }}</span> </p>
                            <p class="font-LexonLight mb-[6px] text-[#232323]">
                                {{ $ims['global_lang']['size'] ?? '' }} <span class="font-LexonMedium text-[15px] text-[#7F7F7F]">{{ $arrOption[1] ?? 'Đang cập nhật' }}</span> </p>
                            <p class="font-LexonLight mb-[30px] mt-[10px] text-[18px] leading-[30px] text-[#D10F1B]">
                                {{ $ims['global_lang']['quote'] ?? '' }}</p>
                            <div class="font-MontserratRegular line-clamp-4 text-[16px] leading-[30px] text-[#232323] max-sm:text-[15px]">
                                {!! html_entity_decode($product['product_detail']->short) !!}
                            </div>
                        </div>
                    </div>
                    <form action="" method="post" class="md:mb-[40px] form-add-cart">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product['product_detail']->item_id ?? 0 }}">
                        <div class="flex">
                            <span class="sub group flex h-[43px] w-[43px] items-center justify-center rounded-full border border-[#CE4D00] text-[#CE4D00] hover:bg-[#CE4D00]">
                                <svg class="fill-[#CE4D00] group-hover:fill-[#fff]" id="Group_58601" data-name="Group 58601" xmlns="http://www.w3.org/2000/svg" width="15.042" height="2.256"
                                    viewBox="0 0 15.042 2.256">
                                    <rect id="Rectangle_9180" data-name="Rectangle 9180" width="2.256" height="15.042" rx="1.128" transform="translate(0 2.256) rotate(-90)" />
                                </svg>
                            </span>
                            <input type="number" name="quantity" id="" class="border-none bg-transparent text-center focus:ring-0" min="1" max="99" value="1">
                            <span class="add group flex h-[43px] w-[43px] items-center justify-center rounded-full border border-[#CE4D00] text-[#CE4D00] hover:bg-[#CE4D00]">
                                <svg class="fill-[#CE4D00] group-hover:fill-[#fff]" id="Group_58599" data-name="Group 58599" xmlns="http://www.w3.org/2000/svg" width="15.042" height="15.042"
                                    viewBox="0 0 15.042 15.042">
                                    <rect id="Rectangle_16422" data-name="Rectangle 16422" width="2.256" height="15.042" rx="1.128" transform="translate(6.393)" />
                                    <rect id="Rectangle_16423" data-name="Rectangle 16423" width="2.256" height="15.042" rx="1.128" transform="translate(0 8.649) rotate(-90)" />
                                </svg>
                            </span>
                        </div>
                        <button type="submit" class="mt-[20px] mx-auto w-[33%] md:w-[55%] bg-[#530507] py-[8px] md:py-[14px] text-white max-md:mb-[20px]">Đặt hàng</button>
                    </form>
                </div>
            </div>
            <div class="">
                <div class="my-[30px] flex max-md:flex-col">
                    <div class="tabs w-full pb-[30px] md:pr-[4.97%] md:w-[66.66%]">
                        <div class="bg-[#FCFCF8] px-[5.37%] pt-[40px] ">
                            <ul class="tab-nav mb-[23px] flex items-center max-sm:flex-wrap max-md:justify-center">
                                @if (!empty($product['product_detail']->contenttab_4))
                                    <li class="item change__button rounded-full bg-[#CE4D00] px-[10px] md:px-[25px] py-[5px] text-[15px] md:text-[17px] md:py-[12px] uppercase text-[#fff]" data-id="1" data-tab="tab1"><a
                                            class="bg font-LexonRegular inline-block w-full text-center leading-[28px] cursor-default"
                                            href="#">{{ $product['product_lang']['info_product'] ?? '' }}</a>
                                    </li>
                                @endif
                                @if (!empty($product['product_detail']->content))
                                    <li class="item change__button rounded-full px-[10px] md:px-[25px] py-[5px] text-[15px] md:text-[17px] md:py-[12px] uppercase text-[#232323]" data-tab="tab2" data-id="2"><a
                                            class="font-LexonRegular inline-block w-full text-center leading-[28px] cursor-default"
                                            href="#">{{ $product['product_lang']['info_technical'] ?? '' }}</a>
                                    </li>
                                @endif
                            </ul>
                            @if (!empty($product['product_detail']->contenttab_4))
                                <div id="tab1" class="tab-content font-LexonLight text-[16px] leading-[28px] text-[#232323] max-sm:text-[15px]">
                                    {!! html_entity_decode($product['product_detail']->contenttab_4 ?? '') !!}
                                </div>
                            @endif
                            @if (!empty($product['product_detail']->content))
                                <div id="tab2" class="tab-content font-LexonLight mb-[40px] hidden text-[16px] leading-[28px] text-[#232323] max-sm:text-[15px]">

                                    {!! html_entity_decode($product['product_detail']->content ?? '') !!}
                                </div>
                            @endif

                        </div>
                    </div>
                    @if (!empty($product['focus']))
                        <div class="h-full w-full bg-[#fff] md:w-[33.33%]">
                            <p class="font-LexonBold pb-[20px] pt-[10px] text-[25px] leading-[25px] text-[#530507] max-sm:text-[18px] max-sm:leading-6 uppercase">
                                {{ $product['product_lang']['focus'] ?? '' }}</p>
                            <div class="flex flex-col sm:flex-row md:flex-col">
                                @foreach ($product['focus'] as $item)
                                    <div class="w-full p-[10px] border border-transparent hover:border-[#DED9CA]">
                                        <div>
                                            <a href="{{ route('product.detail', [$item->group, $item]) }}" class="block aspect-[382/382]">
                                                <img src="{{ route('uploads', $item->picture ?? '') }}" alt="{{ $item->title ?? '' }}" width="382" height="382"
                                                    class="h-full w-full object-cover">
                                            </a>
                                            <a href="{{ route('product', $item->group) }}"
                                                class="font-LexonRegular mt-[18px] block text-[12px] uppercase text-[#CE4D00] md:text-[14px]">{{ $item->group->title ?? '' }}</a>
                                            <a href="{{ route('product.detail', [$item->group, $item]) }}"
                                                class="font-CormorantGaramondSemiBold mt-[5px] block text-[18px] uppercase md:text-[23px]">{{ $item->title ?? '' }}</a>
                                        </div>
                                        <div class="">
                                            <div class="font-LexonLight my-[14px] line-clamp-2 max-md:text-[13px]">{{ $item->short_limit ?? '' }}</div>
                                            <span
                                                class="font-LexonRegular mb-[10px] block text-[12px] text-[#CF0005] md:text-[15px]">{{ $item->price == 0 ? 'Giá liên hệ' : price_format($item->price) }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="container mt-[60px] pb-[30px] pl-[4.39%] pr-[2.74%] pt-[35px] md:border md:border-[#DED9CA]">
            <div class="max-h-[615px] overflow-y-scroll">
                <form action="{{route('product.comment')}}" method="post" class="w-full form-comment">
                    @csrf
                    <input type="hidden" name="id" value="{{$product['product_detail']->item_id ?? 1}}">
                    <input type="hidden" name="star" value="5">
                    <div class="w-[93.12%]">
                        <p class="font-LexonSemiBold pb-[17px] text-[16px] md:text-[25px] uppercase text-[#530507]">{{ $product['product_lang']['title_rate'] ?? 'Đánh giá và nhận xét sản phẩm' }}</p>
                        <div class="rate flex gap-x-[7px]">
                            @for ($i = 1; $i < 6; $i++)
                            <svg class="star" data-star="{{$i}}" xmlns="http://www.w3.org/2000/svg" width="26.316" height="25" viewBox="0 0 26.316 25">
                                <g id="Group_59015" data-name="Group 59015" transform="translate(0)">
                                    <path id="Path_105158" data-name="Path 105158"
                                        d="M582.3,337.471a2.474,2.474,0,0,1-1.152-.284l-5.4-2.809a.107.107,0,0,0-.05-.012.109.109,0,0,0-.05.012l-5.4,2.809a2.484,2.484,0,0,1-3.048-.593,2.418,2.418,0,0,1-.542-1.987l1.031-5.95a.1.1,0,0,0-.031-.093l-4.369-4.214a2.415,2.415,0,0,1-.626-2.509,2.452,2.452,0,0,1,2-1.666l6.038-.868a.106.106,0,0,0,.08-.058l2.7-5.413a2.486,2.486,0,0,1,4.437,0l2.7,5.414a.107.107,0,0,0,.08.058l6.038.868a2.452,2.452,0,0,1,2,1.666,2.415,2.415,0,0,1-.626,2.509l-4.37,4.214a.105.105,0,0,0-.03.093l1.031,5.95a2.417,2.417,0,0,1-.542,1.987A2.488,2.488,0,0,1,582.3,337.471Z"
                                        transform="translate(-562.541 -312.471)" fill="#FFB829" />
                                </g>
                            </svg>
                            @endfor
                        </div>
                        <div class="mt-[20px]">
                            <div class="w-full md:w-[88.05%] font-LexonLight text-[15px]">
                                <p class="error-content text-red-600 text-[13px] block h-[20px]"></p>
                                <textarea class="content w-full border border-[#DED9CA]" name="content" id="" cols="20" rows="6" placeholder="Nhận xét của bạn"></textarea>
                                <div class="flex max-md:flex-col max-md:gap-y-[15px] gap-x-[15px]">
                                    <div class=" w-full md:w-[42.87%]">
                                        <p class="error-name text-red-600 text-[13px] block h-[20px]"></p>
                                        <input class="name w-full border border-[#DED9CA] py-[9px] pl-[15px]" type="text" name="name" id="name" placeholder="Tên của bạn">
                                    </div>
                                    <div class=" w-full md:w-[42.87%]">
                                        <p class="error-email text-red-600 text-[13px] block h-[20px]"></p>
                                        <input class="email w-full border border-[#DED9CA] py-[9px] pl-[15px]" type="text" name="email" id="email" placeholder="Email">
                                    </div>
                                    <button type="submit" class="py-[9px] md:h-[44px] md:mt-auto px-[38px] bg-[#530507] text-white max-md:w-1/3 mx-auto">Gửi</button>
                                </div>
                            </div>
                        </div>
                        <div class="mt-[26px]">
                            <p class="text-[#530507] text-[16px] md:text-[25px] font-LexonSemiBold uppercase">{{$product['product_lang']['see_comment'] ?? 'Xem đánh giá của khách hàng'}} (Tổng cộng {{ count($product['product_detail']->comments) }})</p>
                            <div class="block">
                                @forelse ($product['product_detail']->comments as $item)
                                    <div class="py-[16px] border-b border-[#DED9CA] last:border-none">
                                        <div class="flex items-center">
                                            <span class="font-LexonSemiBold text-[16px] md:text-[20px] text-[#232323] pr-[10px]">{{ $item->name ?? '' }}</span>
                                            <span class="text-[#7F7F7F] text-[13px] md:text-[15px] font-LexonLight">{{date('d/m/Y', strtotime($item->date_create ?? now()))}}</span>
                                        </div>
                                        <div class="flex gap-x-[5px] mt-[6px]">
                                            @for ($i = 1; $i < $item->rate + 1; $i++)
                                            <svg id="Group_58737" data-name="Group 58737" xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19">
                                                <path id="Path_105158" data-name="Path 105158" d="M577.559,331.471a1.88,1.88,0,0,1-.875-.216l-4.1-2.135a.082.082,0,0,0-.038-.009.083.083,0,0,0-.038.009l-4.1,2.135a1.888,1.888,0,0,1-2.316-.451,1.837,1.837,0,0,1-.412-1.51l.784-4.522a.079.079,0,0,0-.023-.071l-3.321-3.2a1.835,1.835,0,0,1-.476-1.907,1.864,1.864,0,0,1,1.518-1.266l4.589-.66a.081.081,0,0,0,.061-.044l2.053-4.114a1.889,1.889,0,0,1,3.372,0l2.052,4.114a.081.081,0,0,0,.061.044l4.589.66a1.863,1.863,0,0,1,1.518,1.266,1.835,1.835,0,0,1-.476,1.907l-3.321,3.2a.08.08,0,0,0-.023.071l.784,4.522A1.837,1.837,0,0,1,579,330.8,1.891,1.891,0,0,1,577.559,331.471Z" transform="translate(-562.541 -312.471)" fill="#ffb829"/>
                                              </svg>
                                            @endfor
                                        </div>
                                        <div class="content pt-[8px] font-LexonRegular max-md:text-[13px]">{{ $item->content ?? '' }}</div>
                                    </div>
                                @empty
                                <span>{{$product['product_lang']['text_no_comment'] ?? 'Hãy trở thành người đánh giá đầu tiên của sản phẩm.'}}</span>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-[60px] bg-[#FCFCF8]">
            <div class="container pt-[50px] pb-[40px]">
                <div class="flex justify-between mb-[20px]">
                    <span class="text-[16px] md:text-[25px] text-[#530507] font-LexonSemiBold uppercase">Sản phẩm cùng loại</span>
                    <a href="{{route('product', $product['product_detail']->group ?? '')}}" class="flex items-center text-[13px] sm:text-[15px] font-LexonRegular">Xem tất cả <svg class="ml-[8px]" xmlns="http://www.w3.org/2000/svg" width="20" height="12.716" viewBox="0 0 20 12.716">
                        <path id="Path_134453" data-name="Path 134453" d="M0,6.258c.128-.4.437-.481.813-.481,7.376,0,9.461,0,16.837,0h.369c-.106-.115-.168-.186-.235-.253L13.4,1.132c-.047-.047-.1-.092-.139-.141a.579.579,0,0,1-.019-.822.571.571,0,0,1,.818.007c.056.049.108.1.16.154l5.467,5.476c.408.409.411.688.009,1.091l-5.553,5.564a.592.592,0,0,1-.871.108.548.548,0,0,1-.091-.736,2.244,2.244,0,0,1,.246-.276Q15.612,9.369,17.8,7.182c.062-.062.121-.128.23-.242H9.2l-8.4,0A.761.761,0,0,1,0,6.506Z" fill="#3a3a3a"/>
                      </svg>
                      </a>
                </div>
                <div class="flex flex-wrap">
                    @forelse ($product['related'] as $item)
                        <div class="w-full md:w-1/3 item p-[10px] max-md:border max-md:my-[10px] border border-transparent hover:border-[#DED9CA] flex flex-col justify-between">
                            <div>
                                <a href="{{route('product.detail', [$item->group, $item])}}" class="aspect-[382/382] block">
                                    <img src="{{route('thumbs', $item->picture ?? '') . '?w=382&h=382&fit=crop'}}" alt="{{$item->title ?? ''}}" class="w-full object-cover">
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
                        <span>Đang cập nhật...</span>
                    @endforelse
                </div>
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script type="module">
        $(function() {

            $('.form-comment').submit(function (e) {
                e.preventDefault();
                var email = $('.email').val();
                var name = $('.name').val();
                var content = $('.content').val();
                var error = false;
                if (email.length > 0) {
                    $('.error-email').text("");
                }
                if (email == '') {
                    $('.error-email').text('Email không được để trống');
                    error = true;
                    $('.email').focus();
                } else {
                    var regex_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                    if (!regex_email.test(email)) {
                        $('.error-email').text('Email không đúng định dạng.');
                        error = true;
                        $('.email').focus();
                    }
                }
                if (content.length > 0) {
                    $('.error-content').text("");
                }
                if (content == '') {
                    $('.error-content').text('Nội dung không được để trống');
                    $('.content').focus();
                }
                if (name.length > 0) {
                    $('.error-name').text("");
                }
                if (name == '') {
                    $('.error-name').text('Tên không được để trống');
                    error = true;
                    $('.name').focus();
                } else {
                    var regex_name =
                        /^([a-zA-Z-ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i;
                    if (!regex_name.test(name)) {
                        $('.error-name').text(
                            'Họ tên không được chứa số và ký tự đặc biệt.');
                        error = true;
                        $('.name').focus();
                    }
                    if (name.length > 50) {
                        $('.error-name').text('Tên không được vượt quá 50 ký tự.');
                        error = true;
                        $('.name').focus();
                    }
                }
                if(error){
                    return;
                }
                var data = $(this).serialize();
                $.ajax({
                    type: "post",
                    url: '{{route('product.comment')}}',
                    data: data,
                    success: function (response) {
                        console.log(response);
                        Swal.fire({
                            title : '',
                            icon : response.errors ? 'error' : 'success',
                            text: response.msg,
                            showConfirmButton : true,
                            confirmButtonText: 'Giỏ hàng',
                            showCancelButton: true,
                            cancelButtonText: 'Xem tiếp'
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                window.location.href = '{{route('cart.index')}}';
                            } else{
                                window.location.reload();
                            }
                        });

                    }
                });

            });

            $('.form-add-cart').submit(function (e) {
                e.preventDefault();
                var data = $(this).serialize();
                $.ajax({
                    type: "get",
                    url: '{{route('product.addtocart')}}',
                    data: data,
                    success: function (response) {
                        Swal.fire({
                            title : '',
                            icon : response.errors ? 'error' : 'success',
                            text: response.msg,
                            showConfirmButton : true,
                            confirmButtonText: 'Đến giỏ hàng',
                            showCancelButton: true,
                            cancelButtonText: 'Xem tiếp'
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                window.location.href = '{{route('cart.index')}}';
                            } else{
                                window.location.reload();
                            }
                        });

                    }
                });

            });

            $(document).on('click','.star', function(){
                var star = $(this).data('star');
                $('input[name="star"]').val(star);
                $('.rate').empty();
                for (let i = 1; i < 6; i++) {
                    if (i < star + 1) {
                        var html = '<svg class="star" id="Group_58737" data-star="'+i+'" data-name="Group 58737" xmlns="http://www.w3.org/2000/svg" width="26.316" height="25" viewBox="0 0 26.316 25">'
                            +'<path id="Path_105158" data-name="Path 105158" d="M582.3,337.471a2.474,2.474,0,0,1-1.152-.284l-5.4-2.809a.107.107,0,0,0-.05-.012.109.109,0,0,0-.05.012l-5.4,2.809a2.484,2.484,0,0,1-3.048-.593,2.418,2.418,0,0,1-.542-1.987l1.031-5.95a.1.1,0,0,0-.031-.093l-4.369-4.214a2.415,2.415,0,0,1-.626-2.509,2.452,2.452,0,0,1,2-1.666l6.038-.868a.106.106,0,0,0,.08-.058l2.7-5.413a2.486,2.486,0,0,1,4.437,0l2.7,5.414a.107.107,0,0,0,.08.058l6.038.868a2.452,2.452,0,0,1,2,1.666,2.415,2.415,0,0,1-.626,2.509l-4.37,4.214a.105.105,0,0,0-.03.093l1.031,5.95a2.417,2.417,0,0,1-.542,1.987A2.488,2.488,0,0,1,582.3,337.471Z" transform="translate(-562.541 -312.471)" fill="#ffb829"/>'
                            +'</svg>';
                    } else {
                        var html = '<svg class="star" id="Group_58737" data-star="'+i+'" data-name="Group 58737" xmlns="http://www.w3.org/2000/svg" width="26.316" height="25" viewBox="0 0 26.316 25">'
                            +'<path id="Path_105158" data-name="Path 105158" d="M582.3,337.471a2.474,2.474,0,0,1-1.152-.284l-5.4-2.809a.107.107,0,0,0-.05-.012.109.109,0,0,0-.05.012l-5.4,2.809a2.484,2.484,0,0,1-3.048-.593,2.418,2.418,0,0,1-.542-1.987l1.031-5.95a.1.1,0,0,0-.031-.093l-4.369-4.214a2.415,2.415,0,0,1-.626-2.509,2.452,2.452,0,0,1,2-1.666l6.038-.868a.106.106,0,0,0,.08-.058l2.7-5.413a2.486,2.486,0,0,1,4.437,0l2.7,5.414a.107.107,0,0,0,.08.058l6.038.868a2.452,2.452,0,0,1,2,1.666,2.415,2.415,0,0,1-.626,2.509l-4.37,4.214a.105.105,0,0,0-.03.093l1.031,5.95a2.417,2.417,0,0,1-.542,1.987A2.488,2.488,0,0,1,582.3,337.471Z" transform="translate(-562.541 -312.471)" fill="#7F7F7F"/>'
                            +'</svg>';
                    }
                    $('.rate').append(html)
                }
            })

            $('.tab-nav li').click(function(event) {
                event.preventDefault();
                var tabId = $(this).data('tab');
                $('.tab-content').addClass('hidden');
                $('.tab-content').attr('aria-selected', 'false');
                $('#' + tabId).removeClass('hidden');
                $('#' + tabId).attr('aria-selected', 'true');
            });

            $(".change__button").click(function() {
                let id = $(this).data('id');
                $('.item').removeClass('bg-[#CE4D00] text-[#fff]');
                // $('.item').addClass('bg-[#fff]');
                $(this).addClass('bg-[#CE4D00] text-[#fff]');
            });

            $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.slider-nav'
            });
            $('.slider-nav').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                dots: false,
                // infinite: false,
                arrows: false,
                focusOnSelect: true,
                vertical: true,
                verticalSwiping: true,
                responsive: [{
                        breakpoint: 769,
                        settings: {
                            slidesToShow: 2,
                            // slidesToScroll: 1,
                            arrows: false,
                            infinite: true,
                            vertical: true,
                            // verticalSwiping: false,
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            arrows: false,
                            infinite: true,
                            vertical: true,
                            // verticalSwiping: false,
                        }
                    }
                ]
            });

            $('.sub, .add').click(function(e) {
                updateQuantity($(this).hasClass('sub') ? 'sub' : 'add');
            });

            $('input[name="quantity"]').change(function(e) {
                updateQuantity('input');
            });

            function updateQuantity(action) {
                var qty = Number($('input[name="quantity"]').val());
                if (action == 'sub') {
                    $('input[name="quantity"]').val((qty - 1) < 1 ? 1 : (qty - 1));
                }
                if (action == 'add') {
                    $('input[name="quantity"]').val((qty + 1) > 99 ? 99 : (qty + 1));
                }
                if (action == 'input') {
                    $('input[name="quantity"]').val((qty) > 99 ? 99 : qty);
                }
            }
        });
    </script>
@endsection
