<?php

namespace Modules\User\Controllers;

use Exception;
use Illuminate\Auth\Events\Registered;
use Modules\Ims\Controllers\ImsController;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Modules\User\Models\User_Lang;
use Modules\User\Models\User_Setting;
use Modules\Product\Models\Product;
use Modules\Product\Models\Product_Info;
use Modules\Product\Models\Product_Lang;
use Modules\Product\Models\Product_Utility;
use Modules\User\Models\User;

class UserController extends ImsController
{
    public function getRegister()
    {
        return view('User::register');
    }

    // public function update(Request $request)
    // {
    //     $lang = User_Lang::get()->pluck('lang_value', 'lang_key');
    //     if (empty($request->all())) {
    //         return back()->withError('Data Error!');
    //     }
    //     $user = User::find(auth()->user()->id)->update([
    //         'email' => $request->email,
    //         'phone' => $request->phone,
    //         'first_name' => $request->first_name,
    //         'last_name' => $request->last_name,
    //         'full_name' => $request->first_name . ' ' . $request->last_name,
    //     ]);

    //     if ($user) {
    //         return back()->withSuccess($lang['success_update_info']);
    //     }
    //     return back()->withError('Server Error');
    // }

    public function login(Request $request)
    {
        if (empty($request->request)) {
            return back()
                ->withInput()
                ->withError('Vui lòng cho phép JavaScript.');
        }

        $user = User::where('email', $request->email)->first();
        if (empty($user)) {
            return back()
                ->withInput()
                ->withError('Không tìm thấy thông tin người dùng.');
        }
        if ($this->md25($request->password) != $user->password) {
            return back()
                ->withInput()
                ->with('error', 'Thông tin đăng nhập không đúng.');
        }

        auth()->login($user);
        $request->session()->regenerate();
        $url = Session::get('url');
        if(!empty($url)){
            return redirect($url);
        }
        return redirect(route('cart.checkout.step2'));
    }
    public function postRegister(Request $request)
    {
        // $url = Session::get('url');
        // if(empty($url)){
            // Session::put('url', url()->previous());
        // }
        $old = User::where('email', $request->email)->count();
        if ($old > 0) {
            return back()
                ->withInput()
                ->withError('Email này đã được đăng ký.');
        }
        $user = User::create([
            'full_name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone ?? '',
            'address' => $request->address ?? '',
            'province' => $request->city ?? '',
            'district' => $request->district ?? '',
            'ward' => $request->ward ?? '',
            'password' => $this->md25($request->password),
        ]);

        event(new Registered($user));
        auth()->login($user);
        $url = Session::get('url');
        if(!empty($url)){
            return redirect($url);
        }
        return redirect(route('cart.checkout.step2'));
    }

    public function postForgotPassword(Request $request)
    {
        if(empty($request->email)){
            return response()->json([
                'errors' => true,
                'msg' => 'Server Error. Please enable JavaScript'
            ]);
        }
        // $lang = User_Lang::get()->pluck('lang_value', 'lang_key');
        $user = User::where('email', $request->email)->first();
        if(empty($user)){
            return response()->json([
                'errors' => true,
                'msg' => 'Email này chưa được đăng ký.'
            ]);
        }
        $template = DB::table('template_email')->where('lang', Config('ims.cur.lang'))->where('is_show', 1)->where('template_id', 'forget-pass')->first();
        if (empty($template)) {
            return response()->json([
                'errors' => true,
                'msg' => 'No template found. Please try again.'
            ]);
        }

        $token = \Str::random(64);
        $user->remember_token = $token;
        $user->save();
        $html = $template->content;
        $html = str_replace('{full_name}', $user->full_name, $html);
        $html = str_replace('{link_forget_pass}', route('forgot-password.active',['email' => $user->email, 'token' => $token]), $html);
        $html = html_entity_decode($html);
        Mail::send("User::mail", ['html' => $html], function (Message $message) use ($user, $template, $html) {
            $message->from(Config('mail.from.address'), config('mail.from.name'));
            $message->to($user->email);
            $message->subject($template->subject);
            // $message->setBody($html, 'text/html');
        });
        return redirect(route('cart.checkout.step1'))->with('success', 'Vui lòng kiểm tra email để đặt lại mật khẩu.');
    }

    // public function postForgotPassword(Request $request)
    // {
    //     if(empty($request->all())){
    //         return redirect(route('login'))->with('error', 'Oops. Đã có lỗi xảy ra.');
    //     }
    //     $lang = User_Lang::get()->pluck('lang_value', 'lang_key');
    //     $user = User::where('email', $request->email)->first();
    //     if(empty($user)){
    //         return redirect(route('login'))->with('error', $lang['user_notfound']);
    //     }

