<?php

require('vendor/autoload.php');

use \App\Core;
use HttpKernel\Router;
use HttpKernel\RouteFactory;
use HttpKernel\Request;
use DI\ContainerBuilder;

$container = ContainerBuilder::buildDevContainer();
$container->get('App\Core')->serve(new Request($_SERVER));
