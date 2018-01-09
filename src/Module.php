<?php
namespace TorHttpClient;

/**
 * Class Module
 * @package TorHttpClient\Client
 */
class Module
{
    public function getConfig(): array
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
