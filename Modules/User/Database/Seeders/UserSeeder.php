<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=Modules\User\Database\Seeders\UserSeeder
     * @return void
     */
    public function run()
    {
        DB::table('user_setting')->insert([
            'setting_key' => 'user_link',
            'setting_value' => 'gioi-thieu',
            'admin_id' => 1,
        ]);
    }
}
