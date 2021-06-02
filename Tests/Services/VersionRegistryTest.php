<?php

namespace Vdm\Bundle\VersionBundle\Tests\Services;

use PHPUnit\Framework\TestCase;
use Vdm\Bundle\VersionBundle\Services\VersionRegistry;

class VersionRegistryTest extends TestCase
{
    public function testAll()
    {
        $versions = [
            'portal' => '1.1.1',
            'db' => '2.2.2'
        ];

        $registry = new VersionRegistry($versions);

        $this->assertEquals($versions, $registry->all());
    }
}
