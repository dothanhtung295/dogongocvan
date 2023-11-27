<header class="fixed z-20 w-full md:absolute">
    <div class="navbar-container sticky__menu w-full max-md:hidden">
        <div class="menu-main container">
            @php
                $color = in_array(\Request::route()->getName(), ['product.detail', 'contact', 'cart.checkout.step1', 'cart.checkout.step2', 'cart.checkout.step3', 'cart.checkout.step4', 'cart.checkout.complete', 'forgot-password.active', 'post.detail','register']) ? '#000' : '#fff';
            @endphp
            <div class="item-center flex justify-between pt-[9px]">
                <div class="ml-5">
                    <a href="{{ route('home') }}" class="relative block">
                        <img width="121" height="" src="{{ route('uploads', $ims['logo']->content ?? '') }}" alt="{{ $ims['logo']->title ?? '' }}" class="lazyload object-cover">
                    </a>
                </div>
                <div class="flex items-start gap-[10px] text-white pt-[7px]" style="{{ $color == '#000' ? 'margin-top: 10px' : 'margin-top: 0px' }}">
                    <button type="button" data-dropdown-toggle="language-dropdown-menu" class="hidden lg:block">
                        <svg class="icon-child" style="fill: {{ $color }}" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="18"
                            viewBox="0 0 18 18">
                            <defs>
                                <clipPath id="clip-path">
                                    <rect id="Rectangle_16148" data-name="Rectangle 16148" width="18" height="18" />
                                </clipPath>
                            </defs>
                            <g id="Group_58790" data-name="Group 58790" transform="translate(-840.293 -22)">
                                <g id="Group_32" data-name="Group 32" transform="translate(840.293 22)">
                                    <g id="Group_16" data-name="Group 16" transform="translate(0)" clip-path="url(#clip-path)">
                                        <path id="Path_27" data-name="Path 27"
                                            d="M10.061,11.3c.151.163.222.2.325.3q2.544,2.554,5.095,5.1a.935.935,0,0,0,.952.362.838.838,0,0,0,.481-1.327,2.829,2.829,0,0,0-.3-.323Q14.11,12.906,11.6,10.4c-.1-.1-.147-.147-.31-.321A6.112,6.112,0,0,0,12.36,4.763a6.075,6.075,0,0,0-2.508-3.64,6.274,6.274,0,0,0-8.33,9.254,6.353,6.353,0,0,0,8.61,1.085M1.713,6.29a4.565,4.565,0,0,1,9.13-.033,4.565,4.565,0,1,1-9.13.033"
                                            transform="translate(0.441 0)" />
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </button>
                    <div class="z-50 hidden list-none divide-y divide-gray-100 rounded-lg bg-white text-base shadow dark:bg-gray-700" id="language-dropdown-menu">
                        <form method="get" action="{{ route('product') }}">
                            <input type="text" name="keyword"
                                class="shadow-full w-full rounded-lg border-[1px] border-white bg-white text-[#232323] placeholder:text-[14px] placeholder:italic focus:border-white focus:ring-0"
                                placeholder="{{ $ims['global_lang']['search_header'] ?? 'Tìm kiếm sản phẩm...' }}" value="{{request('keyword') ?? ''}}" required>
                        </form>
                    </div>
                    <a href="{{ route('cart.index') }}" class="relative mx-[20px]">
                        <span class="absolute right-[-10px] top-[-10px] h-[15px] w-[14px] rounded-full bg-[#ed3237] text-center text-[10px] text-white">{{ count(getCart() ?: []) }}</span>
                        <svg class="icon-child" style="fill: {{ $color }}" id="Group_58789" data-name="Group 58789" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="19" height="16" viewBox="0 0 19 16">
                            <defs>
                                <clipPath id="clip-path">
                                    <rect id="Rectangle_16146" data-name="Rectangle 16146" width="19" height="16" fill="{{ $color }}" />
                                </clipPath>
                            </defs>
                            <g id="Group_8" data-name="Group 8" clip-path="url(#clip-path)">
                                <path id="Path_20" data-name="Path 20"
                                    d="M19,5.023c-.2.627-.4,1.253-.595,1.88-.353,1.128-.7,2.257-1.056,3.384A2.278,2.278,0,0,1,15.078,12q-3.525.017-7.049,0a2.275,2.275,0,0,1-2.28-1.751L3.413,2.267a.763.763,0,0,0-.876-.653c-.575,0-1.15,0-1.725,0A.791.791,0,0,1,0,.88.777.777,0,0,1,.738.017,18.811,18.811,0,0,1,3,.053,2.126,2.126,0,0,1,4.854,1.562c.17.473.3.962.427,1.449.045.169.124.2.283.2q4.489-.007,8.979,0c1,0,1.992-.015,2.986.014a1.488,1.488,0,0,1,1.437,1.21A.326.326,0,0,0,19,4.5Z"
                                    transform="translate(0 -0.001)" />
                                <path id="Path_21" data-name="Path 21" d="M256.81,259.479a1.9,1.9,0,0,1-.929-.54,1.615,1.615,0,0,1-.2-1.828,1.59,1.59,0,1,1,1.768,2.326c-.04.01-.079.028-.119.042Z"
                                    transform="translate(-242.82 -243.479)" />
                                <path id="Path_22" data-name="Path 22" d="M145,259.56a4.4,4.4,0,0,1-.5-.191,1.585,1.585,0,1,1,1.2.123c-.063.019-.124.045-.187.068Z"
                                    transform="translate(-136.535 -243.56)" />
                            </g>
                        </svg>
                    </a>
                    <div class="show-menu">
                        <svg style="fill: {{ $color }}" class="icon-child mb-[10px] ml-auto" xmlns="http://www.w3.org/2000/svg" width="26" height="16" viewBox="0 0 26 16">
                            <g id="Group_58956" data-name="Group 58956" transform="translate(-1286 -130)">
                                <rect id="Rectangle_17626" data-name="Rectangle 17626" width="26" height="2" transform="translate(1286 130)" />
                                <rect id="Rectangle_17627" data-name="Rectangle 17627" width="21" height="2" transform="translate(1291 137)" />
                                <rect id="Rectangle_17628" data-name="Rectangle 17628" width="26" height="2" transform="translate(1286 144)" />
                            </g>
                        </svg>
                        <p class="text-menu uppercase font-LexonRegular text-[11px]" style="{{ 'color:' . $color }}">Menu</p>
                    </div>
                </div>

            </div>
        </div>
        <div class="font-LexonRegular menu-aside menu-desktop fixed left-0 top-0 z-50 flex h-[100vh] w-full justify-between text-[20px] text-white">
            <div class="menu flex">
                <div class="menu flex h-full w-full bg-[#530507] pl-[8.05%] md:w-[58.78%] overflow-hidden">
                    <ul class="flex h-full flex-col justify-center">
                        @foreach ($ims['menu'] as $item)
                            @if ($item->auto_sub == 'group')
                                <li class="mb-[35px] last:mb-0">
                                    <button id="{{ 'dropdownDelayButton' . ($item->id + 1) }}" data-dropdown-toggle={{ 'dropdownDelay' . ($item->id + 1) }} data-dropdown-delay="100"
                                        data-dropdown-trigger="hover" class="group service-sub flex w-full items-center gap-[5px] uppercase" type="button">
                                        <p>{{ $item->title ?? '' }}</p>
                                        <svg class="ml-2 h-4 w-4 rotate-90 icon-product group-hover:rotate-[270]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="6.729" height="10.761" viewBox="0 0 6.729 10.761">
                                            <path id="Path_105159" data-name="Path 105159"
                                                d="M24.514,5.076c-.095-.092-.689-.581-.749-.635L19.842.91C19.8.872,19.757.836,19.718.8A.432.432,0,0,1,19.7.136a.553.553,0,0,1,.733.006c.05.039.1.082.143.124l4.9,4.4c.366.329.368.553.008.877l-4.974,4.471a.57.57,0,0,1-.78.087.41.41,0,0,1-.082-.591,1.885,1.885,0,0,1,.22-.222l3.909-3.516c.056-.05.109-.1.206-.195Z"
                                                transform="translate(-19.271 0.276)" fill="#fff" stroke="#fff" stroke-width="0.5" />
                                        </svg>
                                    </button>
                                    <!-- Dropdown menu -->

                                </li>
                            @elseif(request()->path() == $item->link)
                                <li class="mb-[35px] uppercase last:mb-0">
                                    <a href="{{ $ims['home_link'] ?? ('' . '/' . $item->link ?? '') }}" class="uppercase" aria-current="page">{{ $item->title ?? '' }}</a>
                                </li>
                            @else
                                <li class="mb-[35px] uppercase last:mb-0">
                                    <a href="{{ $ims['home_link'] ?? ('' . '/' . $item->link ?? '') }}" class="uppercase" aria-current="page">{{ $item->title ?? '' }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    @foreach ($ims['menu'] as $item)
                        @if ($item->auto_sub == 'group')
                            <div id="{{ 'dropdownDelay' . ($item->id + 1) }}" aria-labelledby="{{ 'dropdownDelayButton' . ($item->id + 1) }}"
                                class="group service-sub-container hidden !relative z-10 !my-auto w-[70%]">
                                <div class="pl-[23.6%]">
                                    <ul class="font-LexonLight py-2 text-[17px] text-white">
                                        @if (!empty($ims[$item->name_action . '_dropdown']))
                                            @foreach ($ims[$item->name_action . '_dropdown'] as $row)
                                                {{-- @php
                                                        $sub = 'sub' . $item->name_action . 'group';
                                                    @endphp --}}
                                                <li>
                                                    <a href="{{ route($item->name_action, $row) }}" class="block px-4 py-[7px]">{{ $row->title }}</a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="md:w-[41.22%] h-full">
                    <img src="{{route('uploads', $ims['banner_menu']->content ?? '')}}" alt="" class="w-full h-full object-cover">
                </div>
            </div>

        </div>
        <div class="relative container">
            <div class="hide-menu hidden z-[51] mt-[10px] absolute w-[40%] h-[100vh] right-0 top-0 text-right text-white">
                <span class="material-icons-outlined cursor-pointer bg-[#530507] px-[13px] pb-[15px] pt-[11px]">
                    close
                </span>
            </div>
        </div>
    </div>
    {{-- Mobile --}}
    <div class="nav__mobile fixed left-0 top-0 z-[9999] h-[65px] w-full bg-[#fff] max-md:block md:block lg:hidden">
        <nav class="nav-bar relative flex items-center justify-between px-2">
            <a href="{{ route('home') }}" class="relative block aspect-[121/57] pt-[5px]">
                <img width="121" height="57" data-src="{{ route('uploads', $ims['logo']->content ?? '') }}" alt="{{ $ims['logo']->title ?? '' }}" class="lazyload">
            </a>

            <ul class="nav-menu fixed -left-[100%] top-0 z-[999] h-full w-full flex-col overflow-scroll bg-[#fff] px-[20px]" style=" transition: 750ms;">
                <a href="{{ route('home') }}" class="relative block pt-[15px]">
                    <img width="121" height="57" data-src="{{ route('uploads', $ims['logo']->content ?? '') }}" alt="{{ $ims['logo']->title ?? '' }}" class="lazyload">
                </a>
                <form action="{{ route('product') }}" class="flex items-center">
                    <div class="relative mr-[10px] w-full py-[10px]">
                        <input type="text" type="search" required value="{{ request('keyword') ?? '' }}" name="keyword"
                            class="shadow-full animation__search font-MontserratRegular block w-full rounded-[5px] border border-solid border-[#e7e4dc] p-2.5 pl-[10px] text-[15px] text-[#530507] placeholder:text-[15px] placeholder:text-[#530507] focus:border-[#E0EDFC] focus:ring-0"
                            placeholder="{{ $ims['global_lang']['search'] ?? '' }}" required>
                        <button type="submit" class="absolute inset-y-0 right-[20px] flex items-center pl-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.623" height="16.608" viewBox="0 0 16.623 16.608">
                                <path id="Path_101277" data-name="Path 101277"
                                    d="M485.236,779.877l-.861.865-3.91-3.9a7.127,7.127,0,0,1-6.135,1.527,6.919,6.919,0,0,1-4.295-2.76,7.193,7.193,0,0,1,10.347-9.834,6.983,6.983,0,0,1,2.6,4.911,7.1,7.1,0,0,1-1.646,5.279Zm-9.408-14.531a6,6,0,1,0,6,5.974A6,6,0,0,0,475.828,765.347Z"
                                    transform="translate(-468.614 -764.135)" fill="#530507" />
                            </svg>
                        </button>
                    </div>
                </form>
                @foreach ($ims['menu'] as $item)
                    @if ($item->auto_sub == 'group')
                        <li class="button__show-sub nav-item relative my-[25px]" data-id="{{ $item->id }}">
                            <span
                                class="{{ $item->name_action == Config('ims.cur.module') ? 'text-[#530507]' : 'text-[#7f7f7f]' }} font-LexonRegular color change_color-{{ $item->id }} text-[15px] uppercase">{{ html_entity_decode($item->title ?? '') }}
                            </span>
                            <span class="absolute right-[10px] top-[10px] inline-block rotate-90 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="5.49" height="10" viewBox="0 0 5.49 10">
                                    <defs>
                                        <clipPath id="clip-path">
                                            <rect id="Rectangle_10026" data-name="Rectangle 10026" width="10" height="5.49" transform="translate(0 0)" fill="none" />
                                        </clipPath>
                                    </defs>
                                    <g id="Group_20243" data-name="Group 20243" transform="translate(0 10) rotate(-90)" clip-path="url(#clip-path)">
                                        <path id="Path_77950" data-name="Path 77950"
                                            d="M.372,0A.544.544,0,0,0,0,.39v.2a1.011,1.011,0,0,0,.279.39q2.156,2.153,4.31,4.309a.516.516,0,0,0,.823,0L9.8.9A1.091,1.091,0,0,0,9.9.783.5.5,0,0,0,9.729.039Z"
                                            transform="translate(0 0)" />
                                    </g>
                                </svg>
                            </span>

                            <div
                                class="show__all-about show__menu-child-{{ $item->id }} shadow-full relative z-[1000] mt-[10px] flex w-full flex-col bg-[#fff] pl-[10px] max-md:hidden md:hidden">
                                @foreach ($ims['product_group'] as $item)
                                    <div>
                                        <a class="font-LexonLight block py-[5px] text-[14px] capitalize leading-7 text-[#7f7f7f]" href="{{ route('product', $item) }}">{{ $item->title }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </li>
                    @else
                        <li class="nav-item relative my-[25px]">
                            <a class="{{ $item->name_action == Config('ims.cur.module') ? 'text-[#530507]' : 'text-[#7f7f7f]' }} font-LexonRegular color change_color-{{ $item->id }} text-[15px] uppercase"
                                href="{{ route($item->name_action) }}">{{ html_entity_decode($item->title ?? '') }}
                            </a>
                        </li>
                    @endif
                @endforeach

                {{-- <li>
                    <button class="font-MontserratMedium mb-5 w-full bg-[#0084CA] py-[8px] text-center text-[15px] leading-6 text-[#fff]">{{ $ims['global_lang']['hotline_order'] ?? '' }}</button>
                </li>
                <li>
                    <a class="font-MontserratMedium inline-block w-full border border-solid border-[#0084CA] py-[8px] text-center text-[#111] hover:bg-[#0084CA] hover:text-[#fff]"
                        href="tel:{{ Config('ims.conf.hotline2') }}">{{ Config('ims.conf.hotline2') }}</a>
                </li> --}}
            </ul>
            <a href="{{ route('cart.index') }}" class="relative mr-[40px]">
                <span class="absolute right-[-10px] top-[-10px] h-[15px] w-[14px] rounded-full bg-[#ed3237] text-center text-[10px] text-white">{{ count(getCart() ?: []) }}</span>
                <svg class="" id="Group_58789" data-name="Group 58789" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="19" height="16"
                    viewBox="0 0 19 16">
                    <defs>
                        <clipPath id="clip-path">
                            <rect id="Rectangle_16146" data-name="Rectangle 16146" width="19" height="16" fill="#000" />
                        </clipPath>
                    </defs>
                    <g id="Group_8" data-name="Group 8" clip-path="url(#clip-path)">
                        <path id="Path_20" data-name="Path 20"
                            d="M19,5.023c-.2.627-.4,1.253-.595,1.88-.353,1.128-.7,2.257-1.056,3.384A2.278,2.278,0,0,1,15.078,12q-3.525.017-7.049,0a2.275,2.275,0,0,1-2.28-1.751L3.413,2.267a.763.763,0,0,0-.876-.653c-.575,0-1.15,0-1.725,0A.791.791,0,0,1,0,.88.777.777,0,0,1,.738.017,18.811,18.811,0,0,1,3,.053,2.126,2.126,0,0,1,4.854,1.562c.17.473.3.962.427,1.449.045.169.124.2.283.2q4.489-.007,8.979,0c1,0,1.992-.015,2.986.014a1.488,1.488,0,0,1,1.437,1.21A.326.326,0,0,0,19,4.5Z"
                            transform="translate(0 -0.001)" fill="#000" />
                        <path id="Path_21" data-name="Path 21" d="M256.81,259.479a1.9,1.9,0,0,1-.929-.54,1.615,1.615,0,0,1-.2-1.828,1.59,1.59,0,1,1,1.768,2.326c-.04.01-.079.028-.119.042Z"
                            transform="translate(-242.82 -243.479)" fill="#000" />
                        <path id="Path_22" data-name="Path 22" d="M145,259.56a4.4,4.4,0,0,1-.5-.191,1.585,1.585,0,1,1,1.2.123c-.063.019-.124.045-.187.068Z"
                            transform="translate(-136.535 -243.56)" fill="#000" />
                    </g>
                </svg>
            </a>
            <div class="hamburger fixed right-[10px] z-[9999]">
                @for ($i = 0; $i < 3; $i++)
                    <span class="bar mx-auto my-[6px] block h-[2px] w-[20px] bg-[#530507]" style=" transition: all 300ms ease-in-out;"></span>
                @endfor
            </div>
        </nav>
    </div>
    {{-- End Mobile --}}

</header>

{{-- Menu  --}}

{{-- End menu --}}
{{-- End Desktop --}}
