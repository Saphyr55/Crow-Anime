<?php

namespace CrowAnime\Core\Controllers;

interface ControllerInterface
{
    function action(): void;

    function with(array $data): array;

    public function getData(): array;

}