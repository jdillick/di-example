<?php

declare(strict_types=1);

namespace HttpKernel;

class Route {
  private $method;
  private $path;
  private $controller;

  public function __construct(string $method = 'GET', string $path, callable $controller) {
      $this->method = $method;
      $this->path = $path;
      $this->controller = $controller;
  }

  public function matches(Request $request) {
    return $request->getMethod() === $this->method && $request->getPath() === $this->path;
  }

  public function callController() {
    return call_user_func($this->controller);
  }
}
