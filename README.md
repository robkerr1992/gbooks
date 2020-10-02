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
    'developer_key' => 'your google api key'
];
```

## Usage

By Volume Id
``` php
$book = Rksugarfree\Gbooks::byVolumeId($volumeId);
```

Similar results by Volume Id
``` php
$similarBooks = Rksugarfree\Gbooks::similar($volumeId);
```

Simple search
``` php
$filteredBooks = Rksugarfree\Gbooks::search('Dan Brown')->get();
```

With more advanced filters
``` php
$filteredBooks = Rksugarfree\Gbooks::search('Dan Brown')->printType('books')->limit(5)->downloadable()->get();
```

Use any chain of filters you like, ending the method chain with ->get() will execute the query.


## Available Filters

* reset(): Resets all filters.
* search($searchTerm): Searches by the given string.
* limit($int): Maximum number of results. Must be between 0 and 40.
* orderBy($orderTerm): Order results by 'newest' or 'relevance'.
* downloadable(): Only results that can be downloaded.
* bookType(): Filter by 'ebooks', 'free-books', 'full', 'paid-ebooks' or 'partial'.
* printType(): Filter by 'all', 'books' or 'magazines'.
* showPreorders(): Include results that are only preorders.
* info(): Whether each book's info should be the 'full' or 'lite' version.
* startIndex(): Which index the results returned should start at.

## Testing (Not completed)

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
