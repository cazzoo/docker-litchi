<?php

namespace Lychee\Album;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app->mount('/album', new ControllerProvider());
    }
}
