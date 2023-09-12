<?php

namespace Naimsolong\MayaPay\Datas;

use Naimsolong\MayaPay\Datas\Interfaces\ToArray;

class AmountDetails implements ToArray {
    public function __construct(
        protected null|string $subtotal = null,
        protected null|string $discount = null,
        protected null|string $serviceCharge = null,
        protected null|string $shippingFee = null,
        protected null|string $tax = null,
    ){}

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