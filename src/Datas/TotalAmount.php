<?php

namespace Naimsolong\MayaPay\Datas;

use Naimsolong\MayaPay\Datas\Interfaces\ToArray;

class TotalAmount implements ToArray
{
    public function __construct(
        protected int $total,
        protected string $currency,
    ) {
    }

    public function toArray()
    {
        return [
            'total' => $this->total,
            'currency' => $this->currency,
        ];
    }
}
