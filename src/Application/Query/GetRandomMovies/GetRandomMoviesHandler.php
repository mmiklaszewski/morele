<?php

namespace App\Application\Query\GetRandomMovies;

use App\Domain\Collection\Movies;
use App\Domain\Repository\MoviesRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class GetRandomMoviesHandler
{
    public function __construct(private MoviesRepository $moviesRepository)
    {
    }

    public function __invoke(GetRandomMoviesQuery $query): Movies
    {
        $allMovies = $this->moviesRepository->getAllMovies();

        $randomMovies = new Movies();
        foreach (array_rand((array) $allMovies, $query->limit) as $key) {
            $randomMovies->append($allMovies->offsetGet($key));
        }

        return $randomMovies;
    }
}
