<?php

namespace Teachi\MaterialBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension,
    Symfony\Component\DependencyInjection\ContainerBuilder,
    Symfony\Component\DependencyInjection\Loader,
    Symfony\Component\Config\FileLocator;

class TeachiMaterialExtension extends Extension
{
    public function load(array $config, ContainerBuilder $container)
    {      
        $loader = new Loader\YamlFileLoader(
            $container, new FileLocator(__DIR__.'/../Resources/config')
        );
        
        $loader->load('services.yml');
    }
}