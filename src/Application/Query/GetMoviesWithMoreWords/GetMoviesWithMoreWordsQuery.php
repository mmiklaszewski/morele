<?php

namespace App\Application\Query\GetMoviesWithMoreWords;

final readonly class GetMoviesWithMoreWordsQuery
{
    public function __construct(public int $length)
    {
    }
}
