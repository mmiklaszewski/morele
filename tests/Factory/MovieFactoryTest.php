<?php

namespace Factory;

use App\Domain\Factory\MovieFactory;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class MovieFactoryTest extends KernelTestCase
{
    /**
     * @dataProvider correctData
     */
    public function testCorrect(string $title, string $firstLetter, int $charsCount, int $wordsCount)
    {
        $movie = MovieFactory::create($title);

        $this->assertEquals($title, $movie->title);
        $this->assertEquals($firstLetter, $movie->firstChar);
        $this->assertEquals($charsCount, $movie->charsCount);
        $this->assertEquals($wordsCount, $movie->wordsCount);
    }

    /**
     * @dataProvider incorrectData
     */
    public function testIncorrect(string $title, string $firstLetter, int $charsCount, int $wordsCount)
    {
        $movie = MovieFactory::create($title);

        $this->assertEquals($title, $movie->title);
        $this->assertNotEquals($firstLetter, $movie->firstChar);
        $this->assertNotEquals($charsCount, $movie->charsCount);
        $this->assertNotEquals($wordsCount, $movie->wordsCount);
    }

    public static function correctData(): array
    {
        return [
            [
                'Test title', 't', 10, 2,
            ],
            [
                'ęśąćż', 'ę', 5, 1,
            ],
            [
                'example title', 'e', 13, 2,
            ],
            [
                'word', 'w', 4, 1,
            ],
        ];
    }

    public static function incorrectData(): array
    {
        return [
            [
                'Test title', 'Q', 4, 1,
            ],
            [
                'ęśąćż', 'Z', 4, 2,
            ],
            [
                'example title', 'R', 9, 3,
            ],
            [
                'word', 'X', 5, 2,
            ],
        ];
    }
}
