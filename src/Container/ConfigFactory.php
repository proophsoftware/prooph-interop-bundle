<?php
/**
 * prooph (http://getprooph.org/)
 *
 * @see       https://github.com/proophsoftware/prooph-interop-bundle for the canonical source repository
 * @copyright Copyright (c) 2016 prooph software GmbH (http://prooph-software.com/)
 * @license   https://github.com/proophsoftware/prooph-interop-bundle/blob/master/LICENSE.md New BSD License
 */

namespace Prooph\InteropBundle\Container;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Creates an object with several bundle configurations depending on parameter "interop_config" definition
 */
class ConfigFactory
{
    /**
     * Returns an \ArrayObject with the configuration of the defined extensions (parameter "interop_config")
     *
     * @param ContainerInterface $container
     * @return \ArrayObject
     */
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->getParameter('interop_config_parameters');
        return new \ArrayObject($config);
    }
}
