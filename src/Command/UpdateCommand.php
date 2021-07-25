<?php

namespace Jascha030\WpAutoSemver\Command;

use Jascha030\WpAutoSemver\Finder\Finder;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class UpdateCommand extends Command
{
    public function configure(): void
    {
        $this->setDescription(
            'Update Wordpress Plugin version number based on the Composer package version.'
        );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
    }
}
