<?php

namespace HttpKernel;
use \Exception;

class Router {
  private $routes;

  public function __construct() {
    $this->routes = [];
  }

  public function addRoute(Route $route) {
    $this->routes[] = $route;
  }

  public function serviceRequest(Request $request): Response {
    foreach ( $this->routes as $route ) {
      if ( $route->matches($request) ) {
        return $route->callController();
      }
    }

    throw new NotFoundException;
  }
}

class NotFoundException extends Exception {}
