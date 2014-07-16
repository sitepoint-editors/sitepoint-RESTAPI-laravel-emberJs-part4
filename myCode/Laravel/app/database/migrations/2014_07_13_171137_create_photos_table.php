<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Dropbox\Client;
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local as Adapter;
use League\Flysystem\Adapter\Dropbox;


class CreatePhotosTable extends Migration {

    private $filesystem;

    public function __construct(){

        if(App::environment() === "local"){     // If its on local use the local filesystem

            $this->filesystem = new Filesystem(new Adapter( public_path() ));

        }else{                                  // Use dropbox on other cases,
            // including testing here (not a good idea)

            $client = new Client(Config::get('dropbox.token'), Config::get('dropbox.appName'));
            $this->filesystem = new Filesystem(new Dropbox($client));

        }

    }

    public function up()
    {

        $this->filesystem->createDir('images');

        Schema::create('photos', function($table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->string('url')->unique();
            $table->text('description');
            $table->integer("category");
            $table->timestamps();
        });
    }

    public function down()
    {

        Schema::dropIfExists('photos');

        try{
            $this->filesystem->deleteDir('images');
        }catch (\Dropbox\Exception_BadResponse $e){}

    }

}