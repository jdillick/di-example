<?php

declare(strict_types=1);

namespace HttpKernel;

class Response {
  private $status;
  private $content;

  public function __construct(int $status, string $content) {
    $this->status = $status;
    $this->content = $content;
  }

  public function getStatus() {
    return $this->status;
  }

  public function getContent() {
    return $this->content;
  }
}
