<?php

namespace Naimsolong\MayaPay\Datas;

use Naimsolong\MayaPay\Datas\Interfaces\ToArray;

class PaymentFacilitator implements ToArray {
    public function __construct(
        protected string $smi,
        protected string $smn,
        protected string $mci,
        protected string $mpc,
        protected string $mco,
        protected null|string $mst = null,
        protected null|string $postalCode = null,
        protected null|string $contactNo = null,
        protected null|string $state = null,
        protected null|string $addressLine1 = null,
    ){}

    public function toArray()
    {
        $data = [
            'smi' => $this->smi,
            'smn' => $this->smn,
            'mci' => $this->mci,
            'mpc' => $this->mpc,
            'mpc' => $this->mco,
            'mst' => $this->mst,
            'postalCode' => $this->postalCode,
            'contactNo' => $this->contactNo,
            'state' => $this->state,
            'addressLine1' => $this->addressLine1,
        ];
        
        return array_values(array_filter(array_map('array_filter', $data)));
    }
}