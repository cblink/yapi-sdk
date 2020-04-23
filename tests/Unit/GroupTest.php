<?php
namespace Cblink\YApi\Tests\Unit;

use Cblink\YApi\Tests\TestCase;

class GroupTest extends TestCase
{
    /**
     * 创建分组
     *
     * @throws \Cblink\YApi\YApiException
     */
    public function testCreateApiGroup()
    {
        $return = [
            "index" => 0,
            "name" => "这是测试分组",
            "project_id" =>117,
            "desc" => "测试分组的简介",
            "uid" => 54,
            "add_time" => 1587548688,
            "up_time" => 1587548688,
            "_id" => 298,
            "__v" => 0
        ];

        $params = [
            'name' => '这是测试分组',
            'desc' => '测试分组的简介'
        ];

        $client = $this->getClient();
        $client->allows()->createApiGroup($params['name'], $params['desc'])->andReturn($return);

        $this->assertEquals($return, $client->createApiGroup($params['name'], $params['desc']));
    }

    /**
     * 查看所有分组
     *
     * @throws \Cblink\YApi\YApiException
     */
    public function testGetApiGroups()
    {
        $client = $this->getClient();

        $return = [
            [
                "index" => 0,
                "_id" => 286,
                "name" => "\u516c\u5171\u5206\u7c7b",
                "project_id" => 117,
                "desc" => "\u516c\u5171\u5206\u7c7b",
                "uid" => 54,
                "add_time" => 1587546800,
                "up_time" => 1587546800,
                "__v"=> 0
            ],
            [
                "index" => 0,
                "_id" => 292,
                "name" => "\u8fd9\u662f\u6d4b\u8bd5\u5206\u7ec4",
                "project_id" => 117,
                "desc" => "\u6d4b\u8bd5\u5206\u7ec4\u7684\u7b80\u4ecb",
                "uid" => 54,
                "add_time" => 1587548667,
                "up_time" =>1587548667,
                "__v" => 0
            ]
        ];

        $client->allows()->getApiGroups()->andReturn($return);

        $this->assertEquals($return, $client->getApiGroups());
    }
}
