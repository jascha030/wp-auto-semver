<?php

namespace Jascha030\WpAutoSemver\Finder;

final class Finder
{
    private \Symfony\Component\Finder\Finder $finder;

    private function __construct()
    {
        $this->finder = (new \Symfony\Component\Finder\Finder())
            ->files()
            ->in(getcwd())
            ->name('*.php')
            ->contains('* Plugin Version:')->depth(0);
    }

    public static function create(): Finder
    {
        return new self();
    }

    /**
     * Get cloned Symfony Finder instance
     * @return \Symfony\Component\Finder\Finder
     */
    public function getFinder(): \Symfony\Component\Finder\Finder
    {
        return clone $this->finder;
    }

    public function toArray(): array
    {
        return iterator_to_array($this->getFinder());
    }
}
