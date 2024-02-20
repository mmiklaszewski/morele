<?php

namespace App\Domain\Collection;

use App\Domain\ValueObject\Movie;
use Assert\Assertion;

final class Movies extends \ArrayIterator
{
    public function __construct(object|array $array = [], int $flags = 0)
    {
        Assertion::allIsInstanceOf($array, Movie::class);
        parent::__construct($array, $flags);
    }

    public function append($value): void
    {
        Assertion::isInstanceOf($value, Movie::class);
        parent::append($value);
    }
}
