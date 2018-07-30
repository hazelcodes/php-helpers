<?php 

namespace HazelCodes\Delegation;

class DelegationCollection extends \ArrayObject {
  private $parent;


  public function __construct($parent, ...$args) {
    $this->parent = $parent;
    parent::__construct(...$args);
  }

  public function add($attribute, $object, $as = null) : DelegationCollection {
    $item = new DelegationItem($attribute, $object, $as);
    $this->__set($item->callable, $item);
    return $this;
  }

  public function __get($attribute) {
    if ($this->offsetExists($attribute)) {
      return $this->offsetGet($attribute)->call();
    } else {
      throw new DelegationException($this->parent, $attribute);
    }
  }

  public function __set($attribute, $value) {
    $this->offsetSet($attribute, $value);
    return $this->offsetGet($attribute);
  }
}