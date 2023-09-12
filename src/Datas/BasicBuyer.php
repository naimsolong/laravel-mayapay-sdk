<?php

namespace Naimsolong\MayaPay\Datas;

use Naimsolong\MayaPay\Datas\Interfaces\ToArray;

class BasicBuyer implements ToArray
{
    public function __construct(
        protected ?string $firstName = null,
        protected ?string $middleName = null,
        protected ?string $lastName = null,
        protected ?string $birthday = null,
        protected ?string $customerSince = null,
        protected ?string $sex = null,
        protected ?ContactBuyer $contact = null,
        protected null|BasicBilingAddress|KountBilingAddress $billingAddress = null,
        protected null|BasicShippingAddress|KountShippingAddress $shippingAddress = null,
    ) {
    }

    public function toArray()
    {
        $data = [
            'firstName' => $this->firstName,
            'middleName' => $this->middleName,
            'lastName' => $this->lastName,
            'birthday' => $this->birthday,
            'customerSince' => $this->customerSince,
            'sex' => $this->sex,
            'contact' => $this->contact?->toArray(),
            'billingAddress' => $this->billingAddress?->toArray(),
            'shippingAddress' => $this->shippingAddress?->toArray(),
        ];

        return array_values(array_filter(array_map('array_filter', $data)));
    }
}
