<?php

namespace Domain\Specification;

use App\Domain\Factory\MovieFactory;
use App\Domain\Specification\FirstLetterSpecification;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class FirstLetterSpecificationTest extends KernelTestCase
{
    /**
     * @dataProvider correctData
     */
    public function testCorrect(string $title, string $letter)
    {
        self::bootKernel();
        $container = self::getContainer();
        $specification = $container->get(FirstLetterSpecification::class);

        $movie = MovieFactory::create($title);

        $this->assertTrue($specification->isSatisfiedBy($movie, $letter));
    }

    /**
     * @dataProvider incorrectData
     */
    public function testIncorrect(string $title, string $letter)
    {
        self::bootKernel();
        $container = self::getContainer();
        $specification = $container->get(FirstLetterSpecification::class);

        $movie = MovieFactory::create($title);

        $this->assertFalse($specification->isSatisfiedBy($movie, $letter));
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
