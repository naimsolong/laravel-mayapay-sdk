<?php

namespace Naimsolong\MayaPay\Datas;

use Naimsolong\MayaPay\Datas\Interfaces\ToArray;

class ItemTotalAmount implements ToArray
{
    public function __construct(
        protected float $value,
        protected ?AmountDetails $details = null,
    ) {
    }

    public function toArray()
    {
        $data = [
            'value' => $this->value,
            'details' => $this->details?->toArray(),
        ];

        return array_filter($data);
    }
}
