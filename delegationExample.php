<?php 

require_once(__DIR__ . '/vendor/autoload.php');

use HazelCodes\Delegation\DelegationTrait;

class ParentObject {
  use DelegationTrait;
}

class ChildObject {
  public $title;

  public function __construct($title) {
    $this->title = $title;
  }
}

$parent = new ParentObject;
$parent->delegate('title', new ChildObject('We specified the `as` argument here'), 'title')
       ->delegate('title', new ChildObject("and here we're using the auto generated attribute name"));

echo $parent->title . PHP_EOL;
echo $parent->childObjectTitle . PHP_EOL;

