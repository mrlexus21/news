<?php

namespace Tests\Feature\Services\Currency\Clients;

use App\Exceptions\ServiceException;
use App\Services\Currency\Clients\FreecurrencyapiClient;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use ReflectionClass;

class FreecurrencyapiClientTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();

        $this->clientObj = app(FreecurrencyapiClient::class);
    }

    public function testClientInitial()
    {
        $baseUrl = $this->callProtectedMethod($this->clientObj, 'getBaseUrl');
        $this->assertEquals($baseUrl, 'https://freecurrencyapi.net/api/v2/latest?apikey='
            . config('currency.freecurrencyapi.api_key'));
    }

    public static function dataQuery()
    {
        return [
            [
                ['param' => 'value'],
                '&param=value'
            ],
            [
                [
                    'param' => 'value',
                    'param2' => 'value2',
                ],
                '&param=value&param2=value2'
            ],
        ];
    }

    /**
     * @dataProvider dataQuery
     * @param $queryParams
     * @param $expectResult
     * @return void
     * @throws ServiceException
     */
    public function testQueryBuilder($queryParams, $expectResult)
    {
        $pathParams = [];
        $this->clientObj->queryWithParams($pathParams, $queryParams);
        $endpoint = $this->callProtectedMethod($this->clientObj, 'getEndpoint');
        $this->assertEquals($expectResult, $endpoint);
    }

    public function testQueryFail()
    {
        $this->expectException(ServiceException::class);
        $this->clientObj->queryWithParams([]);
    }
}
