# ReactPHP cache that sends read and write calls to difference wrapped caches

[![Build Status](https://travis-ci.org/WyriHaximus/reactphp-cache-read-write.svg?branch=master)](https://travis-ci.org/WyriHaximus/reactphp-cache-read-write)
[![Latest Stable Version](https://poser.pugx.org/WyriHaximus/react-cache-read-write/v/stable.png)](https://packagist.org/packages/WyriHaximus/react-cache-read-write)
[![Total Downloads](https://poser.pugx.org/WyriHaximus/react-cache-read-write/downloads.png)](https://packagist.org/packages/WyriHaximus/react-cache-read-write)
[![Code Coverage](https://scrutinizer-ci.com/g/WyriHaximus/reactphp-cache-read-write/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/WyriHaximus/reactphp-cache-read-write/?branch=master)
[![License](https://poser.pugx.org/WyriHaximus/react-cache-read-write/license.png)](https://packagist.org/packages/WyriHaximus/react-cache-read-write)
[![PHP 7 ready](http://php7ready.timesplinter.ch/WyriHaximus/reactphp-cache-read-write/badge.svg)](https://travis-ci.org/WyriHaximus/reactphp-cache-read-write)

# Installation

To install via [Composer](http://getcomposer.org/), use the command below, it will automatically detect the latest version and bind it with `^`.

```
composer require wyrihaximus/react-cache-read-write
```

# Usage

```php
<?php

$readCache = new Cache(); // The following calls our routed to this cache: get, getMultiple, has
$writeCache = new Cache(); // The following calls our routed to this cache: set, setMultiple, delete, deleteMultiple, clear
$readWrite = new ReadWrite($readCache, $writeCache);
```

# License

The MIT License (MIT)

Copyright (c) 2020 Cees-Jan Kiewiet

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
