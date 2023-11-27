<?php

namespace Modules\Cart\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Cart\Models\Cart;
use Modules\Cart\Models\OrderMethod;
use Modules\Cart\Models\OrderShipping;
use Modules\Cart\Models\ProductOrder;
use Modules\Cart\Models\ProductOrderDetail;
use Modules\Ims\Controllers\ImsController;
use Modules\Ims\Models\Banner;

class CartController extends ImsController
{

    public function index()
    {
        $cart = new Cart();
        $cart = $cart->all();
        $banner = Banner::where('group_name', 'banner-cart')->first();
        return view('Cart::Cart', ['cart' => $cart, 'banner' => $banner]);
    }

    public function remove(Request $request)
    {
        $cart = new Cart();
        $update = $cart->remove($request->id);
        return response()->json([
            'errors' => !$update,
            'msg' => $update ? 'Đã xóa sản phẩm khỏi giỏ hàng' : 'Sản phẩm không còn tồn tại',
        ]);
    }

    public function update(Request $request)
    {
        $cart = new Cart();
        $cart->update($request->id, $request->qty);

        return 'Cập nhật thành công.';
    }

    public function login(Request $request)
    {
        $cart = new Cart();
        $cart = $cart->all();
        if (empty($cart)) {
            return redirect(route('product'));
        }
        // $cart = json_decode($cart, true);
        return view('Cart::Checkout', ['cart' => $cart]);
    }

    public function getInforDelivery()
    {
        $cookie = Cookie::get('data-checkout', true);
        $cookie = json_decode($cookie, true);
        return view('Cart::CheckoutStep2', ['data' => $cookie]);
    }

    public function postInforDelivery(Request $request)
    {
        Cookie::queue(Cookie::make('data-checkout', json_encode($request->all()), 60 * 24 * 30));
        return redirect(route('cart.checkout.step3'));
    }

    public function getInforCheckout()
    {
        $data['order_shipping'] = OrderShipping::get();
        $data['order_method'] = OrderMethod::get();
        $cookie = Cookie::get('data-checkout', true);
        $cookie = json_decode($cookie, true);
        // dd($cookie);
        if (!empty($data['order_shipping']) && !empty($cookie['city_receive'])) {
            foreach ($data['order_shipping'] as $key => $item) {
                $data['order_shipping'][$key]['price_shipping'] = $item->price;
                if (!empty($item->arr_price)) {
                    $prices = unserialize($item->arr_price);
                    foreach ($prices as $price) {
                        if ($price['province'] == $cookie['city_receive']) {
                            $data['order_shipping'][$key]['price_shipping'] = $price['value'];
                        }
                    }
                }
            }
        }
        return view('Cart::CheckoutStep3', ['checkout' => $data]);
    }

    public function postInforCheckout(Request $request)
    {
        $cookie = Cookie::get('data-checkout', true);
        $cookie = json_decode($cookie, true);
        $cookie['order_shipping'] = $request->order_shipping;
        $cookie['order_method'] = $request->order_method;
        $cookie['notes'] = $request->content;
        $cookie['export_bill'] = $request->export_bill ?? 0;
        if($request->export_bill){
            $cookie['invoice_company'] = $request->invoice_company ?? '';
            $cookie['invoice_tax_code'] = $request->invoice_tax_code ?? '';
            $cookie['invoice_address'] = $request->invoice_address ?? '';
        }
        Cookie::queue(Cookie::make('data-checkout', json_encode($cookie), 60 * 24 * 30));
        // dd($cookie);

        return redirect(route('cart.checkout.step4'));
    }

