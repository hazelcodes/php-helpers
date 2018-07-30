<?php 

namespace HazelCodes\Delegation;

use HazelCodes\Reflection\ReflectionTrait;

class DelegationItem {
  use ReflectionTrait;
  
  private $attribute;
  private $object;
  public $callable;

  public function __construct($attribute, $object, $as = null) {
    if (!$this->hasProperty($attribute, $object)) {
      throw new DelegationException($object, $attribute);
    }
    
    $this->attribute = $attribute;
    $this->object = $object;

    $this->callable = $as ?? $this->callable();
  }

  public function call() {
    return $this->object->{$this->attribute};
  }

  private function callable() {
    $className = $this->getShortName($this->object);
    return lcfirst($className) . ucfirst($this->attribute);
  }

}
