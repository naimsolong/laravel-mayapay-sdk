<?php

namespace Naimsolong\MayaPay\Datas;

use Naimsolong\MayaPay\Datas\Interfaces\ToArray;

class BasicShippingAddress implements ToArray {
    public function __construct(
        protected null|string $line1 = null,
        protected null|string $line2 = null,
        protected null|string $city = null,
        protected null|string $state = null,
        protected null|string $zipCode = null,
        protected null|string $countryCode = null,
        protected null|string $firstName = null,
        protected null|string $middleName = null,
        protected null|string $lastName = null,
        protected null|string $phone = null,
        protected null|string $email = null,
        protected null|string $shippingType = null,
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