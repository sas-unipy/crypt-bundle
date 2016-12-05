<?php

namespace UNIPY\CryptBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use UNIPY\CryptBundle\DependencyInjection\Compiler\ProviderPass;

class UNIPYCryptBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new ProviderPass());
    }
}
