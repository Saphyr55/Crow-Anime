<?php

namespace CrowAnime\Core\Controllers;

use CrowAnime\Core\Language\Language;
use CrowAnime\Module;

abstract class Controller implements ControllerInterface
{

    protected array $data = [];
    protected array $strings = [];


    public function with(array $data = []): array
    {
        $this->data = self::compactData($data);

        return $this->data;
    }

    public function language(array $string = []): array
    {
        $this->strings = self::compactData($string);
        return $this->strings;
    }

    public static function compactData(array $data = []): array
    {
        $keys = [];
        foreach ($data as $key => $value) {
            $$key = $value;
            $keys[] = $key;
        }
        return compact($keys);
    }

    public function getStrings(): array
    {
        return $this->strings;
    }

    public abstract function action(): void;

    public function getData(): array
    {
        return $this->data;
    }
}
