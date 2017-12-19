[![Build Status](https://travis-ci.org/danielsdeboer/length-aware-string.svg?branch=master)](https://travis-ci.org/danielsdeboer/length-aware-string)
[![Latest Stable Version](https://poser.pugx.org/aviator/length-aware-string/v/stable)](https://packagist.org/packages/aviator/length-aware-string)
[![License](https://poser.pugx.org/aviator/length-aware-string/license)](https://packagist.org/packages/aviator/length-aware-string)

## Overview

LengthAwareString is a string wrapper concerned with string length. By default it truncates strings that fail validation, but can be (optionally) given a strategy object to provide different functionality. 

### Installation

Via Composer:

```
composer require aviator/length-aware-string
```

### Testing

Via Composer:

```
composer test
```

### Usage

`LengthAwareString` requires at least two parameters, a string and an integer length:

```php
$las = LengthAwareString::make('string', 5);
```

The string length is validated and handled on instantiation. If no validation strategy is provided the class will use `Truncates`, which does what it says on the tin.

You can provide an alternative strategy implementing the `StringLengthValidator` contract:

```php
$las = LengthAwareString::make('string', 5, new YourStrategy);
```

This package also provides a `Throws` strategy which throws an exception if the string is too long.

To get the result you can call `get()`:

```php
$las->get();

// 'string'
```

The class implements `__toString()` so you can treat it like a string:

```php
echo $las;

// 'string'
```

The class implements `Countable` so you can `count()` it:

```php
echo count($las);

// 6
```

## Other

### License

This package is licensed with the [MIT License (MIT)](LICENSE).

