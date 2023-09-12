<?php

namespace Naimsolong\MayaPay\Datas;

use Naimsolong\MayaPay\Datas\Interfaces\ToArray;

class Item implements ToArray
{
    public function __construct(
        protected string $name,
        protected ?int $quantity,
        protected ?string $code,
        protected ?string $description,
        protected ?ItemAmount $amount,
        protected ItemTotalAmount $totalAmount,
    ) {
    }

    public function toArray()
    {
        $data = [
            'name' => $this->name,
            'quantity' => $this->quantity,
            'code' => $this->code,
            'description' => $this->description,
            'amount' => $this->amount?->toArray(),
            'totalAmount' => $this->totalAmount,
        ];

        return array_values(array_filter(array_map('array_filter', $data)));
    }
}
