<?php

namespace Symfony\Cmf\Bundle\TestingBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();

        $treeBuilder->root('cmf_testing')
            ->children()
                ->arrayNode('app')
                    ->addDefaultsIfNotSet()
                        ->children()
                            ->scalarNode('title')->defaultValue('Your Test Application')->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
