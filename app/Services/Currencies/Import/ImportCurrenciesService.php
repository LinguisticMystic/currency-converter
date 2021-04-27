<?php

namespace App\Services\Currencies\Import;

use App\Models\Currency;

class ImportCurrenciesService
{
    public function execute(): void
    {
        $xmlString = file_get_contents('https://www.bank.lv/vk/ecb.xml');
        $xmlObject = simplexml_load_string($xmlString);

        $json = json_encode($xmlObject);
        $phpArray = json_decode($json, true);

        foreach ($phpArray['Currencies']['Currency'] as $currency) {

            $symbol = $currency['ID'];
            $rate = (float)$currency['Rate'] * 100000;

            Currency::updateOrCreate(
                ['symbol' => $symbol],
                ['rate' => (int)$rate]);
        }
    }
}
