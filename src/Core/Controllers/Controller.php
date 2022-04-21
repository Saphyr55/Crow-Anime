<?php

namespace CrowAnime\Core\Controllers;

abstract class Controller implements ControllerInterface
{

    protected array $data;

    public function with(array $data): array
    {
        $keys = [];
        foreach ($data as $key => $value) {
            $$key = $value;
            $keys[] = $key;
        }
        $this->data = compact($keys);
        return $this->data;
    }

    // --Commented out by Inspection (20/04/2022 16:18):public abstract function action() : void;

    public function getData(): array
    {
        return $this->data;
    }
}
