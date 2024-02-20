<?php

namespace App\Application\Query\GetMoviesStartedFromLetterAndWithEvenCharsCount;

final readonly class GetMoviesStartedFromLetterAndWithEvenCharsCountQuery
{
    public function __construct(public string $firstLetter)
    {
    }
}
