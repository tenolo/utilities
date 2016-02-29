Tenolo - Util Library
=======================

Install instructions
--------------------------------

First you need to add `tenolo/util-library` to `composer.json`:

``` json
{
   "require": {
        "tenolo/util-library`": "~1.0"
    }
}
```

Please note that `dev-master` points to the latest release. If you want to use the latest development version please use `dev-develop`. Of course you can also use an explicit version number, e.g., `1.0.*`.

Then use it ;)

``` php
<?php
 
namespace Some/Namespace;

use Tenolo\Utils\StringUtil;

// index.php
$id = StringUtil::getRandomID(8);
```
