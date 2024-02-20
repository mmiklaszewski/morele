<?php

namespace App\UI\Controller;

use App\Application\Query\GetMoviesStartedFromLetterAndWithEvenCharsCount\GetMoviesStartedFromLetterAndWithEvenCharsCountQuery;
use App\Application\Query\GetMoviesWithMoreWords\GetMoviesWithMoreWordsQuery;
use App\Application\Query\GetRandomMovies\GetRandomMoviesQuery;
use App\Application\Query\QueryBus;
use App\Domain\ValueObject\Algorithm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MovieController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }

    #[Route('/random-movies', name: 'random_movies')]
    public function randomMovies(QueryBus $queryBus): Response
    {
        $movies = $queryBus->handle(
            new GetRandomMoviesQuery(3)
        );

        return $this->render('result.html.twig', [
            'algorithm' => Algorithm::RANDOM_MOVIES,
            'movies' => $movies,
        ]);
    }

    #[Route('/started-from-letter-and-even-chars-count', name: 'started_from_letter_and_even_chars_count')]
    public function startedFromLetterAndEvenCharsCount(QueryBus $queryBus): Response
    {
        $movies = $queryBus->handle(
            new GetMoviesStartedFromLetterAndWithEvenCharsCountQuery('w')
        );

        return $this->render('result.html.twig', [
            'algorithm' => Algorithm::STARTED_FROM_LETTER_WITH_EVEN_CHARS_COUNT,
            'movies' => $movies,
        ]);
    }

    #[Route('/more-words', name: 'more_words')]
    public function moreWords(QueryBus $queryBus): Response
    {
        $movies = $queryBus->handle(
            new GetMoviesWithMoreWordsQuery(1)
        );

        return $this->render('result.html.twig', [
            'algorithm' => Algorithm::WITH_MORE_WORDS,
            'movies' => $movies,
        ]);
    }
}
