<?php

namespace App\Infrastructure\Specification;

use App\Domain\Specification\EvenCharsCountSpecification;
use App\Domain\ValueObject\Movie;

final class EvenCharsCountSpecificationImplementation implements EvenCharsCountSpecification
{
    public function isSatisfiedBy(Movie $movie): bool
    {
        return 0 === $movie->charsCount % 2;
    }
}
