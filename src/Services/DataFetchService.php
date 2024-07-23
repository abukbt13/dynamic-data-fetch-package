<?php

namespace Vendor\DynamicDataFetchPackage\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class DataFetchService
{
    /**
     * Fetch data from the specified model.
     *
     * @param string $modelClass
     * @return Collection
     * @throws \Exception
     */
    public function fetchData(string $modelClass): Collection
    {
        if (!class_exists($modelClass)) {
            throw new \Exception("Model {$modelClass} does not exist.");
        }

        $model = new $modelClass();

        if (!$model instanceof Model) {
            throw new \Exception("{$modelClass} is not an instance of Illuminate\\Database\\Eloquent\\Model.");
        }

        return $model::all();
    }
}
