<?php

require('vendor/autoload.php');

use \App\Core;
use HttpKernel\Router;
use HttpKernel\RouteFactory;
use HttpKernel\Request;

$core = new Core(new Router, new RouteFactory);
$core->serve(new Request($_SERVER));
