<?php

namespace CrowAnime\Core\Controller;

abstract class Controller
{

    private array $datas;

    public function with(array $datas)
    {
        $keys = [];
        foreach ($datas as $key => $value) {
            $$key = $value;
            array_push($keys, $key);
        }
        $this->datas = compact($keys);
        return $this->datas;
    }

    public function getDatas(): array
    {
        return $this->datas;
    }
}
