<?php
namespace Cblink\YApi\Tests\Unit;

use Cblink\YApi\Tests\TestCase;

/**
 * Class ApiTest
 * @package Cblink\YApi\Tests\Unit
 */
class ApiTest extends TestCase
{
    public function testUpdateOrCreateApi()
    {
        $groupId = 292;

        $method = 'GET';

        $path = sprintf("/test/%s", mt_rand(0,9999));

        $payload = [
            "status" => "undone",
            "method" => $method,
            "title" => sprintf("测试接口%s", mt_rand(0,9999)),
            "path" => $path,
            "req_params" => [
                [
                    "name" => "id",
                    "example" => "xxx",
                    "desc" => "id2"
                ]
            ],
            "req_query" => [
                [
                    "required" => "1",
                    "name" => "1111",
                    "example" => "",
                    "desc" => ""
                ],
                [
                    "required" => "0",
                    "name" => "222",
                    "example" => "",
                    "desc" => ""
                ]
            ],
            "req_headers" => [
                [
                    "required"=>"1",
                    "name"=>"Content-Type",
                    "value"=>"application\/x-www-form-urlencoded",
                    "example" => "",
                    "desc" => "ff1"
                ]
            ],
            "req_body_form"=> [
                [
                    "required" => "1",
                    "name" => "f1",
                    "type" => "text",
                    "example" => "",
                    "desc" => "ff1"
                ],
                [
                    "required" => "1",
                    "name" => "f2",
                    "type" => "text",
                    "example" => "",
                    "desc" => "ff2"
                ],
            ],
            "res_body_type" => "raw",
            "res_body"=> json_encode(['err_code' => 0]),
        ];

        $return = [];

        $client = $this->getClient();

        // create
        $client->allows()->updateOrCreateApi($groupId, $payload)->andReturn($return);

        $this->assertEquals($return, $client->updateOrCreateApi($groupId, $payload));

        // update
        $payload['status'] = 'done';
        $client->updateOrCreateApi($groupId, $payload);

        $client->allows()->updateOrCreateApi($groupId, $payload)->andReturn($return);

        $this->assertEquals($return, $client->updateOrCreateApi($groupId, $payload));
    }

    public function testGetApi()
    {
        $client = $this->getClient();

        $id = 1818;

        $return = [
            "query_path" => [
                "path" => "/test/6772",
                "params" => []
            ],
            "edit_uid" => 0,
            "status" => "done",
            "type" => "var",
            "req_body_is_json_schema" => true,
            "res_body_is_json_schema" => true,
            "api_opened" => false,
            "index" => 0,
            "tag" => [],
            "_id" => 1821,
            "catid" => 292,
            "method" => "GET",
            "title" => "\u6d4b\u8bd5\u63a5\u53e3169",
            "path" => "/test/6772",
            "req_params"=> [
                [
                    "_id" => "5ea0fd0e510fc55fe5f71e27",
                    "name" => "id",
                    "example" => "xxx",
                    "desc" => "id2"
                ]
            ],
            "req_query" => [
                [
                    "required"=>"1",
                    "_id"=>"5ea0fd0e510fc55fe5f71e29",
                    "name"=>"1111",
                    "example"=>"",
                    "desc"=>""
                ],
                [
                    "required"=>"0",
                    "_id"=>"5ea0fd0e510fc55fe5f71e28",
                    "name"=>"222",
                    "example"=>"",
                    "desc"=>""
                ]
            ],
            "req_headers"=> [
                [
                    "required"=>"1",
                    "_id"=>"5ea0fd0e510fc55fe5f71e2a",
                    "name"=>"Content-Type",
                    "value"=> "application/x-www-form-urlencoded",
                    "example"=>"",
                    "desc"=>"ff1"
                ]
            ],
            "req_body_form"=>[],
            "res_body_type"=>"raw",
            "res_body"=> '["type"=>"object","title"=>"empty object","properties"=>{}]',
            "project_id"=>117,
            "uid"=>54,
            "add_time"=>1587608810,
            "up_time"=>1587608846,
            "__v"=>0,
            "markdown"=>"",
            "desc"=>"",
            "username"=>"\u8c22\u9896"
        ];

        $client = $this->getClient();
        $client->allows()->getApi($id)->andReturn($return);

        $this->assertEquals($client->getApi($id), $return);
    }
}
