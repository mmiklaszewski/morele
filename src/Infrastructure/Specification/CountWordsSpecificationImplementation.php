<?php

namespace App\Infrastructure\Specification;

use App\Domain\Specification\CountWordsSpecification;
use App\Domain\ValueObject\Movie;

final class CountWordsSpecificationImplementation implements CountWordsSpecification
{
    public function isSatisfiedBy(Movie $movie, int $limit): bool
    {
        return $movie->wordsCount > $limit;
    }
}
