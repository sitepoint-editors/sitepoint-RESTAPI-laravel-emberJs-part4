<?php

/* /app/database/seeds/CategoryTableSeeder.php */

class CategoryTableSeeder extends Seeder {

    public function run()
    {

        Eloquent::unguard();

        DB::table('categories')->delete();

        for($i = 1; $i < 5; $i++){
            Category::create(array(
                'name' => 'category' . $i
            ));
        }

    }

}