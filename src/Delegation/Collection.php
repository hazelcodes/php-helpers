<?php 

namespace HazelCodes\Delegation;

class Collection extends \ArrayObject {
  private $parent;

  public function __construct($parent, ...$args) {
    $this->parent = $parent;
    parent::__construct(...$args);
  }

  public function add(string $attribute, $object, string $as = null) : Collection {
    $item = new Item($attribute, $object, $as);
    $this->__set($item->callable, $item);
    return $this;
  }

  public function __get(string $attribute) {
    if ($this->offsetExists($attribute)) {
      return $this->offsetGet($attribute)->call();
    } else {
      throw new Exception($this->parent, $attribute);
    }
  }

  public function __set(string $attribute, $object) {
    $this->offsetSet($attribute, $object);
    return $this->offsetGet($attribute);
  }
}