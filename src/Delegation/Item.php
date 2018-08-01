<?php 

namespace HazelCodes\Delegation;

use HazelCodes\Common\Reflection;

class Item {
  private $attribute;
  private $object;
  public $callable;

  public function __construct(string $attribute, $object, string $as = null) {
    if (!Reflection::hasProperty($attribute, $object)) {
      throw new Exception($object, $attribute);
    }
    
    $this->attribute = $attribute;
    $this->object = $object;

    $this->callable = $as ?? $this->callable();
  }

  public function call() {
    return $this->object->{$this->attribute};
  }

  private function callable() : string {
    $className = Reflection::getShortName($this->object);
    return lcfirst($className) . ucfirst($this->attribute);
  }

}
