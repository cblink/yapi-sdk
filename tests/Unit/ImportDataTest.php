<?php

namespace Cblink\YApi\Tests\Unit;

use Cblink\YApi\Tests\TestCase;

/**
 * Class ImportDataTest
 * @package Cblink\YApi\Tests\Unit
 */
class ImportDataTest extends TestCase
{
    /**
     * 导入接口
     *
     * @throws \Cblink\YApi\YApiException
     */
    public function testImport()
    {
        $client = $this->getClient();

        $swagger = json_encode([
            "swagger" =>  "2.0",
            "paths" =>  [
                "/test26" =>  [
                    "post" =>  [
                        "tags" =>  [
                            "好分类"
                        ],
                        "summary" =>  "接口3333888",
                        "description" =>  "",
                        "consumes" =>  [
                            "application/json"
                        ],
                        "parameters" =>  [
                            [
                                "name" =>  "root",
                                "in" =>  "body",
                                "schema" =>  [
                                    "type" =>  "object",
                                    "title" =>  "empty object",
                                    "properties" =>  [
                                        "field_3" =>  [
                                            "type" =>  "string",
                                            "description" =>  "入参4"
                                        ],
                                        "field_4" =>  [
                                            "type" =>  "string",
                                            "description" =>  "入参3"
                                        ]
                                    ],
                                    "required" =>  [
                                        "field_3",
                                        "field_4"
                                    ]
                                ]
                            ]
                        ],
                        "responses" =>  [
                            "200" =>  [
                                "description" =>  "successful operation",
                                "schema" =>  [
                                    "type" =>  "object",
                                    "title" =>  "empty object",
                                    "properties" =>  [
                                        "返回1" =>  [
                                            "type" =>  "string",
                                            "description" =>  "备注"
                                        ],
                                        "返回2" =>  [
                                            "type" =>  "string"
                                        ]
                                    ],
                                    "required" =>  [
                                        "返回1"
                                    ]
                                ]
                            ]
                        ]
                    ],
                    "get" =>  [
                        "tags" =>  [
                            "这是测试分组"
                        ],
                        "summary" =>  "接口1",
                        "description" =>  "",
                        "parameters" =>  [
                            [
                                "name" =>  "1111",
                                "in" =>  "query",
                                "required" =>  false,
                                "description" =>  "",
                                "type" =>  "string"
                            ],
                            [
                                "name" =>  "222",
                                "in" =>  "query",
                                "required" =>  false,
                                "description" =>  "",
                                "type" =>  "string"
                            ]
                        ],
                        "responses" =>  [
                            "200" =>  [
                                "description" =>  "successful operation",
                                "schema" =>  [
                                    "type" =>  "object",
                                    "title" =>  "empty object",
                                    "properties" =>  [
                                        "rs1" =>  [
                                            "type" =>  "string",
                                            "description" =>  "备注"
                                        ],
                                        "res2" =>  [
                                            "type" =>  "integer",
                                            "description" =>  "字段说明"
                                        ]
                                    ],
                                    "required" =>  [
                                        "test"
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]);

        $return = [];

        // merge：  normal"(普通模式) , "good"(智能合并), "merge"(完全覆盖)
        $merge = 'merge';

        $client->allows()->importData($swagger, $merge)->andReturn($return);

        $this->assertEquals($return, $client->importData($swagger, $merge));
    }
}
