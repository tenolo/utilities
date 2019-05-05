<p align="center"><img src="https://tenolo.de/themes/486/img/tenolo_werbeagentur_bochum.png"></p>

<p align="center">
<a href="https://packagist.org/packages/tenolo/utilities"><img src="https://img.shields.io/packagist/php-v/tenolo/utilities.svg" alt="PHP Version"></a>
<a href="https://packagist.org/packages/tenolo/utilities"><img src="https://poser.pugx.org/tenolo/utilities/downloads.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/tenolo/utilities"><img src="https://poser.pugx.org/tenolo/utilities/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/tenolo/utilities"><img src="https://poser.pugx.org/tenolo/utilities/v/unstable.svg" alt="Latest Unstable Version"></a>
<a href="https://packagist.org/packages/tenolo/utilities"><img src="https://poser.pugx.org/tenolo/utilities/license.svg" alt="License"></a>
</p>

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
 
namespace Some/Namespace;

use Tenolo\Utilities\Utils\StringUtil;

// index.php
$id = StringUtil::getRandomID(8);
```
