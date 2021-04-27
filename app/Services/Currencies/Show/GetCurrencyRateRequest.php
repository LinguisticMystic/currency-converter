<?php

namespace App\Services\Currencies\Show;

class GetCurrencyRateRequest
{
    private string $symbol;

    public function __construct(string $symbol)
    {
        $this->symbol = $symbol;
    }

    public function symbol(): string
    {
        return $this->symbol;
    }
}
