<?php

namespace Naimsolong\MayaPay\Datas;

use Naimsolong\MayaPay\Datas\Interfaces\ToArray;

class TotalAmount implements ToArray
{
    public function __construct(
        protected int $value,
        protected string $currency,
    ) {
    }

    public function toArray()
    {
        return [
            'value' => $this->value,
            'currency' => $this->currency,
        ];
    }
}
