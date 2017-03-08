<?php

namespace App;

use HttpKernel\Router;
use HttpKernel\RouteFactory;
use HttpKernel\Request;
use HttpKernel\Response;
use HttpKernel\NotFoundException;
use Exception;

class Core {
  private $router;

  public function __construct(Router $router, RouteFactory $routeFactory) {
    $this->router = $router;
    $this->router->addRoute($routeFactory::createRoute('GET', '/', [$this, 'default']));
    $this->router->addRoute($routeFactory::createRoute('GET', '/hello', [$this, 'hello']));
  }

  public function default() {
    return new Response(200, 'The default page');
  }

  public function hello() {
    return new Response(200, 'Hello World');
  }

  public function serve(Request $request) {
    try {
      $response = $this->router->serviceRequest($request);
      http_response_code($response->getStatus());
      echo $response->getContent();

    } catch (Exception $e) {
      $this->handleExceptions($e);
    }
  }

  public function handleExceptions(\Exception $e) {
    if ( is_a($e, '\HttpKernel\NotFoundException') ) {
      $this->notFound($e);
    } else {
      $this->serverError($e);
    }
  }

  public function notFound(NotFoundException $e) {
    http_response_code(404);
    echo 'Not Found';
  }

  public function serverError(Exception $e) {
    http_response_code(500);
    echo $e->getMessage();
  }
}
