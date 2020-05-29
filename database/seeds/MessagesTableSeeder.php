<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 応募データ作成
        DB::table('applies')->insert([
            'work_id' => 2,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        // Board作成
        DB::table('boards')->insert([
            'work_id' => 2,
            'from_user_id' => 1,
            'to_user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        // Message作成
        DB::table('messages')->insert([
            'board_id' => 1,
            'user_id' => 1,
            'content' => 'テストテストテスト',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('messages')->insert([
            'board_id' => 1,
            'user_id' => 2,
            'content' => 'こんばんは',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
