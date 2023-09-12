<?php

namespace Naimsolong\MayaPay\Requests\PaymentTransactions;

use Naimsolong\MayaPay\Connectors\MayaPayConnector;
use Naimsolong\MayaPay\Requests\Concerns\WhichKey;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Traits\Request\HasConnector;

class RetrieveViaIDRequest extends Request implements HasBody
{
    use HasConnector, HasJsonBody, WhichKey;

    protected string $connector = MayaPayConnector::class;

    protected Method $method = Method::GET;

    public function __construct(
        protected string $paymentId,
    ) {
        $this->useSecretKey();
    }

    public function resolveEndpoint(): string
    {
        return '/payments/v1/payments/'.$this->paymentId;
    }
}
