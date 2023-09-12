<?php

namespace Naimsolong\MayaPay\Connectors;

use Saloon\Http\Connector;

class MayaPayConnector extends Connector
{
    public function resolveBaseUrl(): string
    {
        return config('mayapay-sdk.production_ready') ? config('mayapay-sdk.hostname.production') : config('mayapay-sdk.hostname.sandbox');
    }

    protected function defaultHeaders(): array
    {
        return [
            'accept' => 'application/json',
            'content-type' => 'application/json',
        ];
    }
}
