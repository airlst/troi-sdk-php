<?php

declare(strict_types=1);

namespace Troi\V2\SDKBuilder\Generators\Concerns;

use Crescat\SaloonSdkGenerator\Data\Generator\Config;
use Crescat\SaloonSdkGenerator\Generator;
use RuntimeException;

/**
 * The parent Generator holds the config as nullable, but every generator in this
 * builder receives one from the Build command. This accessor asserts that.
 *
 * @phpstan-require-extends Generator
 */
trait RequiresConfig
{
    protected function config(): Config
    {
        if (! $this->config instanceof Config) {
            throw new RuntimeException('The generator did not receive a configuration.');
        }

        return $this->config;
    }
}
