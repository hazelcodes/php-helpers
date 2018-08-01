<?php

namespace HazelCodes\View;

use \HazelCodes\Delegation\Delegates;

abstract class View {
  use Delegates;

  protected $context;

  abstract public function __toString() : string;

  public function __construct($context) {
    $this->context = $context;
  }

  static public function render($context) {
    $class = get_called_class();
    return (string) (new $class($context));
  }
}

