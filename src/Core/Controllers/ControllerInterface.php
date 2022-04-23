<?php

namespace CrowAnime\Core\Controllers;

interface ControllerInterface
{
    /**
     * @return void
     */
    public function action(): void;

    /**
     * Genere les variables sous forme compacter pour les views
     *
     * @param array $data
     * @return array
     */
    public function with(array $data): array;

    public function getData(): array;

}