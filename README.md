# Filament Translate Field

[![Latest Version on Packagist](https://img.shields.io/packagist/v/codewithdennis/filament-translate-field.svg?style=flat-square)](https://packagist.org/packages/codewithdennis/filament-translate-field)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/codewithdennis/filament-translate-field/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/codewithdennis/filament-translate-field/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/codewithdennis/filament-translate-field.svg?style=flat-square)](https://packagist.org/packages/codewithdennis/filament-translate-field)

![thumbnail](https://github.com/CodeWithDennis/filament-translate-field/blob/main/thumbnail.png)

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
    ],
];
```
## Languages

You can add more languages to the "languages" array in the config file. The key should be the language code, and the value is the language name.

```php
return [
    'languages' => [
        'en' => 'English',
        'es' => 'Spanish',
    ],
];
```

You can also replace the array with an enum. For more details, visit this FilamentPHP [documentation](https://filamentphp.com/docs/3.x/support/enums) on enums.

```php
return [
    'languages' => App\Enums\Languages::class,
];
```

## Auto Detect
By default, the auto-detect feature is **enabled**. This means that the package will automatically detect the language of the text you want to translate. If you want to disable this feature, you can set the "auto_detect" key to false in the config file. When this feature is disabled a new dropdown will show with the allowed languages.

## Read Only
If you would like the user not to be able to submit the translation, you can disable the buttons by setting the **modalSubmitAction** and **modalCancelAction** to `false` just like any other action in Filament.

```php
TranslateAction::make()
    ->modalSubmitAction(false)
    ->modalCancelAction(false),
```

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
