# Yet Another Take on Functional PHP

[![Build Status](https://travis-ci.com/bbujisic/functional.svg?branch=master)](https://travis-ci.com/bbujisic/functional)
[![Coverage Status](https://coveralls.io/repos/github/bbujisic/functional/badge.svg?branch=master)](https://coveralls.io/github/bbujisic/functional?branch=master)

Nothing special. It just adds a little bit of syntactic sugar for more expressive code.

## Example

```php
<?php

use bbujisic\functional\Collection;

$collection = new Collection([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);

$sumSquaresOfOddItems = $collection
  ->filter(function ($x) { return $x % 2 == 0; })
  ->map(function ($x) { return $x * $x; })
  ->reduce(function($x, $y) { return $x + $y; });
```

Comparable imperative-style programming would perform a wee bit better, at a cost of lesser readability:

```php
<?php

$collection = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$sumSquaresOfOddItems = 0;
foreach ($collection as $item) {
  if ($item % 2 == 0) {
    $sumSquaresOfOddItems += $item * $item;
  }
}


```

