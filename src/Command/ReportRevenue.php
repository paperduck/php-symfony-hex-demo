<?php
namespace Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ReportRevenue extends Command 
{
    protected function configure()
    {
        $this->setName('revenue')
        ->setDescription('Show revenue report')
        ->setHelp('This command shows the revenue report');
        //->addArgument('msg', InputArgument::REQUIRED, 'Pass a message');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $message = "Hello world.";
        $output->writeln($message);
    }
}
?>
