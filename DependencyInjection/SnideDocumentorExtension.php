<?php

/*
 * This file is part of the SnideDocumentor bundle.
 *
 * (c) Pascal DENIS <pascal.denis.75@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Snide\Bundle\DocumentorBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class SnideDocumentorExtension
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class SnideDocumentorExtension extends Extension
{
    /**
     * Load configuration of Bundle
     *
     * @param array $configs Configuration parameters
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));

        $loader->load('handler.xml');

        $this->loadGenerator($loader, $container, $config);
        $this->loadManager($loader, $container, $config);

    }

    protected function loadGenerator(LoaderInterface $loader, ContainerBuilder $container, array $config)
    {
        $container->setParameter('snide_documentor.generator.dest_dir', $config['dest_dir']);
        $loader->load('generator.xml');
    }

    protected function loadManager(LoaderInterface $loader, ContainerBuilder $container, array $config)
    {
        $container->setParameter('snide_documentor.build_dir', $config['build_dir']);
        $loader->load('manager.xml');
    }
}
