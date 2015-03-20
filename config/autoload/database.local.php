<?php

return array(
    'db' => array(
        'driver'            => 'Pdo',
        'username'          => 'root',
        'password'          => 'root',
        'dsn'               => 'mysql:dbname=bookmarks;host=localhost',
        'driver_options'    => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ),
    ),
);