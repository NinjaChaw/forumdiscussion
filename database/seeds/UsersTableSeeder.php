<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Dev Boy',
            'email' => 'boy@coding.com',
            'password' => bcrypt('asdasdasd'),
            'avatar' => asset('avatars/image_0.jpg'),
            'admin' => 1
        ]);

        App\User::create([
            'name' => 'Emily Myers',
            'email' => 'emily@coding.com',
            'password' => bcrypt('asdasdasd'),
            'avatar' => asset('avatars/woman1.jpg')
        ]);
    }
}
