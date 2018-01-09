<?php
namespace TorHttpClient\Helper;

class BrowserAgentHelper
{
    public static function getList()
    {
        return include __DIR__ . '/../../resource/browser-agent.php';
    }

    public static function getRandomValue()
    {
        $browsers = self::getList();
        $count = count($browsers);
        $randomNumber = rand(0, $count-1);

        return $browsers[$randomNumber];
    }
}
