<?php

namespace Naimsolong\MayaPay\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Naimsolong\MayaPay\MayaPay
 */
class MayaPay extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Naimsolong\MayaPay\MayaPay::class;
    }
}