    public function getConfirmCheckout()
    {
        $data['order_shipping'] = OrderShipping::get();
        $data['order_method'] = OrderMethod::get();
        $cookie = Cookie::get('data-checkout', true);
        $cookie = json_decode($cookie, true);
        if (!empty($data['order_shipping']) && !empty($cookie['city_receive'])) {
            foreach ($data['order_shipping'] as $key => $item) {
                $data['order_shipping'][$key]['price_shipping'] = $item->price;
                if (!empty($item->arr_price)) {
                    $prices = unserialize($item->arr_price);
                    foreach ($prices as $price) {
                        if ($price['province'] == $cookie['city_receive']) {
                            $data['order_shipping'][$key]['price_shipping'] = $price['value'];
                        }
                    }
                }
            }
        }

        return view('Cart::CheckoutStep4', ['checkout' => $data]);
    }

    public function postConfirmCheckout(Request $request)
    {
        $cart = new Cart();
        $cart = $cart->all();
        $checkout = Cookie::get('data-checkout');
        $data = json_decode($checkout, true);
        if(empty($cart)){
            return back()->with('error', 'Giỏ hàng trống');
        }
        if(empty($checkout)){
            return back()->with('error', 'Thông tin đặt hàng trống.');
        }
        $orderShipping = OrderShipping::where('shipping_id', $data['order_shipping'])->get();
        $priceShipping = 0;
        if (!empty($orderShipping) && !empty($data['city_receive'])) {
            foreach ($orderShipping as $key => $item) {
                $priceShipping = $item->price;
                if (!empty($item->arr_price)) {
                    $prices = unserialize($item->arr_price);
                    foreach ($prices as $price) {
                        if ($price['province'] == $data['city_receive']) {
                            $priceShipping = $price['value'];
                        }
                    }
                }
            }
        }
        try {
            $order = ProductOrder::insertGetId([
                'o_full_name' => $data['name_send'] ?? '',
                'o_email' => $data['email_send'] ?? '',
                'o_phone' => $data['phone_send'] ?? '',
                'o_district' => $data['district_send'] ?? '',
                'o_province' => $data['city_send'] ?? '',
                'o_address' => $data['address_send'] ?? '',
                'd_full_name' => $data['name_receive'] ?? '',
                'd_email' => $data['email_receive'] ?? '',
                'd_phone' => $data['phone_receive'] ?? '',
                'd_district' => $data['district_receive'] ?? '',
                'd_province' => $data['city_receive'] ?? '',
                'd_address' => $data['address_receive'] ?? '',

                'o_note' => $data['notes'] ?? '',
                'bill_export' => $data['export_bill'] ? 1 : 0,
                'invoice_company' => $data['export_bill'] ? ($data['invoice_company'] ?? '') : '',
                'invoice_tax_code' => $data['export_bill'] ? ($data['invoice_tax_code'] ?? '') : '',
                'invoice_address' => $data['export_bill'] ? ($data['invoice_address'] ?? '') : '',

                'shipping_price' => $priceShipping,
                'total_order' => getTotal(),
                'total_payment' => getTotal() + $priceShipping,
                'user_id' => auth()->user()->id ?? ''
            ]);

            if ($order) {
                foreach ($cart as $key => $item) {
                    ProductOrderDetail::create([
                        'order_id' => $order,
                        'price_buy' => $item['price'],
                        'quantity' => $item['qty'],
                        'type' => 'product',
                        'type_id' => $item['id'],
                        'picture' => $item['attributes']['picture'],
                        'title' => $item['attributes']['name'],
                        'option_SKU' => $item['attributes']['code']
                    ]);
                }

                Cookie::queue(Cookie::make('cart', json_encode([]), 60*24*30));

                return redirect(route('cart.checkout.complete'))->withCookie(Cookie::get('cart'))->with('success','Đặt hàng thành công');
            }
            return back()->with('error', 'Đã có lỗi xảy ra. Vui lòng thử lại');
        } catch (Exception $e) {
            logger('Errors order when save product order: ' . $e->getMessage());
            return back()->with('error', 'Đã có lỗi xảy ra. Vui lòng thử lại');
        }
    }

    public function completeCheckout()
    {
        return view('Cart::CheckoutComplete');
    }
}
