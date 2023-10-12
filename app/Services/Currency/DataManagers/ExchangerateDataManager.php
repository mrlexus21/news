<?php

namespace App\Services\Currency\DataManagers;

use App;
use App\DTO\Currency\CurrencyDto;
use App\Exceptions\ServiceException;
use App\Services\ApiClient\Interfaces\ApiClientInterface;
use App\Services\Currency\Interfaces\CurrencyClientInterface;
use App\Services\Currency\Interfaces\CurrencyDataManagerInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * Currency data api manager - https://app.exchangerate-api.com/
 */
class ExchangerateDataManager implements CurrencyDataManagerInterface
{
    private ApiClientInterface $client;
    private string $baseCurrency;
    private array $currencyList;

    public function __construct()
    {
        $this->client = App::make(CurrencyClientInterface::class);
        $this->baseCurrency = config('currency.base_currency');
        $this->currencyList = $this->getCurrenciesFromConfig();
    }

    /**
     * @return array
     */
    private function getCurrenciesFromConfig(): array
    {
        return explode(',', config('currency.currency_list'));
    }

    /**
     * @return array
     * @throws ServiceException
     */
    protected function getCurrencyFromBase(): array
    {
        $type = 'get';

        $queryParams = [];

        $pathParams = [
            'latest',
            $this->baseCurrency
        ];

        return $this->client->queryWithParams($pathParams, $queryParams, $type)->exec();
    }

    /**
     * @param null $baseCurrency
     * @return Collection
     * @throws ServiceException
     */
    public function getCurrencyDto($baseCurrency = null) :Collection
    {
        $this->baseCurrency = $baseCurrency ?? config('currency.base_currency');
        $data = collect($this->getCurrencyFromBase())->recursive(3);
        $currentDate = $this->getCurrentDateFromTmp($data->get('time_last_update_unix'));

        $result = $data->get('conversion_rates')->when(isset($this->currencyList), function ($collection) {
            return $collection->filter(function ($value, $key) {
                return in_array($key, $this->currencyList);
            });
        })->map(function ($rate, $currencyName) use ($currentDate) {
            $currDTO = new CurrencyDto();
            $currDTO->title = $currencyName;
            $currDTO->code = $currencyName;
            $currDTO->rate = (float)$rate;
            $currDTO->base_currency = $this->baseCurrency === $currencyName;
            $currDTO->crypt = config('currency.crypt_name') === $currencyName;
            $currDTO->date = $currentDate;

            return $currDTO;
        });

        return $result;
    }

    /**
     * @param int $tmp
     * @return Carbon
     */
    private function getCurrentDateFromTmp(int $tmp): Carbon
    {
        return Carbon::createFromTimestamp($tmp)->today();
    }
}
