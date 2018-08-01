<?php 

namespace HazelCodes\Common;

class Reflection {

  static public function getReflection($object) {
    return (new \ReflectionClass($object));
  }

  static public function getShortName($object) : string {
    return self::getReflection($object)->getShortName();
  }

  static public function getNamespaceName($object) : string {
    return self::getReflection($object)->getNamespaceName();
  }

  static public function getName($object) : string {
    return self::getReflection($object)->getName();
  }

  static public function hasProperty(string $attribute, $object) : bool {
    return self::getReflection($object)->hasProperty($attribute);
  }

}