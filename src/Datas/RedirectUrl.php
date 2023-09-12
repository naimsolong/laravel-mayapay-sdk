<?php

namespace Naimsolong\MayaPay\Datas;

use Naimsolong\MayaPay\Datas\Interfaces\ToArray;

class RedirectUrl implements ToArray {
    public function __construct(
        protected string $success,
        protected string $failure,
        protected string $cancel,
    ){}

    public function toArray()
    {
        return [
            'success' => $this->success,
            'failure' => $this->failure,
            'cancel' => $this->cancel,
        ];
    }
}