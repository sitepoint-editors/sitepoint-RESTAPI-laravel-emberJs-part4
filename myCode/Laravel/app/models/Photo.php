<?php

/* /app/models/Photo.php */

class Photo extends Eloquent {

    protected $table = 'photos';

    public function author(){
        return $this->belongsTo('User', 'user_id');
    }

}