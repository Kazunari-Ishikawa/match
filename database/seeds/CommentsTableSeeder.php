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
        factory(App\User::class,15)->create()->each(function($user) {
            $user->works()->saveMany(
                factory(App\Work::class,2)->make()
            )->each(function($work) {
                $work->comments()->saveMany(
                    factory(App\Comment::class,2)->make(['user_id' => $work->user_id])
                );
            });
        });
    }
}
