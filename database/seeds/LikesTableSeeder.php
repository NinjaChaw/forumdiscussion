<?php

use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Like::create([
            'user_id' => 1,
            'reply_id' => 2
        ]);
        App\Like::create([
            'user_id' => 2,
            'reply_id' => 2
        ]);
    }
}
