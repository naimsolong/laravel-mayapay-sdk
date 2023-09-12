<?php

namespace Naimsolong\MayaPay\Commands;

use Illuminate\Console\Command;

class MayaPayCommand extends Command
{
    public $signature = 'laravel-mayapay-sdk';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
