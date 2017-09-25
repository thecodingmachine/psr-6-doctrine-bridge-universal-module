<?php

namespace TheCodingMachine;

use Cache\Bridge\DoctrineCacheBridge;
use Doctrine\Common\Cache\Cache;
use Doctrine\Common\Cache\CacheProvider;
use Interop\Container\ContainerInterface;
use Interop\Container\Factories\Alias;
use Interop\Container\ServiceProviderInterface;
use Psr\Cache\CacheItemPoolInterface;

class DoctrineCacheBridgeServiceProvider implements ServiceProviderInterface
{
    public function getFactories()
    {
        return [
            CacheProvider::class => [self::class,'createCacheProvider'],
            Cache::class => new Alias(CacheProvider::class),
        ];
    }

    public static function createCacheProvider(ContainerInterface $container) : CacheProvider
    {
        return new DoctrineCacheBridge($container->get(CacheItemPoolInterface::class));
    }

    public function getExtensions()
    {
        return [];
    }
}
