<?php

namespace App\Domain\ValueObject;

final readonly class Algorithm
{
    public const string RANDOM_MOVIES = 'random-movies';
    public const string STARTED_FROM_LETTER_WITH_EVEN_CHARS_COUNT = 'started-from-letter-with-even-chars-count';

    public const string WITH_MORE_WORDS = 'with-more-words';
}
