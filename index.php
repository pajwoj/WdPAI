<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('index', 'DefaultController');
Router::get('register', 'DefaultController');
Router::get('results', 'DefaultController');
Router::get('profile', 'DefaultController');

Router::post('login', 'SecurityController');

Router::run($path);