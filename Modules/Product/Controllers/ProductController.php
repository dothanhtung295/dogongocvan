<?php

namespace Modules\Product\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Modules\Ims\Controllers\ImsController;
use Illuminate\Support\Facades\DB;
use Modules\Product\Models\Product;
use Modules\Product\Models\Product_Group;
use Modules\Cart\Models\Cart;
use Modules\Product\Models\Product_Comment;

class ProductController extends ImsController
{
    public function Product(Product_Group $group, Request $request)
    {
        $data['global_lang'] = DB::table("global_lang")
            ->where("lang", Config("ims.cur.lang"))
            ->get()->pluck("lang_value", "lang_key");
        $data['setting'] = DB::table("product_setting")
            ->where("lang", Config("ims.cur.lang"))
            ->get();
        $data['message'] = $data['global_lang']['loading_more'];
        $data['setting'] = Arr::pluck($data['setting'], "setting_value", "setting_key");
        $data['product_lang'] = DB::table("product_lang")
            ->where("lang", Config("ims.cur.lang"))
            ->get()->pluck("lang_value", "lang_key");
        $data['groups'] = Product_Group::get();
        if (!empty($group->getAttributes())) {
            $data['group_current'] = $group;
            // $data['products'] = Product::where('group_id', $group->group_id)->paginate($data['setting']['show_order_default'] ?? 9);
            $data['products'] = $group->products()->paginate($data['setting']['num_list'] ?? 9);
            // dd($data['products'] );
        } else {
            $data['products'] = Product::paginate($data['setting']['num_list'] ?? 9);
        }
        if (!empty($request->keyword)) {
            $data['products'] = Product::where('title', 'like', "%$request->keyword%")
                ->orWhere('short', 'like', "%$request->keyword%")
                ->paginate($data['setting']['num_list'] ?? 9);
        }
        return view('Product::Product', ['product' => $data]);
    }
    public function Detail(Product_Group $group, Product $product)
    {
        $data['setting'] = DB::table("product_setting")
            ->where("lang", Config("ims.cur.lang"))
            ->get();
        $data['setting'] = Arr::pluck($data['setting'], "setting_value", "setting_key");
        $data['product_lang'] = DB::table("product_lang")
            ->where("lang", Config("ims.cur.lang"))
            ->get()->pluck("lang_value", "lang_key");
        $data['product_detail'] = $product;

        if (!empty($data['product_detail']->arr_picture)) {

            $data['product_detail']->arr_picture = unserialize($data['product_detail']->arr_picture);
        }
        $data['focus'] = Product::where('is_focus', 1)
            ->whereNotIn("id", [$product->id])
            ->limit(3)
            ->get();
        $data['related'] = Product::where('group_id', $product->group_id)
            ->whereNotIn("id", [$product->id])
            ->limit($data['setting']['num_order_detail'])
            ->get();
        return view('Product::Detail', ['product' => $data]);
    }

    public function saveComment(Request $request)
    {
        try {
            $comment = Product_Comment::create([
                'user_id' => auth()->id() ?? null,
                'product_id' => $request->id,
                'name' => $request->name,
                'email' => $request->email,
                'rate' => $request->star,
                'content' => $request->content
            ]);
            if ($comment) {
                return response()->json([
                    'errors' => false,
                    'msg' => 'Đã lưu đánh giá của bạn'
                ]);
            }
        } catch (Exception $e) {
            logger('Errors comment: ' . $e->getMessage());
            return response()->json([
                'errors' => true,
                'msg' => 'Đã có lỗi xảy ra.'
            ]);
        }
    }

    public function addToCart(Request $request)
    {
        // $cart = addCart($request->id, $request->quantity ?? 1);
        // return response()->json($cart);
        $cart = new Cart();
        $cart->add($request->id, $request->quantity ?? 1);
        return response()->json([
            'errors' => false,
            'msg' => 'Đã thêm vào giỏ hàng.'
        ]);
    }
}
