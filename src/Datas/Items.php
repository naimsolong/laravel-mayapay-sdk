<?php

namespace Naimsolong\MayaPay\Datas;

use Naimsolong\MayaPay\Datas\Interfaces\ToArray;

class Items implements ToArray
{
    public function __construct(
        protected array $items,
    ) {
    }

    public function toArray()
    {
        $data = [];

        foreach($this->items as $item)
            array_push($data, $item->toArray());
        
        return $data;
    }
}
