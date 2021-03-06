<?php

require __DIR__ . '/vendor/autoload.php';

use App\Command\MapperCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

$application = new Application();
$application->add(new MapperCommand());
$application->run();