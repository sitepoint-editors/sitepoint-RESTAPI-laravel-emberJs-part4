<?php

/* /app/database/seeds/UserTableSeeder.php */


class UserTableSeeder extends Seeder {

    public function run()
    {

        Eloquent::unguard();

        DB::table('users')->delete();

        $faker = Faker\Factory::create();


        for($i = 1; $i <= 3; $i++){
            User::create(array(
                'username' => $faker->userName,
                'password' => Hash::make($faker->name . $faker->year),
                'name' => $faker->name,
                'lastname' => $faker->lastName
            ));
        }

        User::create(array(
            'username' => 'foo',
            'password' => Hash::make('password'),
            'name' => $faker->name,
            'lastname' => $faker->lastName
        ));

    }

}