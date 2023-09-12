<?php

namespace Naimsolong\MayaPay\Requests;

use Saloon\Http\Request;

class BaseRequest extends Request
{
    public function __construct(
        protected $use_public_key = true
    ){}
    
    protected function defaultHeaders(): array
    {
		$key = config('mayapay-sdk.key.'. $this->use_public_key ? 'public' : 'secret');

        return [
			'authorization' => 'Basic '.base64_encode($key.":"),
        ];
    }
}