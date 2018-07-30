<?php 

namespace HazelCodes\Reflection;

use \ReflectionClass;

trait ReflectionTrait {
  private $reflection;

  private function getReflection($object = null) {
    return (new ReflectionClass($object ?? $this));
  }

  public function getShortName($object = null) {
    return $this->getReflection($object)->getShortName();
  }

  public function getNamespaceName($object = null) {
    return $this->getReflection($object)->getNamespaceName();
  }

  public function getName($object = null) {
    return $this->getReflection($object)->getName();
  }

  public function hasProperty($attribute, $object = null) {
    return $this->getReflection($object)->hasProperty($attribute);
  }
}