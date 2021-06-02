<?php

namespace Vdm\Bundle\VersionBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Vdm\Bundle\VersionBundle\Services\VersionRegistry;

/**
 * VdmVersionExtension
 */
class VdmVersionExtension extends ConfigurableExtension
{
    /**
     * {@inheritdoc}
     */
    protected function loadInternal(array $mergedConfig, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );
        $loader->load('services.yml');

        $container->setParameter('vdm_version.secret', $mergedConfig['secret']);
        $container->setParameter('vdm_version.path', $mergedConfig['path']);

        // Version registry
        $registryDefinition = $container->getDefinition(VersionRegistry::class);
        $registryDefinition->setArguments([
            $mergedConfig['versions']
        ]);
    }
}
