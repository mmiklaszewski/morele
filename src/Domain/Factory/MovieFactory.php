<?php

namespace App\Domain\Factory;

use App\Domain\ValueObject\Movie;

final class MovieFactory
{
    public static function create(string $title): Movie
    {
        return new Movie(
            $title,
            mb_strtolower(mb_substr($title, 0, 1)),
            mb_strlen($title), // all chars with spaces etc
            count(explode(' ', $title))
        );
    }
}
