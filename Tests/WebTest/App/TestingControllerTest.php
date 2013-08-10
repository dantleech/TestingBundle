<?php

namespace Symfony\Cmf\Bundle\TestingBundle\Tests\WebTest\App;

use Symfony\Cmf\Component\Testing\Functional\BaseTestCase;

class TestingControllerTest extends BaseTestCase
{
    public function test200()
    {
        $client = $this->createClient();
        $client->request('get', '/');
        $resp = $client->getResponse();
        $this->assertEquals(200, $resp->getStatusCode());
    }
}
