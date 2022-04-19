<?php

namespace CrowAnime\Core;

interface IComponent
{
    public function sendHTML() : string|array;
}