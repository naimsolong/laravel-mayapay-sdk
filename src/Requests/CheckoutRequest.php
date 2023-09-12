<?php

namespace Naimsolong\MayaPay\Requests;

use Naimsolong\MayaPay\Connectors\MayaPayConnector;
use Naimsolong\MayaPay\Datas\BasicBuyer;
use Naimsolong\MayaPay\Datas\Items;
use Naimsolong\MayaPay\Datas\KountBuyer;
use Naimsolong\MayaPay\Datas\MetaData;
use Naimsolong\MayaPay\Datas\RedirectUrl;
use Naimsolong\MayaPay\Datas\TotalAmount;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Traits\Request\HasConnector;

class GetServersRequest extends BaseRequest implements HasBody
{
    use HasConnector, HasJsonBody;

    protected string $connector = MayaPayConnector::class;

    protected Method $method = Method::GET;

    public function __construct(
        protected $use_public_key = true,
        
        protected TotalAmount $totalAmount,
        protected null|BasicBuyer|KountBuyer $buyer = null,
        protected null|Items $items = null,
        protected null|RedirectUrl $redirectUrl = null,
        protected string $requestReferenceNumber,
        protected null|MetaData $metaData = null,
    ){}

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

        return array_values(array_filter(array_map('array_filter', $body)));
    }
}