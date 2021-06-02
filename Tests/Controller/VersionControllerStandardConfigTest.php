<?php

namespace Vdm\Bundle\VersionBundle\Tests\Controller;

use Vdm\Bundle\VersionBundle\Tests\VersionKernelTestCase;

class VersionControllerStandardConfigTest extends VersionKernelTestCase
{
    /**
     * {@inheritDoc}
     */
    protected static function getAppName(): string
    {
        return 'standard';
    }

    public function testVersionRouteWrongPath()
    {
        $client = static::createClient();
        $client->disableReboot();

        $client->request('GET', '/version');
        $response = $client->getResponse();

        $this->assertEquals(
            200,
            $response->getStatusCode()
        );

        $this->assertEquals(
            "{\"frontend\":\"dev-6\",\"backend\":\"3.x-beta\"}",
            $response->getContent()
        );
    }
}
