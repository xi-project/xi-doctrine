# Xi Doctrine

A set of utility classes for integration with Doctrine. This package is part of
the Xi project.

If you want to use xi-doctrine, make it a submodule of your project and arrange for its `library/` to be on your include path.

If you want to develop xi-doctrine, then clone it and install dependencies with Composer.

[![Build Status](https://secure.travis-ci.org/xi-project/xi-doctrine.png?branch=master)](http://travis-ci.org/xi-project/xi-doctrine)


Zend FirePHP logger
-------------------

Using the Zend FirePHP logger requires

* Zend Framework's Zend_Wildfire_Plugin_FirePhp component and all of it's dependencies.
* Firebug FirePHP plugin (http://www.firephp.org)

After installing the dependencies using the Zend FirePHP logger is easy. Just
set the Zend FirePHP logger as a Doctrine SQL logger.

```php
<?php

use Xi\Doctrine\DBAL\Logging\ZendFirePhpLogger;

/** @var $config Doctrine\ORM\Configuration */
$config->setSQLLogger(new ZendFirePhpLogger());
```

Done! Your Firebug console should now log SQL queries ran by Doctrine.
