<?php

namespace Naimsolong\MayaPay\Datas;

use Naimsolong\MayaPay\Datas\Interfaces\ToArray;

class BasicShippingAddress implements ToArray
{
    public function __construct(
        protected ?string $line1 = null,
        protected ?string $line2 = null,
        protected ?string $city = null,
        protected ?string $state = null,
        protected ?string $zipCode = null,
        protected ?string $countryCode = null,
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
        
        return array_filter($data);
    }
}
