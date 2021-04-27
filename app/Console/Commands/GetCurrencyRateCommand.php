<?php

namespace App\Console\Commands;

use App\Services\Currencies\Show\GetCurrencyRateRequest;
use App\Services\Currencies\Show\GetCurrencyRateService;
use Illuminate\Console\Command;

class GetCurrencyRateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:getrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get currency rate';
    private GetCurrencyRateService $getCurrencyRateService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(GetCurrencyRateService $getCurrencyRateService)
    {
        parent::__construct();
        $this->getCurrencyRateService = $getCurrencyRateService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $symbol = $this->ask('Enter currency symbol');

        $rate = $this->getCurrencyRateService->execute(
            new GetCurrencyRateRequest($symbol)
            );

        echo 'Current rate for ' . strtoupper($symbol) . ': '. $rate / 100000;

        return 0;
    }
}
