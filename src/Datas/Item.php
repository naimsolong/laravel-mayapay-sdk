<?php

namespace Naimsolong\MayaPay\Datas;

use Naimsolong\MayaPay\Datas\Interfaces\ToArray;

class Item implements ToArray
{
    public function __construct(
        protected string $name,
        protected ItemTotalAmount $totalAmount,
        protected ?int $quantity = null,
        protected ?string $code = null,
        protected ?string $description = null,
        protected ?ItemAmount $amount = null,
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
            'totalAmount' => $this->totalAmount->toArray(),
        ];

        return array_filter($data);
    }
}
