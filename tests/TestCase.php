<?php

namespace Naimsolong\MayaPay\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Naimsolong\MayaPay\MayaPayServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Naimsolong\\MayaPay\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            MayaPayServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
        config()->set('mayapay-sdk.key.public', 'pk-Z0OSzLvIcOI2UIvDhdTGVVfRSSeiGStnceqwUE7n0Ah');
        config()->set('mayapay-sdk.key.secret', 'sk-X8qolYjy62kIzEbr0QRK1h4b4KDVHaNcwMYk39jInSl');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-mayapay-sdk_table.php.stub';
        $migration->up();
        */
    }
}
