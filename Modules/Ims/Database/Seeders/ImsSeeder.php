<?php

namespace Modules\Ims\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=Modules\About\Database\Seeders\AboutSeeder
     * @return void
     */
    public function run()
    {
        DB::table('lang')->insert([
            'name' => 'vi',
            'title' => 'Tiếng Việt',
            'is_default' => '1',
            'is_show' => '1',
            'show_order' => '0',
        ]);
    }
}
