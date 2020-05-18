<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory;

class WorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('works')->insert([
            'title' => 'パン屋さんのホームページ作成依頼',
            'category_id' => 1,
            'type' => 1,
            'max_price' => 50,
            'min_price' => 10,
            'content' => 'パン屋さんのホームページの作成をお願いします。',
            'user_id' => 1,
            'is_closed' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        factory(App\Work::class,30)->create();
        factory(App\Work::class,30)->states('revenue')->create();

    }
}
