<?php 

require_once(__DIR__ . '/../vendor/autoload.php');

use HazelCodes\View\View;

class User {
  public $first_name;
  public $last_name;

  public function __construct(string $first_name, string $last_name) {
    $this->first_name = $first_name;
    $this->last_name = $last_name;
  }
}

class UserView extends View {
  public function __construct(User $user) {
    parent::__construct($user);

    $this->delegate('first_name', $this->context, 'first_name');
    $this->delegate('last_name',  $this->context, 'last_name');
  }

  public function fullName() : string {
    return "{$this->first_name} {$this->last_name}";
  }

  public function __toString() : string {
    return "User's full name: {$this->fullName()}" . PHP_EOL;
  }
}


$user = new User('Jason', 'Hazel');
echo UserView::render($user);

$user2 = new User('Butts', 'Carlton');
$view = new UserView($user2);
echo $view;
