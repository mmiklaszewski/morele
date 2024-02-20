<?php

namespace App\Application\Query\GetRandomMovies;

final readonly class GetRandomMoviesQuery
{
    public function __construct(public int $limit)
    {
    }
}
