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
        for ($i = 1; $i < 10; $i++) {
            DB::table('boards')->insert([
                'id' => $i,
                'work_id' => 1,
                'from_user_id' => $i+1,
                'to_user_id' => 1
            ]);
        }
        DB::table('messages')->insert([
            'board_id' => 1,
            'user_id' => 2,
            'content' => 'こんにちは。',
            'created_at' => Carbon::now()->addHour(1),
            'updated_at' => Carbon::now()->addHour(1),
        ]);
        DB::table('messages')->insert([
            'board_id' => 1,
            'user_id' => 1,
            'content' => 'こんばんは。',
            'created_at' => Carbon::now()->addHour(2),
            'updated_at' => Carbon::now()->addHour(2),
        ]);
    }
}
