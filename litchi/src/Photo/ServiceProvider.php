<?php

namespace Lychee\Photo;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app->mount('/photo', new ControllerProvider());
    }
}
