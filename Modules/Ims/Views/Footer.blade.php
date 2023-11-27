<footer class="footer font-LexonLight bg-[#FCFBF8] pt-[50px] text-[15px] text-[#232323] cursor-default">
    <section class="infor-footer-container container">
        <div class="flex max-md:flex-wrap">
            <div class="w-full pr-[15.1%] md:w-[58%]">
                <img src="{{ route('uploads', $ims['logo_footer']->content ?? '') }}" alt="{{ $ims['logo_footer']->title ?? '' }}" width="518" class="w-full object-cover">
                <div class="pb-[30px] pt-[22px]">{!! html_entity_decode($ims['logo_footer']->short ?? '') !!}</div>
            </div>
            <div class="w-full max-md:pb-[30px] md:w-[42%]">
                <div class="mb-[20px] flex w-full items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16.506" height="22.38" viewBox="0 0 16.506 22.38">
                        <g id="Group_58636" data-name="Group 58636" transform="translate(0.5 0.5)">
                            <path id="Exclusion_1" data-name="Exclusion 1"
                                d="M7.756,21.044v0C7.678,20.951,0,11.806,0,7.652A7.713,7.713,0,0,1,7.756,0a7.709,7.709,0,0,1,7.75,7.652c0,4.184-7.67,13.3-7.748,13.39Zm0-17.57a4.18,4.18,0,1,0,4.235,4.178A4.213,4.213,0,0,0,7.756,3.474Z"
                                transform="translate(0 0)" fill="#530507" stroke="rgba(0,0,0,0)" stroke-miterlimit="10" stroke-width="1" />
                        </g>
                    </svg>
                    <div class="ml-[10px] text-[16px] leading-[19px]">Địa chỉ: <span class="font-LexonMedium text-[15px]">{{ Config('ims.conf.address') ?? '' }}</span></div>
                </div>
                <div class="mb-[20px] flex w-full items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15.525" height="15.525" viewBox="0 0 15.525 15.525">
                        <path id="Icon_awesome-phone-alt" data-name="Icon awesome-phone-alt"
                            d="M15.082,10.971l-3.4-1.455a.728.728,0,0,0-.849.209l-1.5,1.838A11.239,11.239,0,0,1,3.96,6.189L5.8,4.685a.726.726,0,0,0,.209-.849L4.551.44A.733.733,0,0,0,3.718.019L.564.746A.728.728,0,0,0,0,1.456a14.068,14.068,0,0,0,14.07,14.07.728.728,0,0,0,.71-.564l.728-3.154a.737.737,0,0,0-.425-.837Z"
                            transform="translate(0 0)" fill="#530507" />
                    </svg>

                    <div class="ml-[10px] text-[16px] leading-[19px]">Hotline: <span class="font-LexonMedium text-[15px]">{{ Config('ims.conf.hotline') ?? '' }}</span></div>
                </div>
                <div class="mb-[20px] flex w-full items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16.667" height="13.333" viewBox="0 0 16.667 13.333">
                        <path id="Path_2306" data-name="Path 2306"
                            d="M17,4H3.667A1.664,1.664,0,0,0,2.008,5.667L2,15.667a1.672,1.672,0,0,0,1.667,1.667H17a1.672,1.672,0,0,0,1.667-1.667v-10A1.672,1.672,0,0,0,17,4Zm0,3.333L10.333,11.5,3.667,7.333V5.667l6.667,4.167L17,5.667Z"
                            transform="translate(-2 -4)" fill="#530507" />
                    </svg>

                    <div class="ml-[10px] text-[16px] leading-[19px]">Email: <span class="font-LexonMedium text-[15px]">{{ Config('ims.conf.email') ?? '' }}</span></div>
                </div>
                <div class="flex w-full items-center">
                    <svg id="Group_58905" data-name="Group 58905" xmlns="http://www.w3.org/2000/svg" width="16.598" height="16.63" viewBox="0 0 16.598 16.63">
                        <path id="Path_49099" data-name="Path 49099"
                            d="M718.1-530.872v1.007l-.132,1.038c-.388-.129-.754-.259-1.126-.368-.174-.051-.247-.123-.18-.3a.638.638,0,0,0,.01-.172c-.34,0-.669.008-1,0a1.734,1.734,0,0,1-.473-.078c-1.338-.44-2.674-.888-3.971-1.32h1.434l-.239-2.059-1.923.184v1.888h.353a2,2,0,0,0-1.734,1.6c-.01-.1-.015-.147-.021-.2h-2.166l.239,2.11c.092-.012.144-.02.2-.026.445-.047.89-.105,1.336-.138.4-.03.4-.018.4-.424v-.629a1.7,1.7,0,0,1,.119.309c.356,1.071.7,2.145,1.075,3.211a2.836,2.836,0,0,1,.185,1.156c-.01.13,0,.262,0,.423l.271-.2.558,1.683c-.04.01-.056.015-.071.017l-.96.128h-1.005c-.052-.01-.1-.022-.157-.029-.294-.04-.591-.064-.881-.121a8.123,8.123,0,0,1-5.061-3.161,8.089,8.089,0,0,1-1.6-6.128,8.058,8.058,0,0,1,2.31-4.7,8.115,8.115,0,0,1,4.481-2.36c.3-.053.607-.086.911-.128h1.037c.277.036.556.062.832.109a8.137,8.137,0,0,1,4.086,1.933,8.187,8.187,0,0,1,2.735,4.84C718.031-531.482,718.063-531.176,718.1-530.872Zm-12.552,1.211h-2.626a6.866,6.866,0,0,0,1.054,3.029l1.835-.653Zm-1.572-4.412a6.87,6.87,0,0,0-1.052,3h2.624l.264-2.348Zm10.078,3h2.627a6.922,6.922,0,0,0-1.054-3l-1.836.656Zm-4.95-1.875-1.932-.187-.234,2.059h2.166Zm0-1.39v-2.7a5.194,5.194,0,0,0-1.56,2.558Zm1.4-2.7v2.7l1.56-.147A5.224,5.224,0,0,0,710.509-537.038Zm-1.4,10.67-1.568.149a5.249,5.249,0,0,0,1.568,2.56Zm5.632-8.828a6.869,6.869,0,0,0-2.05-1.444c.235.585.471,1.18.714,1.771a.134.134,0,0,0,.115.06C713.916-534.929,714.309-535.057,714.742-535.2Zm-8.6.418.794-1.869a6.806,6.806,0,0,0-2.059,1.449Zm-1.27,9.273a6.913,6.913,0,0,0,2.063,1.448l-.794-1.868Z"
                            transform="translate(-701.507 538.667)" fill="#530507" />
                        <path id="Path_49100" data-name="Path 49100"
                            d="M911.913-322.927a.716.716,0,0,1-.412-.483q-1.055-3.2-2.121-6.394a.516.516,0,0,1,.4-.736.647.647,0,0,1,.284.036q3.237,1.075,6.473,2.155a.655.655,0,0,1,.405.387v.26a.771.771,0,0,1-.484.415q-1.332.5-2.656,1.024a.374.374,0,0,0-.19.19q-.518,1.319-1.016,2.646a.78.78,0,0,1-.419.5Z"
                            transform="translate(-900.339 339.557)" fill="#530507" />
                    </svg>

                    <div class="ml-[10px] text-[16px] leading-[19px]">Website: <span class="font-LexonMedium text-[15px]">{{ Config('ims.conf.website') ?? '' }}</span></div>
                </div>
            </div>
        </div>
        <hr class="w-full bg-[#E2DED1]">
    </section>
    <section class="menu-footer-container container pt-[30px]">
        <div class="flex pb-[30px] max-lg:flex-wrap">
            <div class="max- w-full pr-[5.55%] md:w-1/2 lg:w-[15.76%]">
                <h4 class="font-LexonBold pb-[15px] text-[15px] uppercase md:text-[18px]">Thông tin</h4>
                <ul>
                    @foreach ($ims['menu_footer'] as $item)
                        <li class="pb-[10px] last:pb-0">
                            <a href="{{ route($item->name_action ?? '/') }}">{{ $item->title ?? '' }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="w-full pr-[6.58%] max-md:pt-[20px] md:w-1/2 lg:w-[27.94%]">
                <h4 class="font-LexonBold pb-[15px] text-[15px] uppercase md:text-[18px]">Danh mục phản phẩm</h4>
                <ul>
                    @foreach ($ims['menu_footer1'] as $item)
                        <li class="pb-[10px] last:pb-0">
                            <a href="{{ route('/') .'/' . $item->link ?? '' }}">{{ $item->title ?? '' }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="w-full pr-[7.54%] max-lg:pt-[20px] md:w-1/2 lg:w-[30.93%]">
                <h4 class="font-LexonBold pb-[15px] text-[15px] uppercase md:text-[18px]">Hỗ trợ khách hàng</h4>
                <ul>
                    @foreach ($ims['menu_footer2'] as $item)
                        <li class="pb-[10px] last:pb-0">
                            <a href="{{ route('/') .'/' . $item->link ?? '' }}">{{ $item->title ?? '' }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="w-full max-lg:pt-[20px] md:w-1/2 lg:w-[27.37%]">
                <iframe title="Fanpage Đồ gỗ Ngọc Văn"
                    src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fdogongocvan%3Fref%3Dembed_page&tabs=timeline&width=330&height=200&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId&lazy=true"
                    width="330" height="200" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true"
                    allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </div>
        </div>
        <hr class="w-full bg-[#E2DED1]">
    </section>
    <section class="copyright-container container flex items-center justify-between py-[15px]">
        <div class="font-LexonLight text-[14px] text-[#7F7F7F]">
            Copyright © 2023. All rights reserved. <a href="https://thietkewebsite.info.vn/">Thiết kế web IMS</a> </div>
        <div>
            <ul class="flex list-none items-center" id="share">
                @if (!empty($ims['config_social']))
                @foreach ($ims['config_social'] as $item)
                <li class="inline-flex items-center pr-[15px]"><a href="{{$item->link ?? ''}}" target="_blank"><img
                            src="{{ route('uploads', $item->picture ?? '') }}" alt="facebook" width="40"></a></li>
                @endforeach
                {{-- <li class="inline-flex items-center p-[0_8px] lg:p-[0_10px]"><a href="https://plus.google.com/share?url={{ request()->url() }}" target="_blank"><img
                            src="{{ route('uploads', 'img/gg.png') }}" alt="pinterest" width="40"></a></li>
                <li class="inline-flex items-center p-[0_8px] lg:p-[0_10px]"><a href="https://www.instagram.com/?url={{ request()->url() }}" target="_blank"><img
                            src="{{ route('uploads', 'img/youtube.png') }}" alt="instagram" width="40"></a></li>
                <li class="inline-flex items-center"><a href="https://twitter.com/intent/tweet?url={{ request()->url() }}" target="_blank"><img
                            src="{{ route('uploads', 'img/tw.png') }}" alt="twitter" width="40"></a></li> --}}
                @endif
            </ul>
        </div>
        {{-- <div class="follow">
            <a class="text-center w-[38px] h-[38px] flex items-center justify-center mr-[8px] bg-[#1667e1] border border-[#1667e1] rounded-full " href="https://www.facebook.com/dogongocvan/" target="_blank" class="solo-item">
                <svg class="text-center" xmlns="http://www.w3.org/2000/svg" width="11.257" height="21.699" viewBox="0 0 11.257 21.699">
                <g id="Group_38672" data-name="Group 38672" transform="translate(0)">
                  <path id="Path_134398" data-name="Path 134398" d="M-1388.741-318.3h-4v-9.881h-3.315v-3.865h3.313c0-.168,0-.292,0-.417.021-1.141-.026-2.288.078-3.421a4.388,4.388,0,0,1,4.266-4.092c.84-.053,1.688,0,2.531.016.351.008.7.059,1.069.092v3.461c-.6,0-1.184-.009-1.769,0a6.019,6.019,0,0,0-1.02.08,1.238,1.238,0,0,0-1.1,1.233c-.041.989-.011,1.982-.011,3.022h3.8c-.078.631-.148,1.209-.222,1.787-.078.613-.17,1.225-.235,1.84-.022.21-.1.26-.3.258-.9-.009-1.8,0-2.695,0h-.387Z" transform="translate(1396.06 340)" fill="#fff"/>
                </g>
              </svg>
              </a>

            <a class="block text-center mr-[8px]" href="https://plus.google.com/u/0/" target="_blank" class="solo-item"><i class="ficon-gplus"></i></a>

            <a class="block text-center mr-[8px]" href="https://www.youtube.com/channel/UC2VXqYBq___zJYT7FQxjIyQ?view_as=subscriber" target="_blank" class="solo-item"><i class="ficon-youtube"></i></a>

            <a class="block text-center mr-[8px]" href="http://www.twiter.com" target="_blank" class="solo-item"><i class="ficon-twitter"></i></a>

        </div> --}}
    </section>

</footer>
