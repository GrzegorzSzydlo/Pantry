<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('main', 'DefaultController');
Router::get('registration', 'DefaultController');
Router::get('welcome', 'DefaultController');

Router::run($path);