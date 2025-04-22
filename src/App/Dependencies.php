<?php 

use \Psr\Container\ContainerInterface;

$container->set('db', function(ContainerInterface $c){
    $config = $c->get('db_settings');

    $name = $config->DB_NAME;
    $pass = $config->DB_PASS;
    $charset = $config->DB_CHAR;
    $host = $config->DB_HOST;
    $user = $config->DB_USER;

    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ];

    $dsn = "mysql:host=" . $host . ";dbname=" . $name . ";charset=" .$charset;

    return new PDO($dsn, $user, $pass, $opt);
});