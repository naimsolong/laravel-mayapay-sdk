<?php

namespace Naimsolong\MayaPay\Requests\PaymentTransactions;

use Naimsolong\MayaPay\Connectors\MayaPayConnector;
use Naimsolong\MayaPay\Datas\CaptureAmount;
use Naimsolong\MayaPay\Requests\Concerns\WhichKey;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Traits\Request\HasConnector;

class CaptureRequest extends Request implements HasBody
{
    use HasConnector, HasJsonBody, WhichKey;

    protected string $connector = MayaPayConnector::class;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $paymentId,
        protected CaptureAmount $captureAmount,
        protected string $requestReferenceNumber,
    ) {
        $this->useSecretKey();
    }

    public function resolveEndpoint(): string
    {
        return '/payments/v1/payments/'.$this->paymentId.'/capture';
    }

    protected function defaultBody(): array
    {
        $body = [
            'captureAmount' => $this->captureAmount->toArray(),
            'requestReferenceNumber' => $this->requestReferenceNumber,
        ];

        return array_filter($body);
    }
}
