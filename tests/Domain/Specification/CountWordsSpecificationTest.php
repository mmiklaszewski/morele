<?php

namespace Domain\Specification;

use App\Domain\Factory\MovieFactory;
use App\Domain\Specification\CountWordsSpecification;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CountWordsSpecificationTest extends KernelTestCase
{
    /**
     * @dataProvider correctData
     */
    public function testCorrect(string $title, int $words)
    {
        self::bootKernel();
        $container = self::getContainer();
        $specification = $container->get(CountWordsSpecification::class);

        $movie = MovieFactory::create($title);

        $this->assertTrue($specification->isSatisfiedBy($movie, $words));
    }

    /**
     * @dataProvider incorrectData
     */
    public function testIncorrect(string $title, int $words)
    {
        self::bootKernel();
        $container = self::getContainer();
        $specification = $container->get(CountWordsSpecification::class);

        $movie = MovieFactory::create($title);

        $this->assertFalse($specification->isSatisfiedBy($movie, $words));
    }

    public static function correctData(): array
    {
        return [
            [
                'Test title', 1,
            ],
            [
                'ęśąćż ęśąćż ęśąćż', 2,
            ],
            [
                'ęśąćż ęśąćż ęśąćż', 1,
            ],
            [
                'example title', 1,
            ],
            [
                'word1 word 2', 1,
            ],
        ];
    }

    public static function incorrectData(): array
    {
        return [
            [
                'Test title', 2,
            ],
            [
                'ęśąćż', 2,
            ],
            [
                'example title', 3,
            ],
            [
                'word', 1,
            ],
        ];
    }
}
