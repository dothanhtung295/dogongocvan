<?php

namespace Modules\Plastic\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlasticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=Modules\Plastic\Database\Seeders\PlasticSeeder
     * @return void
     */
    public function run()
    {
        DB::table('plastic_setting')->insert([
            'setting_key' => 'plastic_link',
            'setting_value' => 'san-pham',
            'setting_type' => 'seo',
            'is_show' => 1,
            'show_order' => 0,
            'lang' => 'vi',
            'admin_id' => 1,
            'admin_full_name' => 'ims',
            'plastic_link' => 'san-pham',
        ]);
    }
}