<?php

namespace Vdm\Bundle\VersionBundle\Tests\DependencyInjection;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Definition\Processor;
use Vdm\Bundle\VersionBundle\DependencyInjection\Configuration;

class ConfigurationTest extends TestCase
{
    /**
     * @var Processor
     */
    protected $processor;

    public function setUp(): void
    {
        $this->processor = new Processor();
    }

    public function testEmptyConfig(): void
    {
        $configuration = new Configuration();
        $config = $this->processor->processConfiguration($configuration, []);

        $this->assertEquals(
            [
                'secret' => null,
                'path' => '/version',
                'versions' => [],
            ],
            $config
        );
    }

    public function testInvalidConfigWithException(): void
    {
        $this->expectException(InvalidConfigurationException::class);

        $configuration = new Configuration();
        $this->processor->processConfiguration(
            $configuration,
            [
                'vdm_version' => [
                    'versions' => 'value'
                ]
            ]
        );
    }

    public function testValidConfig(): void
    {
        $unprocessedConfig = [
            'vdm_version' => [
                'secret' => 'mysecret',
                'path' => '/mycustomversion',
                'versions' => [
                    'app1' => '1.0',
                    'app2' => '1.1'
                ],
            ]
        ];

        $configuration = new Configuration();
        $config = $this->processor->processConfiguration(
            $configuration,
            $unprocessedConfig
        );

        $this->assertEquals($unprocessedConfig['vdm_version'], $config);
    }
}
