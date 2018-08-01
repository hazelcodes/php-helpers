<?php 

namespace HazelCodes\Delegation;

use HazelCodes\Common\Reflection;

class Exception extends \Exception {
  public function __construct($object, $attribute) {
    $className = Reflection::getShortName($object);
    $message = sprintf("%s does not respond to %s", $className, $attribute);
    parent::__construct($message, 1);
  }
}
