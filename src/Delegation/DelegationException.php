<?php 

namespace HazelCodes\Delegation;

use HazelCodes\Reflection\ReflectionTrait;

class DelegationException extends \Exception {

  use ReflectionTrait;

  public function __construct($object, $attribute) {
    $className = $this->getShortName($object);
    $message = sprintf("%s does not respond to %s", $className, $attribute);
    parent::__construct($message, 1);
  }
}
