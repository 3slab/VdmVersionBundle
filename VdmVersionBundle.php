<?php

/**
 * @package    3slab/VdmVersionBundle
 * @copyright  2020 Suez Smart Solutions 3S.lab
 * @license    https://github.com/3slab/VdmVersionBundle/blob/master/LICENSE
 */

namespace Vdm\Bundle\VersionBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Vdm\Bundle\VersionBundle\DependencyInjection\Compiler\CollectorPass;
use Vdm\Bundle\VersionBundle\DependencyInjection\Compiler\CustomStoragePass;
use Vdm\Bundle\VersionBundle\Monitoring\Collector\AbstractCollector;

class VdmVersionBundle extends Bundle
{
}
