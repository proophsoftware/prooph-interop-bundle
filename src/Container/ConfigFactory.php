<?php
/**
 * prooph (http://getprooph.org/)
 *
 * @see       https://github.com/proophsoftware/prooph-interop-bundle for the canonical source repository
 * @copyright Copyright (c) 2016 prooph software GmbH (http://prooph-software.com/)
 * @license   https://github.com/proophsoftware/prooph-interop-bundle/blob/master/LICENSE.md New BSD License
 */

namespace Prooph\InteropBundle\Container;

use Prooph\InteropBundle\DependencyInjection\Configuration;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Creates an object with several bundle configurations depending on parameter "interop_config" definition
 */
class ConfigFactory
{
    /**
     * Returns an \ArrayObject with the configuration of the defined extensions (parameter "interop_config")
     *
     * @param ContainerBuilder $container
     * @return \ArrayObject
     */
    public function __invoke(ContainerBuilder $container)
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
        return new \ArrayObject($config);
    }
}
