<?php

namespace Naimsolong\MayaPay;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Naimsolong\MayaPay\Commands\MayaPayCommand;

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
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-mayapay-sdk_table')
            ->hasCommand(MayaPayCommand::class);
    }
}
