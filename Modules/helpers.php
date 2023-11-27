<?php

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Modules\Cart\Models\Cart;
use Modules\Ims\Models\Banner;
use Modules\Product\Models\Product;

if (! function_exists('routeModule')) {
    function routeModule($model, $resource = null)
    {
        if (is_string($model)) {
            return route(Str::lower($model));
        }
        $resource_before = $resource ?? Str::before(class_basename($model), '_');
        $resource_after  = $resource ?? Str::after(class_basename($model), '_');
        if ($resource_after === 'Group') {
            return route(Str::lower("{$resource_before}.{$resource_after}"), $model);
        } else {
            $relate = Str::lower($resource_before) . 'Group';
            if ($model->$relate) {
                return route(Str::lower("{$resource_before}.detail"), [$model->$relate, $model]);
            } else {
                return route(Str::lower("{$resource_before}.detail"), [$model]);
            }
        }
    }
}

function paginator($data)
{
    if (! empty($data)) {
        $perPage     = 20;
        $currentPage = request()->input('page', 1);
        $offset      = ($currentPage - 1) * $perPage;

        $paginator = new LengthAwarePaginator(
            $data->slice($offset, $perPage),
            $data->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        return $paginator;
    }
}

function setting($table_setting)
{
    $data = [];
    if (! empty($table_setting)) {
        $data['setting'] = DB::table($table_setting)
            ->where("lang", Config("ims.cur.lang"))
            ->get();
        $data['setting'] = Arr::pluck($data['setting'], "setting_value", "setting_key");
        return $data;
    }
}

// function lang($table_lang){
//     if(!empty($table_lang)){
//         $data[$table_lang] = DB::table($table_lang)
//             ->where("lang", Config("ims.cur.lang"))
//             ->get()
//             ->pluck("lang_value", "lang_key");
//         return $data[$table_lang];
//     }
// }

function banner($banner, $show_mod)
{
    if (! empty($banner)) {
        $data = Banner::where("lang", Config("ims.cur.lang"))
            ->where("group_name", $banner)
            ->when($show_mod ?? null, function ($query) use ($show_mod) {
                $query->where('show_mod', $show_mod);
            })
            ->get()->toArray();
        return $data;
    }
}

// mã hóa chuỗi
function encrypt_decrypt($action, $string, $secret_key, $secret_iv)
{
    $output         = false;
    $encrypt_method = "AES-256-CBC";
    // $secret_key = 'This is my secret key';
    // $secret_iv = 'This is my secret iv';
    // hash
    $key = hash('sha256', $secret_key);
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        // $output = bin2hex($output);
    } else if ($action == 'decrypt') {
        // $output = openssl_decrypt($this->base64_decode($string), $encrypt_method, $key, 0, $iv);
        // $string = hex2bin($string);
        $output = openssl_decrypt($string, $encrypt_method, $key, 0, $iv);
    }
    return $output;
}

// kiểm tra độ sáng banner
function getBrightness($img_path)
{
    if (file_exists($img_path)) { //path
        $gdHandle = imagecreatefromstring(file_get_contents($img_path));
        $width    = imagesx($gdHandle);
        $height   = imagesy($gdHandle);

        $totalBrightness = 0;
        for ($x = 0; $x < $width; $x++) {
            for ($y = 0; $y < $height; $y++) {
                $rgb = imagecolorat($gdHandle, $x, $y);

                $red   = ($rgb >> 16) & 0xFF;
                $green = ($rgb >> 8) & 0xFF;
                $blue  = $rgb & 0xFF;

                $totalBrightness += (max($red, $green, $blue) + min($red, $green, $blue)) / 2;
            }
        }
        imagedestroy($gdHandle);
        return ($totalBrightness / ($width * $height)) / 2.55;
    }
}

if (! function_exists('price_format')) {
    function price_format($price)
    {
        return number_format($price, 0, '', '.') . 'đ';
    }
}

if (! function_exists('getAllCity')) {
    function getAllCity()
    {
        return DB::table('location_province')->where('lang', 'vi')->where('country_code', 'vi')->where('is_show', 1)->get();
    }
}

if (! function_exists('getAllDistrict')) {
    function getAllDistrict($provinceCode)
    {
        return DB::table('location_district')->where('lang', 'vi')->where('is_show', 1)->where('province_code', $provinceCode)->get();
    }
}

if (! function_exists('getAllWard')) {
    function getAllWard($provinceCode, $districtCode)
    {
        return DB::table('location_ward')->where('lang', 'vi')->where('is_show', 1)->where('province_code', $provinceCode)->where('district_code', $districtCode)->get();
    }
}

if (! function_exists('getProduct')) {
    function getProduct($id)
    {
        $product = Product::where('id', $id)->first();
        if (empty($product)) {
            return false;
        }
        return $product;
    }
}

if (! function_exists('getTotal')) {
    function getTotal()
    {
        $cart = new Cart();
        return $cart->total();
    }
}

if (! function_exists('getCart')) {
    function getCart()
    {
        $cart = new Cart();
        return $cart->all();
    }
}

if (! function_exists('addCart')) {
    function addCart($id, $qty)
    {
        $product = getProduct($id);
        if (empty($product)) {
            return [
                'errors' => true,
                'msg' => 'Không tìm thấy sản phẩm trong kho.'
            ];
        }

        $cart = json_decode(Cookie::get('cart'), true) ?? [];
        $exist = false;
        if (!empty($cart)) {
            foreach ($cart as $key => $item) {
                if ($item['id'] == $id) {
                    $qty = $qty + $item['qty'];
                    // $cart[$key] = ['id' => $product->id,  'qty' => $item['qty'], 'price' => $product->price, 'attributes'=>[
                    //     'name' => $product->title,
                    //     'picture' => $product->picture,
                    //     'code' => $product->item_code
                    //     ]
                    // ];
                    updateCart($id, $qty);
                    $exist = true;
                    break;
                }
            }
        }
        if (!$exist) {
            array_push($cart, ['id' => $product->id,  'qty' => $qty, 'price' => $product->price, 'attributes'=>[
                'name' => $product->title,
                'picture' => $product->picture,
                'code' => $product->item_code
                ]
            ]);
            Cookie::queue(Cookie::make('cart', json_encode($cart), 60*24*30));
        }
        // dd($cart);
        return [
            'errors' => false,
            'msg' => 'Đã thêm vào giỏ hàng'
        ];
    }
}

if (! function_exists('updateCart')) {
    function updateCart($id, $qty)
    {
        $cart = Cookie::get('cart') ?: [];
        if (empty($cart)) {
            return false;
        }
        $product = getProduct($id);
        $cart = json_decode($cart, true);
        foreach ($cart as $key => $item) {
            if ($item['id'] == $id) {
                if ($qty == 0) {
                    unset($cart[$key]);
                    continue;
                }
                $cart[$key] = ['id' => $product->id,  'qty' => $qty, 'price' => $product->price, 'attributes'=>[
                    'name' => $product->title,
                    'picture' => $product->picture,
                    'code' => $product->item_code
                    ]
                ];
            }
        }
        Cookie::queue(Cookie::make('cart', json_encode($cart), 60*24*30));
        return true;
    }
}
