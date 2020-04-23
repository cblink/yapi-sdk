<?php
namespace Cblink\YApi\Tests\Unit;

use Cblink\YApi\Tests\TestCase;

/**
 * Class ProjectTest
 * @package Cblink\Yapi\Tests\Units
 */
class ProjectTest extends TestCase
{
    /**
     * 查询项目信息
     *
     * @throws \Cblink\YApi\YApiException
     */
    public function testGetProject()
    {
        $return = [
            "switch_notice" => true,
            "is_mock_open" => false,
            "strice" => false,
            "is_json5" => false,
            "_id" => 117,
            "name" => "test",
            "basepath" => "",
            "project_type" => "private",
            "uid" => 54,
            "group_id" => 130,
            "icon" => "code-o",
            "color" => "green",
            "add_time" => 1587546800,
            "up_time" => 1587546800,
            "env" => [
                [
                    "header" => [],
                    "global" =>[],
                    "_id" => "5ea00ab0510fc55fe5f71d59",
                    "name" => "local",
                    "domain" => "http://127.0.0.1"
                ]
            ],
            "tag" => [],
            "cat" => [],
            "role" => false
        ];

        $client = $this->getClient();
        $client->allows()->getProject()->andReturn($return);

        $this->assertEquals($client->getProject(), $return);
    }
}
