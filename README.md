# Wrapper for Google Books API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rksugarfree/gbooks.svg?style=flat-square)](https://packagist.org/packages/rksugarfree/gbooks)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/rksugarfree/gbooks/run-tests?label=tests)](https://github.com/rksugarfree/gbooks/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/rksugarfree/gbooks.svg?style=flat-square)](https://packagist.org/packages/rksugarfree/gbooks)

## Installation

You can install the package via composer:

```bash
composer require rksugarfree/gbooks
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Rksugarfree\Gbooks\GbooksServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [

];
```

## Usage

``` php
$gbooks = new Rksugarfree\Gbooks();
echo $gbooks->echoPhrase('Hello, Rksugarfree!');
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Robert Kerr](https://github.com/robkerr1992)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
