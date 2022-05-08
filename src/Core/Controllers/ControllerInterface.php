<?php

namespace CrowAnime\Core\Controllers;

interface ControllerInterface
{

    /**
     * Genere les variables sous forme compacter pour les views
     * En rentrant un tableau clé valeur avec comme key le nom de la variable voulu
     * et comme value la valeur de la variables
     *
     * @param array $data
     * @return array
     */
    public function with(array $data): array;

    public function getData(): array;

}