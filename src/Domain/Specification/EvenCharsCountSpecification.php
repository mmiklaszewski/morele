<?php

namespace App\Domain\Specification;

use App\Domain\ValueObject\Movie;

interface EvenCharsCountSpecification
{
    public function isSatisfiedBy(Movie $movie): bool;
}
