<?php

namespace Naimsolong\MayaPay\Datas;

use Naimsolong\MayaPay\Datas\Interfaces\ToArray;

class KountBuyer implements ToArray
{
    public function __construct(
        protected string $firstName,
        protected string $lastName,
        protected ContactBuyer $contact,
        protected BasicBillingAddress|KountBillingAddress $billingAddress,
        protected BasicShippingAddress|KountShippingAddress $shippingAddress,
        protected ?string $middleName = null,
        protected ?string $birthday = null,
        protected ?string $customerSince = null,
        protected ?string $sex = null,
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
            'contact' => $this->contact->toArray(),
            'billingAddress' => $this->billingAddress->toArray(),
            'shippingAddress' => $this->shippingAddress->toArray(),
        ];

        return array_filter($data);
    }
}
