<?php


namespace Snide\Bundle\DocumentorBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;


/**
 * Class Configuration
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class Configuration implements ConfigurationInterface
{

    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $treeBuilder->root('snide_documentor')
            ->children()
                ->scalarNode('dest_dir')
                    ->isRequired()
                ->end()
                ->scalarNode('build_dir')
                    ->isRequired()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
