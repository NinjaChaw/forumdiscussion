<?php

use App\Channel;
use Illuminate\Database\Seeder;

class ChannelsTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title' => 'Laravel', 'slug' => 'Laravel'];
        $channel2 = ['title' => 'Vue js', 'slug' => 'Vue js'];
        $channel3 = ['title' => 'PHP', 'slug' => 'PHP'];
        $channel4 = ['title' => 'Bootstrap', 'slug' => 'Bootstrap'];
        $channel5 = ['title' => 'Java', 'slug' => 'Java'];
        $channel6 = ['title' => 'JQuery', 'slug' => 'JQuery'];
        $channel7 = ['title' => 'JavaScript', 'slug' => 'JavaScript'];
        $channel8 = ['title' => 'CSS', 'slug' => 'CSS'];

        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
        Channel::create($channel6);
        Channel::create($channel7);
        Channel::create($channel8);
    }
}
