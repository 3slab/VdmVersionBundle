<?php

namespace Vdm\Bundle\VersionBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Configuration
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('vdm_version');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->scalarNode('secret')
                    ->defaultNull()
                ->end()
                ->scalarNode('path')
                    ->treatFalseLike('/version')
                    ->treatTrueLike('/version')
                    ->treatNullLike('/version')
                    ->defaultValue('/version')
                ->end()
                ->arrayNode('versions')
                    ->useAttributeAsKey('name')
                    ->prototype('scalar')->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
