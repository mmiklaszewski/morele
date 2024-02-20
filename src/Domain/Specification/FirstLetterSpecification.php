<?php

namespace App\Domain\Specification;

use App\Domain\ValueObject\Movie;

interface FirstLetterSpecification
{
    public function isSatisfiedBy(Movie $movie, string $letter): bool;
}
