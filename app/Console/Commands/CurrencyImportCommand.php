<?php

namespace App\Console\Commands;

use App\Services\Currencies\Import\ImportCurrenciesService;
use Illuminate\Console\Command;

class CurrencyImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import currencies from Bank of Latvia';
    private ImportCurrenciesService $service;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ImportCurrenciesService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->service->execute();

        return 0;
    }
}
