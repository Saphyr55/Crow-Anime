<?php

namespace CrowAnime\Core\Controllers;

use CrowAnime\Core\Language\Language;
use CrowAnime\Module;

/**
 * Permet de controller la vue avec des variables generer pour elle
 */
abstract class Controller implements ControllerInterface
{

    protected array $data = [];
    protected array $strings = [];

    /**
     * Methode appeler lors generation du la vue
     * Permet d'executer n'importe qu'elle instruction
     *
     * @return void
     */
    public abstract function action(): void;

    public function with(array $data = []): array
    {
        $this->data = self::compactData($data);

        return $this->data;
    }

    /**
     * Creer les variables compacter en fonction de la langue
     *
     * @param array $string
     * @return array
     */
    public function language(array $string = []): array
    {
        $this->strings = self::compactData($string);
        return $this->strings;
    }

    /**
     * Permet de compacter les donnée sous formes key value
     * avec comme key le nom de la variable voulu
     * et comme value la valeur de la variables
     *
     * @param array $data
     * @return array
     */
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

    public function getData(): array
    {
        return $this->data;
    }
}
