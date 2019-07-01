[![tenolo](https://tenolo.de/themes/486/img/tenolo_werbeagentur_bochum.png)](https://tenolo.de)

[![PHP Version](https://img.shields.io/packagist/php-v/tenolo/utilities.svg)](https://packagist.org/packages/tenolo/utilities)
[![Latest Stable Version](https://img.shields.io/packagist/v/tenolo/utilities.svg?label=stable)](https://packagist.org/packages/tenolo/utilities)
[![Latest Unstable Version](https://img.shields.io/packagist/vpre/tenolo/utilities.svg?label=unstable)](https://packagist.org/packages/tenolo/utilities)
[![Total Downloads](https://img.shields.io/packagist/dt/tenolo/utilities.svg)](https://packagist.org/packages/tenolo/utilities)
[![Total Downloads](https://img.shields.io/packagist/dm/tenolo/utilities.svg)](https://packagist.org/packages/tenolo/utilities)
[![License](https://img.shields.io/packagist/l/tenolo/utilities.svg)](https://packagist.org/packages/tenolo/utilities)

# Utilities Library

A growing collection of useful helper classes for PHP.

## Install instructions

First you need to add `tenolo/utilities` to `composer.json`:

``` json
{
   "require": {
        "tenolo/utilities": "~1.0"
    }
}
```

Please note that `dev-master` latest development version. 
Of course you can also use an explicit version number, e.g., `1.0.*`.

Then use it ;)

``` php
<?php
 
namespace Some\Namespace;

use Tenolo\Utilities\Utils\StringUtil;

// index.php
$id = StringUtil::getRandomID(8);
```
