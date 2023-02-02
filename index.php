<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('index', 'DefaultController');

Router::post('login', 'SecurityController');
Router::post('register', 'SecurityController');

Router::get('StartStationSearchAPI', 'SearchController');
Router::get('EndStationSearchAPI', 'SearchController');
Router::get('results', 'SearchController');

Router::get('profile', 'ProfileController');

Router::run($path);