<?php

namespace HttpKernel;

class Request {
  private $method;
  private $path;

  public function __construct(array $request) {
    $this->path = parse_url($request['REQUEST_URI'], PHP_URL_PATH);
    $this->method = $request['REQUEST_METHOD'];
  }

  public function getMethod() {
    return $this->method;
  }

  public function getPath() {
    return $this->path;
  }
}
