<?php

namespace CrowAnime\Core\Errors;

interface ErrorInterface
{
    public static function get():string;

    public static function set(string $message) : void ;

}