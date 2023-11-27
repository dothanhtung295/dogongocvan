<?php

namespace Modules\Service\Controllers;

use Illuminate\Http\Request;
use Modules\Ims\Controllers\ImsController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Modules\Service\Models\Service;
use Modules\Service\Models\Service_Group;

class ServiceController extends ImsController
{
    public function Service(Request $request)
    {
        $data['service_lang'] = DB::table('service_lang')
            ->where('lang', Config('ims.cur.lang'))
            ->get()
            ->pluck('lang_value', 'lang_key');

        $data['setting'] = DB::table('service_setting')
            ->where('lang', Config('ims.cur.lang'))
            ->get()
            ->pluck('setting_value', 'setting_key');
        // if($service_group->group_level == 1){
        //     $data['group'] = Service_Group::where('group_parent', $service_group->group_id)->get();
        // } else if($service_group->group_level == 2){
        //     $data['group'] = Service_Group::where('group_parent', $service_group->group_parent)->get();
        // }
        $data['services'] = Service::get();

        return view('Service::Service', ['service' => $data]);
    }
}
