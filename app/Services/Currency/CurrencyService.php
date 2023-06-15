<?php

namespace App\Services\Currency;

use App\Jobs\CurrencySync;
use App\Models\Currency;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class CurrencyService
{
    private string $baseCurrency;
    private array $currencyList;
    private ?Currency $btcTargetCurrency = null;

    public function __construct()
    {
        $this->baseCurrency = config('currency.base_currency');
        $this->currencyList = explode(',', config('currency.currency_list'));
        $this->getBtcConvertTargetData();
    }

    /**
     * Convert from rates
     *
     * @param float $targetCurrencyRate
     * @return float
     */
    public static function convertFromTargetRateToOrigin(float $targetCurrencyRate, ?int $presicion = 6): float
    {
        return $targetCurrencyRate ? round(1 / $targetCurrencyRate, $presicion) : 0;
    }

    private function getBtcConvertTargetData()
    {
        if (!empty(config('currency.crypt_currency_target'))) {
            $this->btcTargetCurrency = Currency::where('date', Carbon::now()->toDateString())
                ->where('code', config('currency.crypt_currency_target'))
                ->first();
        }
    }

    public function convertFromBTCtuRateToCryptCurrency(float $targetCurrencyRate, ?int $presicion = 6): float
    {
        if (!$targetCurrencyRate) return 0;

        if (config('currency.base_currency') !== config('currency.crypt_currency_target')) {
            return round(((1 / $targetCurrencyRate) * $this->btcTargetCurrency->rate) * 1000, $presicion);
        }

        return round(1 / $targetCurrencyRate, $presicion);
    }

    /**
     * @return Collection
     */
    public function getActualInfo(): Collection
    {
        $result = collect([]);

        $arActualInfo = Currency::where('date', Carbon::now()->toDateString())
            ->get()
            ->sortBy( function ($item, $key) {
                return array_search($item->title, $this->currencyList, true);
            });

        if ($arActualInfo->isEmpty()) {
            CurrencySync::dispatch()->delay(now()->addSeconds(10));
            return $result;
        }

        return $arActualInfo->map(function ($item) {
            return (object)([
                'title' => $item->crypt && !empty($this->btcTargetCurrency)
                    ? $item->title .'/' . config('currency.crypt_currency_target')
                    : $item->title .'/' . $this->baseCurrency,
                'code' => $item->code,
                'value' => $item->crypt && !empty($this->btcTargetCurrency)
                    ? self::convertFromBTCtuRateToCryptCurrency($item->rate, 4)
                    : self::convertFromTargetRateToOrigin($item->rate, 2),
                'trend_diff' => $item->crypt && !empty($this->btcTargetCurrency) && ($item->trend_diff > 0)
                    ? self::convertFromBTCtuRateToCryptCurrency($item->trend_diff, 4)
                    : round($item->trend_diff, 4),
                'trend' => match ($item->trend) {
                    Currency::UP => 'plus',
                    Currency::DOWN => 'minus',
                    default => null
                }
            ]);
        })->reject(function ($value) {
            return $value->code === $this->baseCurrency;
        });
    }
}
