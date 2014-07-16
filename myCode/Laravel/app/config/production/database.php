<?php
$url = parse_url(getenv("DATABASE_URL"));   // Get the environment variable
// and return it as an array
return array(

    'connections' => array(

        'mysql' => array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'homestead',
            'username'  => 'homestead',
            'password'  => 'secret',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ),

        'pgsql' => array(
            'driver'   => 'pgsql',
            'host'     => $url["host"],
            'database' => substr($url["path"], 1),
            'username' => $url["user"],
            'password' => $url["pass"],
            'charset'  => 'utf8',
            'prefix'   => '',
            'schema'   => 'public',
        ),

    ),

);