<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,5)->create()->each(function($user) {
            // \Log::debug($user);
            $user->works()->saveMany(
                factory(App\Work::class,2)->make()
            )->each(function($work) {
                // \Log::debug($work);
                $work->comments()->saveMany(
                    factory(App\Comment::class,10)->make(['user_id' => $work->user_id])
                );
            });
        });
    }
}
