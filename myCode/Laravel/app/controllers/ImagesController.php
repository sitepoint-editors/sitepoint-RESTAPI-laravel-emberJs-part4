<?php

/* /app/controllers/ImagesController.php */

use Dropbox\Client;
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local as Adapter;
use League\Flysystem\Adapter\Dropbox;


class ImagesController extends \BaseController {

    private $filesystem;

    public function __construct(){

        if(App::environment() === "local"){

            $this->filesystem = new Filesystem(new Adapter( public_path() . '/images/'));

        }else{

            $client = new Client(Config::get('dropbox.token'), Config::get('dropbox.appName'));
            $this->filesystem = new Filesystem(new Dropbox($client, '/images/'));

        }

    }


    public function show($name)
    {
        try{
            $file = $this->filesystem->read($name);
        }catch (Exception $e){
            return Response::json("{}", 404);
        }

        $response = Response::make($file, 200);

        return $response;

    }


    public function destroy($name)
    {
        try{
            $this->filesystem->delete($name);
            return Response::json("{}", 200);
        }catch (\Dropbox\Exception $e){
            return Response::json("{}", 404);
        }
    }


}