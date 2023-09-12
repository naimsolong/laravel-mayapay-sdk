<?php

namespace Naimsolong\MayaPay\Datas;

use Naimsolong\MayaPay\Datas\Interfaces\ToArray;

class ItemAmount implements ToArray {
    public function __construct(
        protected float $value,
        protected null|AmountDetails $details = null,
    ){}

    public function toArray()
    {
        $data = [
            'value' => $this->value,
            'details' => $this->details?->toArray(),
        ];
        
        return array_values(array_filter(array_map('array_filter', $data)));
    }
}