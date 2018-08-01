<?php 

require_once(__DIR__ . '/../vendor/autoload.php');

use HazelCodes\Common\Collection;

$first = new Collection;
$first->append('testing');
$first->prepend('this should be first');

var_dump($first);

class KeyValue {
  public $key;
  public $value; 

  public function __construct($key, $value) {
    $this->key = $key;
    $this->value = $value;
  }
}

$second = new Collection();
$second->append(new KeyValue('1','first'))
       ->append(new KeyValue('123', 'second'));

var_dump($second);

$mapped = $second->map(function($object){
  return $object->value;
}); 

var_dump($mapped->values());
var_dump($mapped->keys());

foreach($mapped as $key => $value) {
  echo "$key : $value\n";
}

$reduced = $second->reduce(function($carry, $object) {
  return $carry .= $object->value;
});

var_dump($reduced);