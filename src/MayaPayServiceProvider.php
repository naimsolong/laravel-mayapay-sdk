<?php

namespace Naimsolong\MayaPay;

use Naimsolong\MayaPay\Commands\MayaPayCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MayaPayServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-mayapay-sdk')
            ->hasConfigFile();
    }
}
