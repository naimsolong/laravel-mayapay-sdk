<?php

namespace Naimsolong\MayaPay\Datas;

use Naimsolong\MayaPay\Datas\Interfaces\ToArray;

class ContactBuyer implements ToArray
{
    public function __construct(
        protected string $phone,
        protected string $email,
    ) {
    }

    public function toArray()
    {
        return [
            'phone' => $this->phone,
            'email' => $this->email,
        ];
    }
}
