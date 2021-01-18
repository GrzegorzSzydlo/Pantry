<?php
session_start();
require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');

Router::get('welcome', 'DefaultController');
Router::get('logout', 'DefaultController');
Router::get('contact', 'DefaultController');
Router::get('recipe', 'DefaultController');

Router::post('login', 'SecurityController');
Router::post('registration', 'SecurityController');

Router::post('add_item', 'ItemController');
Router::post('main', 'ItemController');
Router::post('addItem', 'ItemController');
Router::get('plus', 'ItemController');
Router::get('minus', 'ItemController');
Router::post('addItemWithSelect', 'ItemController');

Router::post('add_recipe','RecipeController');

Router::run($path);