<?php

use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use MDH\Base\Models\User;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 60) as $index)
        {
            User::create([
                'name'     => $index == 1 ? 'John Doe' : $faker->name(),
                'email'    => $index == 1 ? 'doe@example.com' : $faker->email(),
                'password' => Hash::make('password'),
            ]);
        }
    }

}
