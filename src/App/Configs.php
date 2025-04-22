<?php 

$container->set('db_settings',function(){
    return (object)[
        "DB_NAME" => "dsi_database",
        "DB_PASS" => "mysqlpas",
        "DB_CHAR" => "utf8",
        "DB_HOST" => "localhost",
        "DB_USER" => "root"
    ];
});
//TODO: revisar de usar DOT_ENV