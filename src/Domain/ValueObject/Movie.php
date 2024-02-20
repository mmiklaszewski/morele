<?php

namespace App\Domain\ValueObject;

final readonly class Movie
{
    public function __construct(
        public string $title,
        public string $firstChar,
        public int $charsCount,
        public int $wordsCount
    ) {
    }
}
