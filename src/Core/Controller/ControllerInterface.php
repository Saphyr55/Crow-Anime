<?php

namespace CrowAnime\Core\Controller;

interface ControllerInterface
{
    function action() : void;

    function with(array $data): array;

    public function getData(): array;

}