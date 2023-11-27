<?php

namespace Modules\Cart\Models;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Request;
use Modules\Product\Models\Product;

class Cart
{
    // list item cart
    protected $list = [];

    public function __construct()
    {
        $this->list = json_decode(Cookie::get('cart'), true);
    }
    public function __destruct()
    {
        //save cart to cookie after done
        Cookie::queue(Cookie::make('cart', json_encode($this->list), 60 * 24 * 30));
    }
    public function add($id, $qty)
    {
        $product = Product::where('item_id', $id)->first();
        if (empty($product)) {
            abort(404);
        }
        $cart = $this->list;

        // if cart not empty then check if this product exist then increment quantity
        if (!empty($cart[$id])) {
            $cart[$id]['qty'] += $qty;
            $this->list = $cart;
            return true;
        }

        // save product with key is id product to cart
        $cart[$id] = [
                'id' => $product->item_id,
                'title' => $product->title,
                'qty' => $qty,
                'price' => $product->price,
                'attributes' => [
                    'name' => $product->title,
                    'picture' => $product->picture,
                    'code' => $product->item_code,
                ],
        ];
        $this->list = $cart;
        return true;

    }

    public function update($id, $qty)
    {
        $cart = json_decode(Cookie::get('cart'), true);

        if (!empty($cart[$id])) {
            $cart[$id]['qty'] = $qty;
            $this->list = $cart;
            return true;
        }
    }
    public function remove($id)
    {
        $cart = $this->list;

        if (!empty($cart[$id])) {
            unset($cart[$id]);
            $this->list = $cart;
            return true;
        }
    }

    public function all()
    {
        return $this->list;
    }

    public function total()
    {
        $cart = $this->list;
        if (empty($cart)) {
            return 0;
        }
        $cart = $this->list;
        $total = 0;
        foreach ($cart as $key => $item) {
            $total += $item['price'] * $item['qty'];
        }
        return $total;
    }

    public function listItem()
    {
        return $this->list;
    }
}
