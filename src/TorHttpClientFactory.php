<?php
namespace TorHttpClient;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleTor\Middleware;
use Interop\Container\ContainerInterface;

class TorHttpClientFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $globalConfig = $container->get('config');

        $stack = new HandlerStack();
        $stack->setHandler(new CurlHandler());

        $torProxyConfig = $globalConfig['tor']['proxy'];
        $torProxyControlConfig = $globalConfig['tor']['control'];

        $proxy = $torProxyConfig['hostname'].':'.$torProxyConfig['port'];
        $torControl = $torProxyControlConfig['hostname'].':'.$torProxyControlConfig['port'];

        $stack->push(Middleware::tor($proxy , $torControl));

        $httpClient = new Client(['handler' => $stack]);

        return new TorHttpClient(
            $globalConfig['tor'],
            $httpClient
        );
    }
}


