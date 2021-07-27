<?php

namespace Jascha030\WpAutoSemver\Tests\Finder;

use Jascha030\WpAutoSemver\Finder\Finder;
use PHPUnit\Framework\TestCase;

class FinderTest extends TestCase
{
    public function testCreate(): Finder
    {
        $instance = Finder::create();

        self::assertInstanceOf(Finder::class, $instance);

        return $instance;
    }

    /**
     * @depends testCreate
     */
    public function testGetFinder(Finder $instance): void
    {
        // Get cloned symfony finder instance
        $clonedInstance = $instance->getFinder();

        // Quite useless due to return type, but nonetheless.
        self::assertInstanceOf(
            \Symfony\Component\Finder\Finder::class,
            $clonedInstance
        );

        // Triple check...
        self::assertIsIterable($clonedInstance);

        // Test if cloned instance is equal to instance when called again
        self::assertEquals($clonedInstance, Finder::create()->getFinder());

        // Sort so order is DESC
        $clonedInstance->sort(static fn ($a, $b) => strcmp($b->getRealpath(), $a->getRealpath()));

        // Test immutability
        self::assertNotEquals(
            $clonedInstance->getIterator(),
            Finder::create()->getFinder()->getIterator()
        );
    }

    /**
     * @depends testCreate
     */
    public function testToArray(Finder $instance): void
    {
        self::assertEquals(
            iterator_to_array($instance->getFinder()),
            Finder::create()->toArray()
        );
    }
}
