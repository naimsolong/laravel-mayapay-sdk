<?php

namespace Naimsolong\MayaPay\Datas;

use Naimsolong\MayaPay\Datas\Interfaces\ToArray;

class AmountDetails implements ToArray
{
    public function __construct(
        protected ?string $subtotal = null,
        protected ?string $discount = null,
        protected ?string $serviceCharge = null,
        protected ?string $shippingFee = null,
        protected ?string $tax = null,
    ) {
    }

    public function toArray()
    {
        $data = [
            'subtotal' => $this->subtotal,
            'discount' => $this->discount,
            'serviceCharge' => $this->serviceCharge,
            'shippingFee' => $this->shippingFee,
            'tax' => $this->tax,
        ];

        return array_values(array_filter(array_map('array_filter', $data)));
    }
}
