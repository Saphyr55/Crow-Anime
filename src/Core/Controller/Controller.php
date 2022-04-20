<?php

namespace CrowAnime\Core\Controller;

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

    public abstract function action() : void;

    public function getData(): array
    {
        return $this->data;
    }
}
