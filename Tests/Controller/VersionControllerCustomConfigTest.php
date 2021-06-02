<?php

namespace Vdm\Bundle\VersionBundle\Tests\Controller;

use Vdm\Bundle\VersionBundle\Tests\VersionKernelTestCase;

class VersionControllerCustomConfigTest extends VersionKernelTestCase
{
    /**
     * {@inheritDoc}
     */
    protected static function getAppName(): string
    {
        return 'custom';
    }

    public function testVersionRouteWrongPath()
    {
        $client = static::createClient();
        $client->disableReboot();

        $client->request('GET', '/versions');

        $this->assertEquals(
            404,
            $client->getResponse()->getStatusCode()
        );
    }

    public function testVersionRouteWithoutSecret()
    {
        $client = static::createClient();
        $client->disableReboot();

        $client->request('GET', '/myversion');

        $this->assertEquals(
            200,
            $client->getResponse()->getStatusCode()
        );
        $this->assertEquals(
            '[]',
            $client->getResponse()->getContent()
        );
    }

    public function testVersionRouteWitSecretInUrl()
    {
        $client = static::createClient();
        $client->disableReboot();

        $client->request('GET', '/myversion?secret=mysecret');

        $this->assertVersionResponse($client->getResponse());
    }

    public function testVersionRouteWithSecretInHeader()
    {
        $client = static::createClient();
        $client->disableReboot();

        $client->request('GET', '/myversion', [], [], ['HTTP_VDM_VERSION_SECRET' => 'mysecret']);

        $this->assertVersionResponse($client->getResponse());
    }

    public function assertVersionResponse($response)
    {
        $this->assertEquals(
            200,
            $response->getStatusCode()
        );

        $this->assertEquals(
            "{\"portal\":\"1.1.0\",\"db\":\"3.2.1\"}",
            $response->getContent()
        );
    }
}
