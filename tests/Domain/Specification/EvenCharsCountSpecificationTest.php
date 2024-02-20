<?php

namespace Domain\Specification;

use App\Domain\Factory\MovieFactory;
use App\Domain\Specification\EvenCharsCountSpecification;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class EvenCharsCountSpecificationTest extends KernelTestCase
{
    /**
     * @dataProvider correctData
     */
    public function testCorrect(string $title)
    {
        self::bootKernel();
        $container = self::getContainer();
        $specification = $container->get(EvenCharsCountSpecification::class);

        $movie = MovieFactory::create($title);

        $this->assertTrue($specification->isSatisfiedBy($movie));
    }

    /**
     * @dataProvider incorrectData
     */
    public function testIncorrect(string $title)
    {
        self::bootKernel();
        $container = self::getContainer();
        $specification = $container->get(EvenCharsCountSpecification::class);

        $movie = MovieFactory::create($title);
        $this->assertFalse($specification->isSatisfiedBy($movie));
    }

    public static function correctData(): array
    {
        return [
            [
                'Test title',
            ],
            [
                'ęśąćżś',
            ],
            [
                'one two three3',
            ],
        ];
    }

    public static function incorrectData(): array
    {
        return [
            [
                'Test title xy',
            ],
            [
                'ęśąćż',
            ],
            [
                'world',
            ],
        ];
    }
}