    //     if ($user->remember_token != $request->token) {
    //         // return response()->json([
    //         //     'errors' => true,
    //         //     'msg' => $lang['token_error']
    //         // ]);
    //         return redirect(route('login'))->with('error', $lang['token_error']);
    //     }

    //     $user->password = $this->md25($user->pass_reset);
    //     if($user->save()){
    //         // return response()->json([
    //         //     'errors' => false,
    //         //     'msg' => $lang['reset_success']
    //         // ]);
    //         return redirect(route('login'))->with('success', $lang['reset_success']);

    //     }
    //     return redirect(route('login'))->with('error', $lang['reset_error']);

    // }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect(route('login'));
    }

    public function getUpdatePassword(Request $request)
    {
        return view('User::ForgotPassword');
    }

    public function updatePassword(Request $request)
    {
        if (empty($request->all())) {
            return back()
                ->withInput()
                ->withError('Data Error!');
        }

        $user = User::where('email', $request->email)->first();
        if (empty($user)) {
            return back()->with('error', 'Không tìm thấy email đã đăng ký');
        }

        if (!empty($request->token) && $request->token != $user->remember_token) {
            return back()->with('error', 'Mã bảo mật không đúng. Vui lòng kiểm tra lại email.');
        }

        try {
            User::where('email', $request->email)->update([
                'password' => $this->md25($request->password),
            ]);
            return redirect(route('cart.checkout.step1'))->withSuccess('Cập nhật mật khẩu thành công');
        } catch (Exception $e) {
            Log::debug('Error update password: ' . $e->getMessage());
            return back()->withError('Server Errors !');
        }
    }

    public function User(Request $request)
    {
        if (auth()->guest()) {
            Session::put('url', route('user'));
            return redirect(route('login'));
        }
        $user['setting'] = User_Setting::where('lang', Config('ims.cur.lang'))
            ->get()
            ->pluck('setting_value', 'setting_key');
        $user['user_lang'] = User_Lang::get()->pluck('lang_value', 'lang_key');
        $user['user'] = auth()->user();
        $list = explode(',',auth()->user()->list_save ?? '');
        $user['products'] = Product::whereIn('item_id',$list)->get();
        $info = Product_Info::get();
        $user['arr_info'] = [];
        foreach ($info as $key => $item) {
            $user['arr_info'][$item->item_id] = $item;
        }
        $user['arr_utility'] = Product_Utility::get();
        $user['product_lang'] = Product_Lang::where("lang", Config("ims.cur.lang"))
            ->get()->pluck("lang_value", "lang_key");
        return view('User::User', ['user' => $user]);
    }

    private function md25($str)
    {
        $str = md5($str);
        $str = md5(substr($str, 2, 7) . $str);
        return $str;
    }

    public function checkEmailRegister(Request $request)
    {
        if (empty($request->email)) {
            return response()->json([
                'errors' => true,
                'msg' => 'Email trống',
            ]);
        }

        $check = User::where('email', $request->email)->count();
        return response()->json([
            'errors' => $check > 0,
            'msg' => $check > 0 ? 'Email này đã được đăng ký.' : '',
        ]);
    }

    public function renderCaptcha()
    {
        // captcha();
        $captcha = captcha_src() ?? '';
        return response()->json([
            'errors' => empty($captcha),
            'src' => $captcha
        ]);
    }

    public function checkCaptcha(Request $request)
    {
        $captcha = empty($request->captcha) ? 'a' : $request->captcha;
        return response()->json([
            'errors' => !captcha_check($captcha)
        ]);
    }

    public function getDistrict(Request $request)
    {
        try {
            $district = getAllDistrict($request->city);
            $html = '<option value="">Chọn --</option>';
            foreach ($district as $key => $item) {
                $html .= '<option value="'.$item->code.'">'.$item->title ?? ''.'</option>';
            }
            return response()->json([
                'errors' => false,
                'html' => $html
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'errors' => true,
                'html' => $html
            ]);
        }
    }

    public function getWard(Request $request)
    {
        try {
            $ward = getAllWard($request->city,$request->district);
            $html = '<option value="">Chọn --</option>';
            foreach ($ward as $key => $item) {
                $html .= '<option value="'.$item->code.'">'.$item->title ?? ''.'</option>';
            }
            return response()->json([
                'errors' => false,
                'html' => $html
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'errors' => true,
                'html' => $html
            ]);
        }
    }
}
