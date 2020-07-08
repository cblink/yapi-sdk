<?php

namespace Cblink\YApi\Tests;

use Cblink\YApi\YApiRequest;
use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * Class TestCase
 * @package Cblink\Yapi\Tests
 */
class TestCase extends BaseTestCase
{
    /**
     * @var YApiRequest
     */
    protected $client;

    public function setUp(): void
    {
        $this->client = \Mockery::mock(YApiRequest::class, ['http://yapi.server'])->makePartial();
        $this->client->setConfig(117, 'fcf6db8191df13b13466f044c193a4d0869bacb7a7eb2144b6abdc985a702875');
    }

    /**
     * @return YApiRequest|\Mockery\Mock
     */
    public function getClient()
    {
        return $this->client;
    }
}
