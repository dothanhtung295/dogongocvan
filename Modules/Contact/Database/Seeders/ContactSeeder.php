<?php

namespace Modules\Contact\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=Modules\Product\Database\Seeders\ProductSeeder
     * @return void
     */
    public function run()
    {
        DB::table('contact_setting')->insert([
            'setting_key' => 'contact_link',
            'setting_value' => 'lien-he',
            'setting_type' => 'seo',
            'is_show' => 1,
            'show_order' => 0,
            'lang' => 'vi',
            'admin_id' => 1,
            'admin_full_name' => 'ims',
            'product_link' => 'lien-he',
        ]);
    }
}
