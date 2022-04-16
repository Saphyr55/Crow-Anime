<?php

namespace CrowAnime\Backend\Work;

abstract class Season
{   
    const WINTER = "WINTER";
    const FALL   = "FALL";
    const SPRING = "SPRING";
    const SUMMER = "SUMMER";
    private static string $current_season = Season::SPRING;

    public static function getCurrentSeason() : string 
    {
        return self::$current_season;
    }
}