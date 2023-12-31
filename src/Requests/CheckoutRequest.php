<?php

namespace Naimsolong\MayaPay\Requests;

use Naimsolong\MayaPay\Connectors\MayaPayConnector;
use Naimsolong\MayaPay\Datas\BasicBuyer;
use Naimsolong\MayaPay\Datas\Items;
use Naimsolong\MayaPay\Datas\KountBuyer;
use Naimsolong\MayaPay\Datas\MetaData;
use Naimsolong\MayaPay\Datas\RedirectUrl;
use Naimsolong\MayaPay\Datas\TotalAmount;
use Naimsolong\MayaPay\Requests\Concerns\WhichKey;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Traits\Request\HasConnector;

class CheckoutRequest extends Request implements HasBody
{
    use HasConnector, HasJsonBody, WhichKey;

    protected string $connector = MayaPayConnector::class;

    protected Method $method = Method::POST;

    public function __construct(
        protected TotalAmount $totalAmount,
        protected string $requestReferenceNumber,
        protected null|BasicBuyer|KountBuyer $buyer = null,
        protected ?Items $items = null,
        protected ?RedirectUrl $redirectUrl = null,
        protected ?MetaData $metaData = null,
    ) {
        $this->usePublicKey();
    }

    public function resolveEndpoint(): string
    {
        return '/checkout/v1/checkouts';
    }

    protected function defaultBody(): array
    {
        $body = [
            'totalAmount' => $this->totalAmount->toArray(),
            'buyer' => $this->buyer?->toArray(),
            'items' => $this->items?->toArray(),
            'redirectUrl' => $this->redirectUrl?->toArray(),
            'requestReferenceNumber' => $this->requestReferenceNumber,
            'metaData' => $this->metaData?->toArray(),
        ];

        return array_filter($body);
    }
}
