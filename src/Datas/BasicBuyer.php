<?php

namespace Naimsolong\MayaPay\Datas;

use Naimsolong\MayaPay\Datas\Interfaces\ToArray;

class BasicBuyer implements ToArray
{
    public function __construct(
        protected null|string $firstName = null,
        protected null|string $middleName = null,
        protected null|string $lastName = null,
        protected null|string $birthday = null,
        protected null|string $customerSince = null,
        protected null|string $sex = null,
        protected null|ContactBuyer $contact = null,
        protected null|BasicBillingAddress|KountBillingAddress $billingAddress = null,
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
        
        return array_filter($data);
    }
}
