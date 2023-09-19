# MayaPay SDK for Laravel Framework

[![Latest Version on Packagist](https://img.shields.io/packagist/v/naimsolong/laravel-mayapay-sdk.svg?style=flat-square)](https://packagist.org/packages/naimsolong/laravel-mayapay-sdk)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/naimsolong/laravel-mayapay-sdk/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/naimsolong/laravel-mayapay-sdk/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/naimsolong/laravel-mayapay-sdk/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/naimsolong/laravel-mayapay-sdk/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/naimsolong/laravel-mayapay-sdk.svg?style=flat-square)](https://packagist.org/packages/naimsolong/laravel-mayapay-sdk)

This package is build on top of [Saloon](https://github.com/saloonphp/saloon) by [Sammyjo20](https://github.com/Sammyjo20) and using [Package Skeleton](https://github.com/spatie/package-skeleton-laravel) by [Spatie](https://github.com/spatie)

## Support us

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require naimsolong/laravel-mayapay-sdk
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="mayapay-sdk-config"
```

This is the contents of the published config file:

```php
return [
    'key' => [
        'public' => env('MAYAPAY_PUBLIC_KEY', ''),
        'secret' => env('MAYAPAY_SECRET_KEY', ''),
    ],

    'hostname' => [
        'sandbox' => env('MAYAPAY_SANDBOX_HOSTNAME', 'https://pg-sandbox.paymaya.com'),
        'production' => env('MAYAPAY_PRODUCTION_HOSTNAME', 'https://pg.maya.ph'),
    ],

    'production_ready' => false,
];
```

## Usage

You may refer to this [documentation](https://naimsolong.gitbook.io/laravel-mayapay-sdk/).

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Amirul](https://github.com/naimsolong)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
