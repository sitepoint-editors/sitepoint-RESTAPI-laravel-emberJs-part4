<?php

/* /app/database/seeds/PhotoTableSeeder.php */

use Dropbox\Client;                     // DropBox Client
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local as Adapter;
use League\Flysystem\Adapter\Dropbox;   // The DropBox Adapter


class PhotoTableSeeder extends Seeder {

    private $filesystem;

    public function __construct(){
        if(App::environment() === "local"){
            $this->filesystem = new Filesystem(new Adapter( public_path() . '/images/'));
        }else{
            $client = new Client(Config::get('dropbox.token'), Config::get('dropbox.appName'));
            $this->filesystem = new Filesystem(new Dropbox($client, '/images'));
        }

    }

    public function run()
    {

        Eloquent::unguard();

        DB::table('photos')->delete();

        $faker = Faker\Factory::create();

        for($i = 0; $i < 10; $i++){

            $file = file_get_contents('http://lorempixel.com/640/400/');

            $url = $faker->lexify($string = '???????????????????');
            try{
                $this->filesystem->write($url, $file);
            }catch (\Dropbox\Exception $e){
                echo $e->getMessage();
            }


            Photo::create(array(
                'url' => $url,
                'user_id' => (int) rand(1, 4),
                'title' => $faker->sentence(5),
                'description' => $faker->sentence(40),
                'category' => rand(1, 4)
            ));
        }

    }

}