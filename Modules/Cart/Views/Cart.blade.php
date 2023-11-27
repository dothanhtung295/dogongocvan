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
    <main class="cursor-default bg-[#FCFCF8] text-[#232323]">
        <section>
            <div class="banner-main relative w-full max-md:h-[50vh]">
                <div class="absolute top-[42%] z-[1] w-full text-[30px] text-white md:text-[50px]">
                    <div class="container">
                        <h2 class="font-LexonBold uppercase">{{ $banner->title ?? '' }}</h2>
                        <span class="font-CormorantGaramondRegular">{!! html_entity_decode($banner->short ?? '') !!}</span>
                    </div>
                </div>
                <div class="relative h-full w-full">
                    <div class="shadow-banner absolute h-full w-full">
                        <div class="to-none absolute left-0 top-0 h-1/3 w-full bg-gradient-to-b from-[#2C1100]"></div>
                        <div class="to-none absolute left-0 top-0 h-full w-3/4 bg-gradient-to-r from-[#2C1100]"></div>
                    </div>
                    <img class="h-full w-full object-cover" src="{{ route('uploads', $banner->content ?? '') }}" alt="{{ $banner->title ?? '' }}">
                </div>
            </div>
        </section>
        <div class="container mb-[30px] mt-[20px] md:mt-[81px] flex max-lg:flex-wrap-reverse font-LexonLight">
            <div class="w-full lg:w-[70%] max-lg:mt-[30px]">
                <form action="{{route('cart.update')}}" method="post" class="border border-[#c5c5c5] overflow-scroll">
                    @csrf
                    <table class="cart-table w-full overflow-scroll max-md:min-w-[700px]">
                        <thead class=" border-b border-[#c5c5c5] ">
                            <tr>
                                <td class="col" width="45%">Sản phẩm trong giỏ hàng: <span class="rounded-full bg-[#777777] p-[3px_7px] text-center text-[10px] text-white">{{ count(getCart() ?: []) }}</span></td>
                                <td class="col" width="15%">Giá</td>
                                <td class="col" width="14%">Số lượng</td>
                                <td class="col" width="20%">Tổng tiền</td>
                                <th class="col" width="6%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cart ?: [] as $item)
                                <tr>
                                    <td class="whitespace-nowrap">
                                        <div class="flex text-[14px]">
                                            <img src="{{ route('thumbs', $item['attributes']['picture'] ?? '') . '?w=60&h=60&fit=crop' }}" alt="{{ $item['attributes']['name'] ?? '' }}"
                                                class="mr-[10px] object-cover">
                                            <div>
                                                <p>{{ $item['attributes']['name'] ?? '' }}</p>
                                                <p class="text-[#999]">Code: {{ $item['attributes']['code'] ?? '' }}</p>
                                            </div>
                                        </div>
                                        {{ $item['name'] ?? '' }}
                                    </td>
                                    <td class="font-bold text-[14px]">{{ $item['price'] == 0 ? 'Liên hệ' : price_format($item['price'] ?? 0) }}</td>
                                    <td class="whitespace-nowrap">
                                        <select name="qty" id="quantity" class="border border-[#c5c5c5] p-[3px_5px] text-center" data-id="{{$item['id']}}">
                                            @for ($i = 1; $i < 100; $i++)
                                                <option value="{{ $i }}" {{ $item['qty'] == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td class="text-[14px] whitespace-nowrap">
                                        {{ price_format($item['price'] * $item['qty']) }}
                                    </td>
                                    <td class="whitespace-nowrap">
                                        <span class="material-icons-outlined remove-item cursor-pointer" data-id="{{ $item['id'] }}">delete</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Không có sản phẩm trong giỏ hàng</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="flex max-md:flex-wrap-reverse justify-center md:justify-between mb-[20px] px-[20px] items-center">
                        <a href="{{route('product')}}" class="flex items-center text-[14px] max-md:mt-[15px] max-md:w-full max-md:justify-center"><span class="material-icons-outlined max-md:pr-[4px] pr-[10px] !text-[14px]">keyboard_double_arrow_left</span> Tiếp tục mua hàng</a>
                        <div class="flex max-md:w-full max-md:justify-center">
                            {{-- <button class="bg-gradient-to-b from-white to-[#e6e6e6] p-[4px_12px] border border-[#d2d2d2] rounded-[4px] mr-[15px]">Cập nhật</button> --}}
                            <a href="{{route('cart.checkout.step1')}}" class="uppercase p-[6px_12px] bg-gradient-to-b from-[#e54d42] to-[#d72041] border boder-[#cd1233] text-white rounded-[4px]">Tiến hành đặt hàng</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="ml-[20px] h-fit w-fit md:w-[30%] border max-lg:mx-auto border-[#ddd]">
                <div class="flex justify-between border-b border-[#d2d2d2] p-[14px_20px]">
                    <span>Thông tin chung</span>
                    <span class="material-icons-outlined">expand_more</span>
                </div>
                <div class="p-[20px]">
                    <div class="flex justify-between py-[5px]">
                        <span class="text-[#999]">Tổng sản phẩm: </span>
                        <span>{{ count(getCart() ?: []) }}</span>
                    </div>
                    <div class="flex justify-between py-[5px]">
                        <span class="text-[#999]">Tạm tính: </span>
                        <span>{{ price_format(getTotal()) }}</span>
                    </div>
                    <div class="my-[10px] block h-[2px] bg-[#ea2d32]"></div>
                    <div class="flex items-center justify-between py-[5px]">
                        <span>Tổng cộng: </span>
                        <span class="text-[15px] text-[#ea2d32] md:text-[20px]">{{ price_format(getTotal()) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
<style>
    .cart-table thead td {
        padding: 15px;
    }

    .cart-table tbody td {
        padding: 10px;
    }
</style>
@section('js')
    <script type="module">
        $(function() {
            console.log(CSS.supports('display','flex'));
            $('.remove-item').click(function() {
                var id = $(this).data(id);
                $.ajax({
                    type: "get",
                    url: "{{ route('cart.remove') }}",
                    data: id,
                    success: function(response) {
                        Swal.fire({
                            title: '',
                            icon: response.errors ? 'error' : 'success',
                            text: response.msg,
                            confirmButton: false,
                            timer: 1500
                        });
                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    }
                });
            });


            $(document).on('change','#quantity',function () {
                $.loading.start();
                var id = $(this).data('id');
                var qty = $(this).val();
                $.ajax({
                    type: "get",
                    url: '{{route('cart.update')}}',
                    data: {id: id, qty: qty},
                    success: function (response) {
                        $.loading.end();
                        Swal.fire({
                            title: '',
                            icon: 'success',
                            text: response,
                            timer: 1500
                        });
                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    }
                });
            });
        })
    </script>
@endsection
