<?php namespace Froxlor\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

class BaseCommand extends Command implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function setting($name, $default = null)
    {
        $db = $this->container->get('db');

        $setting = $db
            ->getRepository('Froxlor\Entity\Setting')
            ->findByFullyQualifiedName($name)
            ->getValue();

        if (!is_null($setting)) return $setting;

        return $default;
    }
}
