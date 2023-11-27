@extends('Ims::Ims')
@section('title')
    Thanh toán & đặt mua
@endsection
@section('meta')
    <meta name="description" content="{{ $about['setting']['about_meta_desc'] ?? '' }}" />
    <meta name="keywords" content="{{ $about['setting']['about_meta_key'] ?? '' }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" name="title" content="{{ $about['setting']['about_meta_title'] ?? '' }}" />
    <meta property="og:description" content="{{ $about['setting']['about_meta_desc'] ?? '' }}" />
    <meta property="og:url" content={{ $ims['url'] ?? '' }} />
    <meta property="og:image" content={{ route('uploads', $ims['logo']->content ?? '') }} />
@endsection

@section('css')
    <link rel="stylesheet" href="{{ mix('css/cart.css') }}" />
    <style>
        .register-email-container {
            display: none
        }
    </style>
@endsection
@section('content')
    @php
        $cities = getAllCity() ?: [];
        $data = Illuminate\Support\Facades\Cookie::get('data-checkout');
        $data = json_decode($data, true);
    @endphp
    <main class="font-LexonLight main-container cursor-default bg-[#FCFCF8] text-[14px] text-[#303036]">
        <div class="register container mt-[81px]">

            <div class="bs-wizard max-md:hidden">
                <div class="bs-wizard-step active">
                    <div class="bs-wizard-stepnum">
                        <span>Đăng nhập</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <span class="bs-wizard-dot">1</span>
                </div>
                <div class="bs-wizard-step active">
                    <div class="bs-wizard-stepnum">
                        <span class="hidden-xs">Địa chỉ giao hàng</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <span class="bs-wizard-dot">2</span>
                </div>
                <div class="bs-wizard-step">
                    <div class="bs-wizard-stepnum">
                        <span class="hidden-xs">Thanh toán &amp; đặt mua</span>
                    </div>
                    <div class="progress progress_1">
                        <div class="progress-bar"></div>
                    </div>
                    <span class="bs-wizard-dot">3</span>
                </div>
                <span class="bs-wizard-step disabled bs-wizard-last">
                    <div class="bs-wizard-stepnum">
                        <span class="hidden-xs">Hoàn tất</span>
                    </div>
                    <span class="bs-wizard-dot">4</span>
                </span>
            </div>
            <h3 class="font-LexonRegular text-[18px]">Thanh toán & đặt mua</h3>
            <div class="flex max-md:flex-wrap gap-[20px]">
                <form action="{{ route('cart.checkout.step3.post') }}" method="post" class="form-register w-full p-[20px] md:w-[65%]">
                    @csrf
                    @if (!empty($checkout['order_shipping']))
                        <p class="pb-[15px]">Chọn gói giao hàng</p>
                        <div id="accordion-collapse" data-accordion="collapse" class="">
                            @foreach ($checkout['order_shipping'] as $key => $item)
                                <div class="pb-[15px]">
                                    <div id="accordion-collapse-heading-{{ $key }}" class="font-LexonMedium pb-[15px] text-[15px]">
                                        <input class="!text-[#0075ff] focus:ring-0" data-ship="{{ $item->price_shipping }}" {{ $key == 0 ? 'checked' : '' }} type="radio"
                                            data-accordion-target="#accordion-collapse-body-{{ $key }}" aria-expanded="true" aria-controls="accordion-collapse-body-{{ $key }}"
                                            name="order_shipping" id="order-shipping-{{ $key }}" value="{{ $item->shipping_id ?? 1 }}">
                                        <label for="order-shipping-{{ $key }}">{{ $item->title ?? '' }}</label>
                                    </div>
                                    <div id="accordion-collapse-body-{{ $key }}" class="hidden bg-[#eee] p-[15px]" aria-labelledby="accordion-collapse-heading-{{ $key }}">
                                        {!! html_entity_decode($item->content ?? '') !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if (!empty($checkout['order_method']))
                        <p class="pb-[15px]">Chọn hình thức thanh toán</p>
                        <div id="accordion-collapse-method" data-accordion="collapse" class="">
                            @foreach ($checkout['order_method'] as $key => $item)
                                <div class="pb-[15px]">
                                    <div id="accordion-heading-method-{{ $key }}" class="font-LexonMedium pb-[15px] text-[15px]">
                                        <input class="!text-[#0075ff] focus:ring-0" {{ $key == 0 ? 'checked' : '' }} type="radio" data-accordion-target="#accordion-body-method-{{ $key }}"
                                            aria-expanded="true" aria-controls="accordion-body-method-{{ $key }}" name="order_method" id="order-method-{{ $key }}"
                                            value="{{ $item->method_id ?? 1 }}">
                                        <label for="order-method-{{ $key }}">{{ $item->title ?? '' }}</label>
                                    </div>
                                    <div id="accordion-body-method-{{ $key }}" class="hidden bg-[#eee] p-[15px]" aria-labelledby="accordion-heading-method-{{ $key }}">
                                        {!! html_entity_decode($item->content ?? '') !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="form-group">
                        <p class="text-[15px] pb-[10px]">Yêu cầu khác</p>
                        <textarea name="content" id="" cols="30" rows="5" class="w-full bg-[#FCFCF8] border border-[#c5c5c5] focus:ring-0"></textarea>
                    </div>
                    <input type="checkbox" name="export_bill" id="export-bill">
                    <label for="export-bill">Yêu cầu xuất hóa đơn đỏ cho đơn đặt hàng này</label>
                    <div class="panel_invoice hidden" style="">
                        <div class="row_input">
                            <span class="title">Tên công ty</span> <input type="text" name="invoice_company" value="">
                        </div>
                        <div class="row_input">
                            <span class="title">Mã số thuế</span> <input type="text" name="invoice_tax_code" value="">
                        </div>
                        <div class="row_input">
                            <span class="title">Địa chỉ</span> <textarea type="text" name="invoice_address"></textarea>
                        </div>
                    </div>
                    <div class="flex justify-between max-md:mt-[10px]">
                        <a href="{{ route('cart.checkout.step2') }}" class="mt-[10px] flex w-fit items-center p-[5px] text-[14px]"><span
                            class="material-icons-outlined ml-[5px] rounded !text-[14px]">keyboard_double_arrow_left</span><span class="underline">Tiếp tục mua hàng </span></a>
                        <button type="submit" class="rounded border border-[#cd1233] bg-gradient-to-b from-[#e54d42] to-[#d72041] p-[8px_12px] text-white md:w-[270px]">Đồng ý</button>
                    </div>
                </form>

                <div class="w-full md:w-[35%]">
                    <div class="w-full border border-[#ddd] p-[20px]">
                        <div class="flex items-center justify-between border-b border-[#c5c5c5] pb-[15px]">
                            <p>Đơn hàng ({{ count(getCart() ?: []) }}) sản phẩm</p>
                            <a href="{{ route('cart.index') }}" class="border border-[#d2d2d2] bg-gradient-to-b from-white to-[#e6e6e6] px-[10px] py-[5px] hover:bg-white">Sửa</a>
                        </div>

                        @foreach (getCart() ?: [] as $item)
                            <div class="item border-b border-[#c5c5c5] p-[5px]">
                                <b>{{ $item['qty'] }} x </b>
                                <span class="max-w-[65%] text-[#337ab7]">{{ $item['attributes']['name'] }}</span>
                                <span class="float-right">{{ price_format($item['price'] * $item['qty']) }}</span>
                            </div>
                        @endforeach
                        <div class="border-b border-[#c5c5c5] p-[5px]">
                            <p class="py-[5px]">Tạm tính: <span class="float-right">{{ price_format(getTotal() ?? 0) }}</span></p>
                            <p class="price-ship py-[5px]">Phí vận chuyển: <span class="float-right">{{ price_format($checkout['order_shipping'][0]->price_shipping ?? 0) }}</span></p>
                            <p class="price-freeship hidden py-[5px]">Phí vận chuyển: <span class="float-right">{{ price_format(0) }}</span></p>
                        </div>
                        <p class="total-ship font-LexonRegular border-t border-[#c5c5c5] px-[5px] py-[10px]">Tổng cộng <span
                                class="float-right text-[18px] text-red-700">{{ price_format((getTotal() ?? 0) + ($checkout['order_shipping'][0]->price_shipping ?? 0)) }}</span></p>
                        <p class="total-freeship hidden font-LexonRegular border-t border-[#c5c5c5] px-[5px] py-[10px]">Tổng cộng <span
                                class="float-right text-[18px] text-red-700">{{ price_format(getTotal() ?? 0) }}</span></p>
                    </div>

                    {{-- Thông tin đặt và nhận hàng --}}
                    <div class="w-full border border-[#ddd] p-[15px] mt-[20px]">
                        <div class="w-full border border-[#ddd] mb-[25px]">
                            <div class="flex items-center justify-between bg-[#f9f9f9] p-[10px_4px] mb-[5px]">
                                <p class="font-LexonMedium">Thông tin đặt hàng</p>
                                <a href="{{ route('cart.checkout.step2') }}" class="border border-[#d2d2d2] bg-gradient-to-b from-white to-[#e6e6e6] px-[10px] py-[5px] hover:bg-white">Sửa</a>
                            </div>
                            <p class="uppercase pb-[5px] pl-[10px] font-LexonMedium">{{ $data['name_send'] ?? '' }}</p>
                            <p class="pb-[5px] pl-[10px]">{{$data['email_send'] ?? ''}}</p>
                            <p class="pb-[5px] pl-[10px]">Điện thoại: {{$data['phone_send'] ?? ''}}</p>
                            <p class="pb-[5px] pl-[10px]">Địa chỉ: {{$data['address_send'] ?? ''}}</p>
                        </div>
                        <div class="w-full border border-[#ddd]">
                            <div class="flex items-center justify-between bg-[#f9f9f9] p-[10px_4px] mb-[5px]">
                                <p class="font-LexonMedium">Thông tin nhận hàng</p>
                                <a href="{{ route('cart.checkout.step2') }}" class="border border-[#d2d2d2] bg-gradient-to-b from-white to-[#e6e6e6] px-[10px] py-[5px] hover:bg-white">Sửa</a>
                            </div>
                            <p class="uppercase pb-[5px] pl-[10px] font-LexonMedium">{{ $data['name_receive'] ?? '' }}</p>
                            <p class="pb-[5px] pl-[10px]">{{$data['email_receive'] ?? ''}}</p>
                            <p class="pb-[5px] pl-[10px]">Điện thoại: {{$data['phone_receive'] ?? ''}}</p>
                            <p class="pb-[5px] pl-[10px]">Địa chỉ: {{$data['address_receive'] ?? ''}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('js')
    <script type="module">

        $(function () {

            $('#export-bill').change(function () {
                $('.panel_invoice').toggleClass('hidden');
            })

            $('input[name="order_shipping"]').change(function(){
                var ship = $(this).data('ship');
                if(ship == 0){
                    $('.total-freeship, .price-freeship').removeClass('hidden');
                    $('.total-ship, .price-ship').addClass('hidden');
                } else {
                    $('.total-freeship, .price-freeship').addClass('hidden');
                    $('.total-ship, .price-ship').removeClass('hidden');
                }
            })
        });

    </script>
@endsection
