<?php
declare(strict_types=1);

namespace bbujisic\functional\tests;

use PHPUnit\Framework\TestCase;
use bbujisic\functional\Collection;

final class CollectionTest extends TestCase {

  public function testCanBeCreatedFromArray(): void {
    $this->assertInstanceOf(Collection::class, new Collection([1, 2, 3]));
  }

  public function testCollectionMap(): void {
    $c = new Collection([1, 2, 3]);
    $result = $c->map(function ($x) {
      return $x * 2;
    });

    $this->assertInstanceOf(Collection::class, $result);
    $this->assertEquals([2, 4, 6], $result->toArray());
  }

  public function testCollectionFilter(): void {
    $c = new Collection([1, 2, 3, 4]);
    $result = $c->filter(function ($x) {
      return $x % 2 == 0;
    });

    $this->assertInstanceOf(Collection::class, $result);
    $this->assertEquals([2, 4], array_values($result->toArray()));
  }

  public function testCollectionReduce() {
    $c = new Collection([1, 2, 3, 4]);
    $result = $c->reduce(function($a, $b) {
      return ($a ? $a * $b : $b);
    });

    $this->assertEquals(24, $result);
  }
}