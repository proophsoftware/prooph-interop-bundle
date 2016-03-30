<?php

namespace Prooph\InteropBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Prooph\InteropBundle\DependencyInjection\Configuration;
use Symfony\Component\Config\Definition\Processor;

class InteropConfigPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $processor = new Processor();

        $extensionNames = $container->getParameterBag()->get('interop_config');

        if (!is_array($extensionNames) && !$extensionNames instanceof \ArrayAccess) {
            throw new \RuntimeException(
                'The "interop_config" parameter must either be of type "array" or implement "\ArrayAccess".'
            );
        }

        $config = [];

        foreach ($extensionNames as $extensionName) {
            // bundle name is top level key in the config service
            $config[$extensionName] = $processor->processConfiguration(
                $configuration, $container->getExtensionConfig($extensionName)
            );
        }

        $container->setParameter('interop_config_parameters', $config);
    }
}