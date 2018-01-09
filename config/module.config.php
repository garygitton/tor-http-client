<?php
namespace TorHttpClient;

return [
    'service_manager' => [
        'factories' => [
            TorHttpClient::class => TorHttpClientFactory::class,
        ]
    ]
];
