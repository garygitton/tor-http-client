<?php
namespace TorHttpClient\Helper;

class UserAgentHelper
{
    public static function getRandomValue()
    {
        $browserAgent = BrowserAgentHelper::getRandomValue();
        $operatingSystemAgent = OperatingSystemAgentHelper::getRandomValue();

        $number1 = rand(1, 8);
        $number2 = rand(0, 9);
        $number3 = rand(1, 7);
        $number4 = rand(0, 9);

        return "$browserAgent/$number1.$number2 ( $operatingSystemAgent $number3.$number4; en-US;)";
    }
}
