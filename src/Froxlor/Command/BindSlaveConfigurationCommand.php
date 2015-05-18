<?php namespace Froxlor\Command;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class BindSlaveConfigurationCommand extends BaseCommand
{

    protected function configure()
    {
        $this
            ->setName('bind:slave')
            ->setDescription('Generates a set of Bind slave configurations for a slave DNS server')
            ->addOption(
               'path',
               null,
               InputOption::VALUE_OPTIONAL,
               'If set, the path to output the zone file to, default: echo to terminal'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        global $twig;
        global $entityManager;

        $domains = $entityManager
            ->getRepository('Froxlor\Entity\Domain')
            ->findAll();

        $zones = $twig->render(
            'BindSlave.twig',
            [
                'domains' => $domains,
                'froxlor_host' => $this->setting('system.hostname'),
                'master_ip' => $this->setting('system.ipaddress')
            ]
        );

        if ($path = $input->getOption('path')) {
            $fs = new FileSystem();
            $fs->dumpFile($path . '/slave_zones.conf', $zones);
            return;
        }

        $output->write($zones);
    }

}
