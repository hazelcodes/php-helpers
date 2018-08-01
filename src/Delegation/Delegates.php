<?php 

namespace HazelCodes\Delegation;

trait Delegates {
  private $delegations = null;

  private function getCollection() {
    $this->delegations = $this->delegations ?? new Collection($this);
    return $this->delegations;
  }

  public function delegate($attribute, $object, $as = null) {
    $this->getCollection()->add($attribute, $object, $as);
    return $this;
  }

  public function __get($attribute) {
    return $this->{$attribute} ?? $this->getCollection()->{$attribute};
  }
}