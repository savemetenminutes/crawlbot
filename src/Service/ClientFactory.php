<?php

namespace Smtm\Crawlbot\Service;

use Interop\Container\ContainerInterface;
use Smtm\Http\Client;

class ClientFactory
{
    public function __invoke(ContainerInterface $container, $name, array $options = null)
    {
        return new Client();
    }
}