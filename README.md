[![Build Status](https://travis-ci.org/thecodingmachine/psr-6-doctrine-bridge-universal-module.svg?branch=1.0)](https://travis-ci.org/thecodingmachine/psr-6-doctrine-bridge-universal-module)
[![Coverage Status](https://coveralls.io/repos/thecodingmachine/psr-6-doctrine-bridge-universal-module/badge.svg?branch=1.0&service=github)](https://coveralls.io/github/thecodingmachine/psr-6-doctrine-bridge-universal-module?branch=1.0)


# PSR6 to Doctrine cache universal module

This package integrates [cache/psr-6-doctrine-bridge](https://github.com/php-cache/doctrine-bridge) (the bridge between Doctrine cache and PSR-6) in any [container-interop/service-provider](https://github.com/container-interop/service-provider) compatible framework/container.

## Installation

```
composer require thecodingmachine/psr-6-doctrine-bridge-universal-module
```

Once installed, you need to register the [`TheCodingMachine\DoctrineCacheBridgeServiceProvider`](src/DoctrineCacheBridgeServiceProvider.php) into your container.

If your container supports Puli integration, you have nothing to do. Otherwise, refer to your framework or container's documentation to learn how to register *service providers*.

## Introduction

This service provider will provide a default Doctrine cache implementation based on the already configured PSR-6 cache.

It assumes there is already a configured service providing a PSR-6 cache pool. You can install a service provider providing this service using:

 
```
composer require thecodingmachine/stash-universal-module
```

(this will install Stash and its related service-provider. Stash is a PSR-6 caching library)

### Usage

```php
use Doctrine\Common\Cache\CacheProvider;

$cachePool = $container->get(CacheProvider::class);
echo $cachePool->get('my_cached_value');
```

## Expected values / services

This *service provider* expects the following configuration / services to be available:

| Name            | Compulsory | Description                            |
|-----------------|------------|----------------------------------------|
| `CacheItemPoolInterface::class` | *yes* | A PSR-6 compatible cache pool.  |


## Provided services

This *service provider* provides the following services:

| Service name                | Description                          |
|-----------------------------|--------------------------------------|
| `Doctrine\Common\Cache\CacheProvider` | A Doctrine cache, this is actually a bridge to the PSR-6 pool.  |
| `Doctrine\Common\Cache\Cache` | An alias to the `CacheProvider`.  |

## Extended services

This *service provider* does not extend any service.
