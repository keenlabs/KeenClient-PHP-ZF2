KeenIOModule
============

Introduction
------------

KeenIOModule is a Zend Framework 2 module that integrates with the [KeenIO client](https://github.com/keenlabs/KeenClient-PHP)

Requirements
------------
* PHP 5.3
* [Zend Framework 2](https://github.com/zendframework/zf2)
* [KeenIO PHP client](https://github.com/keenlabs/KeenClient-PHP)

Installation
------------

Add "keen-io/keen-io-zf2" to your composer.json file and update your dependencies:

```
{
    "require": {
        "keen-io/keen-io-zf2": "~1.0"
    }
}
```

Enable KeenIOModule in your `application.config.php`, then copy-paste the file `keen_io.local.php.dist` (that
you can find in the `config` folder of the module) to your `autoload` folder (don't forget to remove the .dist at
the end!).

Usage
-----

The module registers the KeenIO client to the ZF 2 service manager. You can therefore get it like
this:

```php
$keenIOClient = $serviceManager->get('KeenIO\Client\KeenIOClient');
```

For more information, please refer to the documentation of KeenIOClient to how to use it.
