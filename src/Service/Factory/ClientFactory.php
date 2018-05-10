<?php

namespace Smtm\Crawlbot\Service\Factory;

use Http\Client\Common\Plugin\HistoryPlugin;
use Http\Client\Common\Plugin\RedirectPlugin;
use Http\Client\Common\PluginClient;
use Http\Discovery\HttpAsyncClientDiscovery;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;
use Http\Discovery\StreamFactoryDiscovery;
use Http\Discovery\UriFactoryDiscovery;
use Interop\Container\ContainerInterface;
use Smtm\Http\Client;
use Smtm\Http\History;

class ClientFactory
{
    public function __invoke(ContainerInterface $container, $name, array $options = null)
    {
        $journal = new History();
        $journalReference = &$journal;
        $historyPlugin = new HistoryPlugin($journalReference);
        $redirectPlugin = new RedirectPlugin();
        $transport = HttpClientDiscovery::find();
        $adapterClass = get_class($transport);
        $transport = new PluginClient(
            call_user_func_array(
                [
                    $adapterClass,
                    'createWithConfig',
                ],
                [ // call_user_func_array() args array
                    [ // client options array
                        'verify' => false,
                    ],
                ]
            ),
            [ // PluginClient::__construct() plugins array arg
                $redirectPlugin,
                $historyPlugin,
            ]
        );
        $asyncTransport = HttpAsyncClientDiscovery::find();
        $uriFactory = UriFactoryDiscovery::find();
        $messageFactory = MessageFactoryDiscovery::find();
        $streamFactory = StreamFactoryDiscovery::find();

        return new Client(
            $transport,
            $asyncTransport,
            $uriFactory,
            $messageFactory,
            $streamFactory,
            $journalReference
        );
    }
}