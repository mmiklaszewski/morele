<?php

namespace App\Domain\Specification;

use App\Domain\ValueObject\Movie;

interface CountWordsSpecification
{
    public function isSatisfiedBy(Movie $movie, int $limit): bool;
}
