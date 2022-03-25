<?php

namespace CrowAnime\Frontend;

interface IComponent
{
    public function sendHTML() : string|array;
}