<?php

namespace Naimsolong\MayaPay\Datas;

use Naimsolong\MayaPay\Datas\Interfaces\ToArray;

class KountShippingAddress implements ToArray
{
    public function __construct(
        protected ?string $line1,
        protected ?string $line2,
        protected ?string $city,
        protected ?string $state,
        protected ?string $zipCode,
        protected string $countryCode,
        protected ?string $firstName = null,
        protected ?string $middleName = null,
        protected ?string $lastName = null,
        protected ?string $phone = null,
        protected ?string $email = null,
        protected ?string $shippingType = null,
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
            'firstName' => $this->firstName,
            'middleName' => $this->middleName,
            'lastName' => $this->lastName,
            'phone' => $this->phone,
            'email' => $this->email,
            'shippingType' => $this->shippingType,
        ];

        return array_values(array_filter(array_map('array_filter', $data)));
    }
}
