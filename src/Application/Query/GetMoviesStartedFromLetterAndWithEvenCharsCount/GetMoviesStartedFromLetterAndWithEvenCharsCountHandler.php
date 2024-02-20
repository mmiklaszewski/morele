<?php

namespace App\Application\Query\GetMoviesStartedFromLetterAndWithEvenCharsCount;

use App\Domain\Collection\Movies;
use App\Domain\Repository\MoviesRepository;
use App\Domain\Specification\EvenCharsCountSpecification;
use App\Domain\Specification\FirstLetterSpecification;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class GetMoviesStartedFromLetterAndWithEvenCharsCountHandler
{
    public function __construct(
        private MoviesRepository $moviesRepository,
        private EvenCharsCountSpecification $evenLengthSpecification,
        private FirstLetterSpecification $firstLetterSpecification
    ) {
    }

    public function __invoke(GetMoviesStartedFromLetterAndWithEvenCharsCountQuery $query): Movies
    {
        $allMovies = $this->moviesRepository->getAllMovies();

        $movies = new Movies();

        foreach ($allMovies as $movie) {
            $firstLetter = $this->firstLetterSpecification->isSatisfiedBy($movie, $query->firstLetter);
            $evenCharsCount = $this->evenLengthSpecification->isSatisfiedBy($movie);
            if ($firstLetter && $evenCharsCount) {
                $movies->append($movie);
            }
        }

        return $movies;
    }
}
