<?php

namespace UNIPY\CryptBundle\DependencyInjection\Compiler;


use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\DefinitionDecorator;
use Symfony\Component\DependencyInjection\Reference;
use UNIPY\CryptBundle\Builder\ProviderBuilder;

class ProviderPass implements CompilerPassInterface {
    private $keys = array();

    public function process(ContainerBuilder $container)
    {
        $tagged = $container->findTaggedServiceIds("unipy.crypt.provider");

        $default = $container->getParameter("unipy.crypt.default");

        foreach($tagged as $id => $tags) {
            if(array_key_exists('key', $tags[0])) {
                $key = $tags[0]['key'];
                if($key !== 'default' && !in_array($key, $this->keys)) {
                    $definition = new Definition(ProviderBuilder::class, array($container->getDefinition($id)->getClass()));
                    $container->setDefinition("unipy.crypt." . $key, $definition);
                    $this->keys[] = $key;
                    if($id === $default)
                        $container->setDefinition("unipy.crypt.default", $definition);

                    $container->removeDefinition($id);
                }
            }
        }
    }
}