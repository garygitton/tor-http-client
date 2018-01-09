<?php
namespace TorHttpClient\Helper;

class OperatingSystemAgentHelper
{
    public static function getList()
    {
        return include __DIR__ . '/../../resource/operating-system-agent.php';
    }

    public static function getRandomValue()
    {
        $operatingSystems = self::getList();
        $count = count($operatingSystems);
        $randomNumber = rand(0, $count-1);

        return $operatingSystems[$randomNumber];
    }
}
