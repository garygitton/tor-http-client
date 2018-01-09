<?php
namespace TorHttpClient;

use TorHttpClient\Helper\UserAgentHelper;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\RequestInterface;

class TorHttpClient implements ClientInterface
{
    protected $torConfig;
    protected $httpClient;

    public function __construct(
        array $torConfig,
        ClientInterface $httpClient
    ) {
        $this->torConfig = $torConfig;
        $this->httpClient = $httpClient;
    }

    public function send(RequestInterface $request, array $options = [])
    {
        $options = array_merge_recursive($this->getOptions(), $options);

        return $this->httpClient->send($request, $options);
    }

    public function sendAsync(RequestInterface $request, array $options = [])
    {
        $options = array_merge_recursive($this->getOptions(), $options);

        return $this->httpClient->sendAsync($request, $options);
    }

    public function request($method, $uri, array $options = [])
    {
        $options = array_merge_recursive($this->getOptions(), $options);

        return $this->httpClient->request($method, $uri, $options);
    }

    public function requestAsync($method, $uri, array $options = [])
    {
        $options = array_merge_recursive($this->getOptions(), $options);

        return $this->httpClient->requestAsync($method, $uri, $options);
    }

    public function getConfig($option = null)
    {
        return $this->httpClient->getConfig($option);
    }

    protected function getOptions()
    {
        $options = [
            RequestOptions::HEADERS => [
                'User-Agent' => UserAgentHelper::getRandomValue(),
                'Content-Type' => 'application/json'
            ],
            'tor_new_identity' => false,
            'tor_new_identity_sleep' => rand(3, 6),
            'tor_new_identity_timeout' => 3,
            'tor_new_identity_exception' => true,
            'tor_control_password' => $this->torConfig['control']['authentication']['password'],
        ];

        return $options;
    }
}
