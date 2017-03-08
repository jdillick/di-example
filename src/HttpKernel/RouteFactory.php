<?php

declare(strict_types=1);

namespace HttpKernel;

class RouteFactory {
  public static function createRoute(string $method, string $path, callable $controller): Route {
    return new Route($method, $path, $controller);
  }
}
