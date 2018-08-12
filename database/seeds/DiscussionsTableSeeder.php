<?php

use App\Discussion;
use Illuminate\Database\Seeder;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = "Creating project with laravel";
        $t2 = "How to perforn an awesome layout";
        $t3 = "Showing content dynamically";
        $t4 = "VueJS platform intigration";
        $t5 = "Creating a front end layout";

        $d1 = [
            'user_id' => '2',
            'channel_id' => '1',
            'title' => $t1,
            'content' => "\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et",
            'slug' => str_slug($t1)
        ];
        $d2 = [
            'user_id' => '1',
            'channel_id' => '2',
            'title' => $t2,
            'content' => "\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has ",
            'slug' => str_slug($t2)
        ];
        $d3 = [
            'user_id' => '2',
            'channel_id' => '3',
            'title' => $t3,
            'content' => "Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?",
            'slug' => str_slug($t3)
        ];
        $d4 = [
            'user_id' => '1',
            'channel_id' => '4',
            'title' => $t4,
            'content' => "equi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius ",
            'slug' => str_slug($t4)
        ];
        $d5 = [
            'user_id' => '2',
            'channel_id' => '5',
            'title' => $t5,
            'content' => "quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse",
            'slug' => str_slug($t5)
        ];

        Discussion::create($d1);
        Discussion::create($d2);
        Discussion::create($d3);
        Discussion::create($d4);
        Discussion::create($d5);
    }
}
