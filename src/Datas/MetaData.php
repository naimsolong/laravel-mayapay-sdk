<?php

namespace Naimsolong\MayaPay\Datas;

use Naimsolong\MayaPay\Datas\Interfaces\ToArray;

class MetaData implements ToArray
{
    public function __construct(
        protected ?string $subMerchantRequestReferenceNumber = null,
        protected ?PaymentFacilitator $pf = null,
    ) {
    }

    public function toArray()
    {
        $data = [
            'subMerchantRequestReferenceNumber' => $this->subMerchantRequestReferenceNumber,
            'pf' => $this->pf?->toArray(),
        ];

        return array_values(array_filter(array_map('array_filter', $data)));
    }
}
