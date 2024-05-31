# CreditCardPattern (PHP)

[![PHP Compatibilty (ˆ7.4)](https://github.com/eudiegoborgs/credit-card-pattern/actions/workflows/versions-test.yml/badge.svg)](https://github.com/eudiegoborgs/credit-card-pattern/actions/workflows/versions-test.yml)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/eudiegoborgs/credit-card-pattern/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/eudiegoborgs/credit-card-pattern/?branch=main)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/eudiegoborgs/credit-card-pattern/badges/code-intelligence.svg?b=main)](https://scrutinizer-ci.com/code-intelligence)
[![Total Downloads](https://img.shields.io/packagist/dt/eudiegoborgs/credit-card-pattern.svg)](https://packagist.org/packages/diegoborgs/credit-card-pattern)
[![Latest Stable Version](https://poser.pugx.org/eudiegoborgs/credit-card-pattern/v/stable)](https://packagist.org/packages/diegoborgs/credit-card-pattern)

The CreditCardPattern is a implementation of patterns to correctly handle credit card data, this is based on https://diegoborgs.com.br/blog/credit-card-pattern-como-tratar-dados-de-cart%C3%A3o-de-cr%C3%A9dito-via-c%C3%B3digo


## How to use

#### Install with composer

```sh
composer require eudiegoborgs/credit-card-pattern
```

#### Add to your code

```php
use EuDiegoBorgs\CreditCardPattern\Type\CreditCard;

$creditCard = new CreditCard('Sherlock Holmes', '02/2099', '123', '0123456789012345');

echo $creditCard->isExpired(); // false
echo (string) $creditCard->getBin(); // 012345
echo (string) $creditCard->getLastFour(); // 2345
var_dump($creditCard->toArray()); 
/**
 * Prints this data
 * [
 *      'holderName' => 'Sherlock Holmes',
 *      'validThru' => '02/2099',
 *      'cvv' => '123',
 *      'number' => '0123456789012345',
 *      'bin' => '012345',
 *      'lastFour' => '2345',
 *  ]
```

## Contributing

Fork the project and send your PR.

## Running the Tests

Install the [Composer](http://getcomposer.org/) dependencies:

```
git clone https://github.com/eudiegoborgs/credit-card-pattern.git
cd credit-card-pattern
```

Then run the test suite:

```
composer test
```

## License

This bundle is released under the MIT license.
