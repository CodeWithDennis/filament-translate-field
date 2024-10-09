# A plugin that lets you translate input of any field to another language.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/codewithdennis/filament-translate-field.svg?style=flat-square)](https://packagist.org/packages/codewithdennis/filament-translate-field)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/codewithdennis/filament-translate-field/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/codewithdennis/filament-translate-field/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/codewithdennis/filament-translate-field/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/codewithdennis/filament-translate-field/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/codewithdennis/filament-translate-field.svg?style=flat-square)](https://packagist.org/packages/codewithdennis/filament-translate-field)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require codewithdennis/filament-translate-field
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-translate-field-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-translate-field-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-translate-field-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filamentTranslateField = new CodeWithDennis\FilamentTranslateField();
echo $filamentTranslateField->echoPhrase('Hello, CodeWithDennis!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [CodeWithDennis](https://github.com/CodeWithDennis)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
