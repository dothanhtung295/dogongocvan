<?php

namespace Modules\About\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=Modules\About\Database\Seeders\AboutSeeder
     * @return void
     */
    public function run()
    {
        DB::table('about_setting')->insert([
            'setting_key' => 'about_link',
            'setting_value' => 'gioi-thieu',
            'admin_id' => 1,
        ]);
    }
}
