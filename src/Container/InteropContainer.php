<?php
/**
 * prooph (http://getprooph.org/)
 *
 * @see       https://github.com/proophsoftware/prooph-interop-bundle for the canonical source repository
 * @copyright Copyright (c) 2016 prooph software GmbH (http://prooph-software.com/)
 * @license   https://github.com/proophsoftware/prooph-interop-bundle/blob/master/LICENSE.md New BSD License
 */

namespace Prooph\InteropBundle\Container;

use Interop\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface as SymfonyContainerInterface;

/**
 * Simple wrapper for the Symfony container to have container-interop support
 */
class InteropContainer implements ContainerInterface
{
    /**
     * A Symfony Container
     *
     * @var SymfonyContainerInterface
     */
    private $container;

    /**
     * @param SymfonyContainerInterface $container A Symfony Container
     */
    public function __construct(SymfonyContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @interitdoc
     */
    public function get($id)
    {
        return $this->container->get($id);
    }

    /**
     * @interitdoc
     */
    public function has($id)
    {
        return $this->container->has($id);
    }
}
