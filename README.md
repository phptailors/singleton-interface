[![PHPUnit](https://github.com/phptailors/singleton-interface/actions/workflows/phpunit.yml/badge.svg)](https://github.com/phptailors/singleton-interface/actions/workflows/phpunit.yml)
[![Composer Require Checker](https://github.com/phptailors/singleton-interface/actions/workflows/composer-require-checker.yml/badge.svg)](https://github.com/phptailors/singleton-interface/actions/workflows/composer-require-checker.yml)
[![BC Check](https://github.com/phptailors/singleton-interface/actions/workflows/backward-compatibility-check.yml/badge.svg)](https://github.com/phptailors/singleton-interface/actions/workflows/backward-compatibility-check.yml)
[![Psalm](https://github.com/phptailors/singleton-interface/actions/workflows/psalm.yml/badge.svg)](https://github.com/phptailors/singleton-interface/actions/workflows/psalm.yml)
[![PHP CS Fixer](https://github.com/phptailors/singleton-interface/actions/workflows/php-cs-fixer.yml/badge.svg)](https://github.com/phptailors/singleton-interface/actions/workflows/php-cs-fixer.yml)

phptailors/singleton-interface
==============================

A PHP Interface for [Singletons][singleton-design-pattern].
See [SingletonInterface][SingletonInterface].

## Installation

```bash
composer require --dev "phptailors/singleton-interface:^1.0"
composer require --dev "phpunit/phpunit"
```


## Usage

A minimal implementation (example):

```php
<?php

use Tailors\Lib\Singleton\SingletonInterface;
use Tailors\Lib\Singleton\SingletonException;

final class MySingleton implements SingletonInterface
{
    private static ?MySingleton $instance = null;

    public static function getInstance(): MySingleton
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {}

    private function __clone() {}

    public function __wakeup()
    {
        throw new SingletonException('Cannot unserialize singleton '.self::class);
    }
}
```


## Expected features of a Singleton

A real Singleton in PHP:

1. Should NOT be extendable (should be ``final``).
2. Should have a private constructor ([__construct()][__construct]).
3. Its ``getInstance()`` should return a single instance of its class.
4. Should NOT be cloneable ([__clone()][__clone] should be a private method).
5. Should always throw [Tailors\Lib\Singleton\SingletonException][SingletonException] on [unserialize()][unserialize] (from [__wakeup()][__wakeup]).


### Testing Singleton behavior

The behavior of a Singleton may be tested using [phptailors/singleton-testing][singleton-testing].


[singleton-design-pattern]: <https://refactoring.guru/design-patterns/singleton/>
[singleton-interface]: <https://packagist.org/packages/phptailors/singleton-interface>
[singleton-testing]: <https://packagist.org/packages/phptailors/singleton-testing>
[SingletonInterface]: <https://github.com/phptailors/singleton-interface/blob/master/src/SingletonInterface.php>
[SingletonException]: <https://github.com/phptailors/singleton-interface/blob/master/src/SingletonException.php>
[unserialize]: <https://www.php.net/manual/en/function.unserialize.php>
[__clone]: <https://www.php.net/manual/en/language.oop5.cloning.php#object.clone>
[__wakeup]: <https://www.php.net/manual/en/language.oop5.magic.php#object.wakeup>
[__construct]: <https://www.php.net/manual/en/language.oop5.decon.php#object.construct>
