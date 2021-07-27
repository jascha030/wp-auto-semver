<?php

namespace Jascha030\WpAutoSemver\Tests\Finder;

use Jascha030\WpAutoSemver\Finder\Finder;
use PHPUnit\Framework\TestCase;

class FinderTest extends TestCase
{
    public function testGetFinder(): void
    {
        // Get instance
        $clonedInstance = Finder::create()->getFinder();

        // Quite useless due to return type, but nonetheless.
        self::assertInstanceOf(
            \Symfony\Component\Finder\Finder::class,
            $clonedInstance
        );

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
    //
    // public function testToArray(): void
    // {
    // }
    //
    // public function testCreate(): void
    // {
    // }
}
