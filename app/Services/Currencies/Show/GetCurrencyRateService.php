<?php

namespace App\Services\Currencies\Show;

use App\Models\Currency;

class GetCurrencyRateService
{
    public function execute(GetCurrencyRateRequest $request): int
    {
        return Currency::findOrFail($request->symbol())['rate'];
    }
}
