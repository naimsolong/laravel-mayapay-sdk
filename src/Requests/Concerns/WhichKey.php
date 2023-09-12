<?php

namespace Naimsolong\MayaPay\Requests\Concerns;

trait WhichKey {
    protected $use_public_key = true;

    public function usePublicKey(): void
    {
        $this->use_public_key = true;
    }

    public function useSecretKey(): void
    {
        $this->use_public_key = false;
    }
    
    protected function defaultHeaders(): array
    {
        $type = $this->use_public_key ? 'public' : 'secret';
		
        $key = config('mayapay-sdk.key.'.$type);
        
        return [
			'authorization' => 'Basic '.base64_encode($key.":"),
        ];
    }
}