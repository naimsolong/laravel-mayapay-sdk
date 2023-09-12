<?php

namespace Naimsolong\MayaPay\Datas;

use Naimsolong\MayaPay\Datas\Interfaces\ToArray;

class BasicBilingAddress implements ToArray {
    public function __construct(
        protected null|string $line1 = null,
        protected null|string $line2 = null,
        protected null|string $city = null,
        protected null|string $state = null,
        protected null|string $zipCode = null,
        protected null|string $countryCode = null,
    ){}

    public function toArray()
    {
        $data = [
            'line1' => $this->line1,
            'line2' => $this->line2,
            'city' => $this->city,
            'state' => $this->state,
            'zipCode' => $this->zipCode,
            'countryCode' => $this->countryCode,
        ];
        
        return array_values(array_filter(array_map('array_filter', $data)));
    }
}