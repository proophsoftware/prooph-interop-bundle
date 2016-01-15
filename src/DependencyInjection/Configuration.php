<?php
/**
 * prooph (http://getprooph.org/)
 *
 * @see       https://github.com/proophsoftware/prooph-interop-bundle for the canonical source repository
 * @copyright Copyright (c) 2016 prooph software GmbH (http://prooph-software.com/)
 * @license   https://github.com/proophsoftware/prooph-interop-bundle/blob/master/LICENSE.md New BSD License
 */
namespace Prooph\InteropBundle\DependencyInjection;

use Prooph\InteropBundle\Config\Definition\Builder\DynamicArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\NodeBuilder;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Configures only the prooph main node
 *
 * The prooph factories validates the given configuration
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $nodeBuilder = new NodeBuilder();
        $nodeBuilder->setNodeClass('dynamicArray', DynamicArrayNodeDefinition::class);
        $treeBuilder = new TreeBuilder();

        $rootNode = $treeBuilder->root('prooph', 'dynamicArray', $nodeBuilder);

        // our factories handles validation and we are flexible with keys
        // Please take a look at the docs or specific prooph component factory for the configuration options
        $rootNode->ignoreExtraKeys(false);

        return $treeBuilder;
    }
}
