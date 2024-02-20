<?php

namespace App\Infrastructure\Repository;

use App\Domain\Collection\Movies;
use App\Domain\Factory\MovieFactory;
use App\Domain\Repository\MoviesRepository;
use App\Infrastructure\Storage\MoviesStorage;

final class MoviesRepositoryImplementation implements MoviesRepository
{
    public function getAllMovies(): Movies
    {
        $movieTitles = MoviesStorage::allMovies();

        $movies = new Movies();

        foreach ($movieTitles as $movieTitle) {
            $movies->append(
                MovieFactory::create($movieTitle)
            );
        }

        return $movies;
    }
}
