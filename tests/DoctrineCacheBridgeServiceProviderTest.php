<?php

namespace TheCodingMachine;

use Doctrine\Common\Cache\Cache;
use Doctrine\Common\Cache\CacheProvider;
use Simplex\Container;

class DoctrineCacheBridgeServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testProvider()
    {
        $simplex = new Container();
        $simplex->register(new StashServiceProvider());
        $simplex->register(new DoctrineCacheBridgeServiceProvider());

        $provider = $simplex->get(CacheProvider::class);
        $this->assertInstanceOf(CacheProvider::class, $provider);

        $provider = $simplex->get(Cache::class);
        $this->assertInstanceOf(CacheProvider::class, $provider);
    }
}
