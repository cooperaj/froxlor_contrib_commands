<?php namespace Froxlor\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class BaseCommand extends Command
{
    public function setting($name, $default = null)
    {
        global $entityManager;

        $setting = $entityManager
            ->getRepository('Froxlor\Entity\Setting')
            ->findByFullyQualifiedName($name)
            ->getValue();

        if (!is_null($setting)) return $setting;

        return $default;
    }
}
