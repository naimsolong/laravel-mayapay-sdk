<?php

namespace Naimsolong\MayaPay\Datas;

use Naimsolong\MayaPay\Datas\Interfaces\ToArray;

class KountBuyer implements ToArray
{
    public function __construct(
        protected string $firstName,
        protected ?string $middleName,
        protected string $lastName,
        protected ?string $birthday,
        protected ?string $customerSince,
        protected ?string $sex,
        protected ContactBuyer $contact,
        protected BasicBilingAddress|KountBilingAddress $billingAddress,
        protected BasicShippingAddress|KountShippingAddress $shippingAddress,
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
