<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('index', 'DefaultController');
Router::get('results', 'DefaultController');

Router::post('login', 'SecurityController');
Router::post('register', 'SecurityController');

Router::get('StationSearchAPI', 'SearchController');

Router::get('profile', 'ProfileController');

Router::run($path);