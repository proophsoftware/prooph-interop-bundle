<?php
/**
 * prooph (http://getprooph.org/)
 *
 * @see       https://github.com/proophsoftware/prooph-interop-bundle for the canonical source repository
 * @copyright Copyright (c) 2016 prooph software GmbH (http://prooph-software.com/)
 * @license   https://github.com/proophsoftware/prooph-interop-bundle/blob/master/LICENSE.md New BSD License
 */

namespace Prooph\InteropBundle;

use Prooph\InteropBundle\DependencyInjection\Compiler\InteropConfigPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Symfony bundle to support container-interop and puts bundle configuration in the "config" service so it can be used
 * by the container-interop factories
 */
class ProophInteropBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new InteropConfigPass());
    }
}
