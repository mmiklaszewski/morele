<?php

namespace App\Infrastructure\Specification;

use App\Domain\Specification\FirstLetterSpecification;
use App\Domain\ValueObject\Movie;

final class FirstLetterSpecificationImplementation implements FirstLetterSpecification
{
    public function isSatisfiedBy(Movie $movie, string $letter): bool
    {
        return mb_strtolower($movie->firstChar) === mb_strtolower($letter);
    }
}
