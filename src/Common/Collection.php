<?php 

namespace HazelCodes\Common;

use HazelCodes\Common\Reflection;
use HazelCodes\Common\UUID;

class Collection extends \ArrayObject {
  
  // TODO: Probably a better way to do this.
  public function __construct(array $initial = array()) {
    foreach ($initial as $value) {
      $this->append($value);
    }
  }

  public function append($value) : Collection {
    $this->offsetSet(UUID::generate(), $value);
    return $this;
  }

  public function prepend($value) : Collection {
    $source = $this->getArrayCopy();
    $destination = [UUID::generate() => $value] + $source;
    $this->exchangeArray($destination);

    return $this;
  }

  public function map($function) : Collection {
    $destination = new self;
    $destination->exchangeArray(
      array_map($function, $this->getArrayCopy())
    );
    return $destination;
  }

  public function reduce($function) {
    return array_reduce($this->getArrayCopy(), $function);
  }

  public function values() : array {
    return array_values($this->getArrayCopy());
  }

  public function keys() : array {
    return array_keys($this->getArrayCopy());
  }
}