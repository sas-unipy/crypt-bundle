<?php

namespace UNIPY\CryptBundle\Command;

use LSS\Crypt;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CryptKeyCommand extends ContainerAwareCommand {

    public function configure()
    {
        $this->setName("unipy:crypt:gen-key");
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(Crypt::keyCreate());
    }
}