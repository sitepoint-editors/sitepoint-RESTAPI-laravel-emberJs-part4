<?php

/* /app/models/User.php */

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface{

    use UserTrait;

    protected $table = 'users';     // The table that this model uses

    public function photos()
    {
        return $this->hasMany('Photo');
    }

}