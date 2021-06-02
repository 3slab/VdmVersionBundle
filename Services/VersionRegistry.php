<?php

/**
 * @package    3slab/VdmVersionBundle
 * @copyright  2020 Suez Smart Solutions 3S.lab
 * @license    https://github.com/3slab/VdmVersionBundle/blob/master/LICENSE
 */

namespace Vdm\Bundle\VersionBundle\Services;

/**
 * Class VersionRegistry
 * @package Vdm\Bundle\VersionBundle\Services
 */
class VersionRegistry
{
    /**
     * @var array
     */
    protected $versions = [];

    /**
     * VersionRegistry constructor.
     * @param array $versions
     */
    public function __construct(array $versions = [])
    {
        $this->versions = $versions;
    }

    /**
     * @return array
     */
    public function all(): array
    {
        return $this->versions;
    }
}
