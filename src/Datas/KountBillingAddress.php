<?php

namespace Naimsolong\MayaPay\Datas;

use Naimsolong\MayaPay\Datas\Interfaces\ToArray;

class KountBillingAddress implements ToArray
{
    public function __construct(
        protected string $countryCode,
        protected ?string $line1 = null,
        protected ?string $line2 = null,
        protected ?string $city = null,
        protected ?string $state = null,
        protected ?string $zipCode = null,
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

        return array_filter($data);
    }
}
