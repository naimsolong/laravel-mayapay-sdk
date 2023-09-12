<?php

namespace Naimsolong\MayaPay\Datas;

use Naimsolong\MayaPay\Datas\Interfaces\ToArray;

class CaptureAmount implements ToArray
{
    public function __construct(
        protected float $amount,
        protected string $currency,
    ) {
    }

    public function toArray()
    {
        $data = [
            'amount' => $this->amount,
            'currency' => $this->currency,
        ];

        return array_filter($data);
    }
}
