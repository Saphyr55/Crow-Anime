<?php

namespace CrowAnime\Core\Entities;

abstract class Season
{   
    const WINTER = "WINTER";
    const FALL   = "FALL";
    const SPRING = "SPRING";
    const SUMMER = "SUMMER";

    public static function getCurrentSeason() : string
    {
        if (date('n') >= 1 && date('n') <= 3)
             return self::WINTER;
        if (date('n') >= 4 && date('n') <= 6)
            return self::SPRING;
        if (date('n') >= 7 && date('n') <= 9)
            return self::SUMMER;
        if (date('n') >= 10 && date('n') <= 12)
            return self::WINTER;
        return "SEASON NOT DEFINED";
    }
}