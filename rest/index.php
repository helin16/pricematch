<?php
require 'bootstrap.php';

session_start();
$server = new \Jacwright\RestServer\RestServer('debug');
$server->cacheDir = dirname(__FILE__) . '/protected/cache/';
$server->root = '/';
$server->addClass('IndexController');
$server->addClass('UserController', '/users');
$server->handle();
