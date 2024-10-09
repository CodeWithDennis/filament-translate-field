# Filament Translate Field

[![Latest Version on Packagist](https://img.shields.io/packagist/v/codewithdennis/filament-translate-field.svg?style=flat-square)](https://packagist.org/packages/codewithdennis/filament-translate-field)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/codewithdennis/filament-translate-field/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/codewithdennis/filament-translate-field/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/codewithdennis/filament-translate-field.svg?style=flat-square)](https://packagist.org/packages/codewithdennis/filament-translate-field)

![thumbnail.png](https://raw.githubusercontent.com/CodeWithDennis/filament-translate-field/refs/heads/main/thumbnail.png)

This package allows you to quickly translate form field values, like converting a description from German to English, with just one click. It's an efficient solution for instantly translating content in your forms.

## Installation

This package uses the Google Translate PHP library, make sure you have it installed before using this package.

```bash
composer require stichoza/google-translate-php
```

You can install the package via composer:

```bash
composer require codewithdennis/filament-translate-field
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-translate-field-config"
```

This is the contents of the published config file:

```php
return [
    'auto_detect' => true,
    'languages' => [
        'en' => 'English',
//        'es' => 'Spanish',
//        'fr' => 'French',
//        'de' => 'German',
//        'it' => 'Italian',
//        'nl' => 'Dutch',
    ],
];
```

You can add more languages to the "languages" array in the config file. The key should be the language code, and the value is the language name. You can also use the "auto_detect" option to automatically identify the language of the input text. If you prefer, you can replace the array with an enum instead.

## Usage

```php
use CodeWithDennis\FilamentTranslateField\Filament\Forms\Actions\TranslateAction;

Forms\Components\Textarea::make('description')
    ->hintAction(TranslateAction::make())
    ->columnSpanFull()
    ->rows(3),
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
