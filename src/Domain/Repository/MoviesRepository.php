<?php

namespace App\Domain\Repository;

use App\Domain\Collection\Movies;

interface MoviesRepository
{
    public function getAllMovies(): Movies;
}
