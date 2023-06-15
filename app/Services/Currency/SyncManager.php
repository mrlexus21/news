<?php

namespace App\Services\Currency;

use App\Services\Currency\Interfaces\CurrencyDataManagerInterface;
use Exception;
use Illuminate\Support\Collection;
use Log;
use Throwable;

class SyncManager
{
    /**
     * @throws Exception
     */
    public function handle($baseCurrency = null, $force = false, bool $showResult = false): bool
    {
        try {
            $currencyDataCollection = $this->getCurrencyDtoCollection($baseCurrency);
            $result = (new CurrencySyncService($currencyDataCollection))->sync($force);
            $this->toLog($result, $showResult);
        } catch (Throwable) {
            echo 'Error from sync service, please contact with administrator'  . PHP_EOL;
        }

        return true;
    }

    /**
     * @param $baseCurrency
     * @return Collection
     * @throws Throwable
     */
    protected function getCurrencyDtoCollection($baseCurrency): Collection
    {
        $currencyDataManager = $this->getDataManagerFromConfig();

        return $currencyDataManager->getCurrencyDto($baseCurrency);
    }

    /**
     * @return CurrencyDataManagerInterface
     * @throws Throwable
     */
    protected function getDataManagerFromConfig(): CurrencyDataManagerInterface
    {
        $dataManagerName = config('currency.default') . 'DataManager';
        $dataManageClass = __NAMESPACE__ . '\\DataManagers\\' . ucwords($dataManagerName);

        throw_if(!class_exists($dataManageClass), Exception::class,
            "Service manager [{$dataManageClass}] not found");

        return new $dataManageClass;
    }

    /**
     * @param $result
     * @param bool $showResult
     * @return void
     */
    protected function toLog($result, bool $showResult): void
    {
        $message = !empty($result)
            ? 'Currency updated successful, result: ' . implode_r_key(', ', $result)
            : 'Currency update process is successful, data is not need updated';

        if ($showResult) {
            echo $message . PHP_EOL;
        }

        Log::info($message);
    }
}
