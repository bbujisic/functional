<?php
declare(strict_types=1);

namespace bbujisic\functional;

class Collection {

  private $_c;
  private $_e;

  public function __construct($collection, ...$extensions) {
    $this->_c = $collection;
    foreach ($extensions as $extension) {
      $this->_e[] = $extension;
    }
  }

  public function toArray() {
    return $this->_c;
  }

  public function map(callable $function): self {
    $o = [];
    foreach ($this->_c as $k => $i) {
      $o[$k] = $function($i);
    }

    return new self($o);
  }

  public function reduce(callable $function, $init = NULL) {
    foreach ($this->_c as $k => $i) {
      $init = $function($init, $i);
    }

    return $init;
  }

  public function filter(callable $function): self {
    $o = [];
    foreach ($this->_c as $k => $i) {
      if ($function($i, $k)) {
        $o[$k] = $i;
      }
    }

    return new self($o);
  }

  public function __call($name, $arguments) {
    // TODO: Implement __call() method.
  }
}
