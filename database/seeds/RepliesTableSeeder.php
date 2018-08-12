<?php

use App\Reply;
use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $d1 = [
            'user_id' => 1,
            'discussion_id' => 1,
            'content' => "Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, ",
        ];
        $d2 = [
            'user_id' => 1,
            'discussion_id' => 2,
            'content' => "professor at Hampden-Sydney College in Virginia, looked up one of the ",
        ];
        $d3 = [
            'user_id' => 2,
            'discussion_id' => 3,
            'content' => "discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33",
        ];
        $d4 = [
            'user_id' => 2,
            'discussion_id' => 4,
            'content' => " \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC.",
        ];
        $d5 = [
            'user_id' => 1,
            'discussion_id' => 5,
            'content' => "\"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.",
        ];

        Reply::create($d1);
        Reply::create($d2);
        Reply::create($d3);
        Reply::create($d4);
        Reply::create($d5);
    }
}
