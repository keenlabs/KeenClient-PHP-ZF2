KeenIOModule
============

KeenIOModule is a Zend Framework 2 module that integrates with
the [KeenIO client](https://github.com/keenlabs/KeenClient-PHP)

Installation
------------

To install KeenIOModule, use composer:

```sh
php composer.phar require keen-io/keen-io-zf2:~2.0
```

Enable KeenIOModule in your `application.config.php`, then copy the file
`vendor/keen-io/keen-io-zf2/config/keen_io.local.php.dist` to the
`config/autoload` directory of your application (don't forget to remove the
`.dist` extension from the file name!).

Usage
-----

This module registers the KeenIO client in your application's service manager.
You can get it by requesting the service `KeenIO\Client\KeenIOClient`:

```php
$keenIOClient = $serviceManager->get('KeenIO\Client\KeenIOClient');
```

For more information on the usage of `KeenIO`, please refer to the [documentation of the PHP client](https://github.com/keenlabs/KeenClient-PHP) and the
main [keen.io documentation](https://keen.io/docs/).
