<?php

namespace Naimsolong\MayaPay\Datas;

use Naimsolong\MayaPay\Datas\Interfaces\ToArray;

class KountBilingAddress implements ToArray
{
    public function __construct(
        protected ?string $line1,
        protected ?string $line2,
        protected ?string $city,
        protected ?string $state,
        protected ?string $zipCode,
        protected string $countryCode,
    ) {
    }

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
