<?php

namespace App\Command;

use App\DataMapper\TeamMapper;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MapperCommand extends Command
{
    protected static $defaultName = 'app:mapper';

    protected function configure()
    {
        $this->setDescription('Call mapper command');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $teamMapper = new TeamMapper();
        $fullTeam = $teamMapper->createObject($teamMapper->find(4));

        foreach ($fullTeam->getPlayers() as $player) {
            $output->writeln(sprintf('<info>%s</info>', $player->getPlayer()));
        }
    }
}
