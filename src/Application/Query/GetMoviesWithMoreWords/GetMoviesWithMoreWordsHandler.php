<?php

namespace App\Application\Query\GetMoviesWithMoreWords;

use App\Domain\Collection\Movies;
use App\Domain\Repository\MoviesRepository;
use App\Domain\Specification\CountWordsSpecification;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class GetMoviesWithMoreWordsHandler
{
    public function __construct(
        private MoviesRepository $moviesRepository,
        private CountWordsSpecification $countWordsSpecification
    ) {
    }

    public function __invoke(GetMoviesWithMoreWordsQuery $query): Movies
    {
        $allMovies = $this->moviesRepository->getAllMovies();

        $movies = new Movies();

        foreach ($allMovies as $movie) {
            if ($this->countWordsSpecification->isSatisfiedBy(
                $movie,
                $query->length
            )) {
                $movies->append($movie);
            }
        }

        return $movies;
    }
}
