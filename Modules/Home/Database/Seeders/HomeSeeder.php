<?php

namespace Modules\Home\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=Modules\Home\Database\Seeders\HomeSeeder
     * @return void
     */
    public function run()
    {
        DB::table('home_setting')->insert([
            'setting_key' => 'home_link',
            'setting_value' => 'trang-chu',
            'admin_id' => 1,
        ]);
    }
}
