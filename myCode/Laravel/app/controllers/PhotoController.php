<?php

class PhotoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index()
    {
        try{
            $statusCode = 200;
            $response = [
                'photos'  => []
            ];

            $photos = Photo::all()->take(9);

            foreach($photos as $photo){

                $response['photos'][] = [
                    'id' => $photo->id,
                    'user_id' => $photo->user_id,
                    'url' => $photo->url,
                    'title' => $photo->title,
                    'description' => $photo->description,
                    'category' => $photo->category,
                ];
            }

        }catch (Exception $e){
            $statusCode = 400;
        }finally{
            return Response::json($response, $statusCode);
        }

    }


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function show($id)
    {
        try{
            $photo = Photo::find($id);
            $statusCode = 200;
            $response = [ "photo" => [
                'id' => (int) $id,
                'user_id' => (int) $photo->user_id,
                'title' => $photo->title,
                'url' => $photo->url,
                'category' => (int) $photo->category,
                'description' => $photo->description
            ]];

        }catch(Exception $e){
            $response = [
                "error" => "File doesn`t exists"
            ];
            $statusCode = 404;
        }finally{
            return Response::json($response, $statusCode);
        }

    }


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
