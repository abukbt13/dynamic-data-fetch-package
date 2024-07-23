<?php

namespace Vendor\DynamicDataFetchPackage\Console;

use Illuminate\Console\Command;
use Vendor\DynamicDataFetchPackage\Services\DataFetchService;

class FetchDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:data {model : The name of the model to fetch data from}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch data from the specified model';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $modelName = $this->argument('model');
        $modelClass = 'App\\Models\\' . $modelName;

        /** @var DataFetchService $dataFetchService */
        $dataFetchService = app('DataFetchService');

        try {
            $data = $dataFetchService->fetchData($modelClass);

            $this->info("Data fetched successfully:");
            $this->table(array_keys($data->first()->toArray()), $data->toArray());

            return 0;
        } catch (\Exception $e) {
            $this->error($e->getMessage());
            return 1;
        }
    }
}
