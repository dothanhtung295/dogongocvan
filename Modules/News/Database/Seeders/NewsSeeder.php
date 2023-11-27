<?php

namespace Modules\News\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=Modules\Home\Database\Seeders\HomeSeeder
     * @return void
     */
    public function run()
    {
        DB::table('news_setting')->insert([
            'setting_key' => 'news_link',
            'setting_value' => 'tin-cong-ty',
            'admin_id' => 1,
        ]);
    }
}
