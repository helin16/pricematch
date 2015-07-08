<?php

require __DIR__ . '/../source/Jacwright/RestServer/RestServer.php';
require 'TestController.php';

$server = new \Jacwright\RestServer\RestServer('debug');
$server->addClass('TestController', '/users'); // adds this as a base to all the URLs in this class
$server->handle();
