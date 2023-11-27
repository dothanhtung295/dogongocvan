<?php

namespace Modules\Service\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=Modules\Product\Database\Seeders\ProductSeeder
     * @return void
     */
    public function run()
    {
        // DB::table('service_setting')->insert([
        //     'setting_key' => 'service_link',
        //     'setting_value' => 'lien-he',
        //     'setting_type' => 'seo',
        //     'is_show' => 1,
        //     'show_order' => 0,
        //     'lang' => 'vi',
        //     'admin_id' => 1,
        //     'admin_full_name' => 'ims',
        //     'product_link' => 'lien-he',
        // ]);
    }
}
