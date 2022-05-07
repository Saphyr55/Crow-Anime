<?php

namespace CrowAnime\Core\Entities;

abstract class Entity
{
    /**
     * Permet d'envoyer l'entity dans la base de donnée
     *
     * @return void
     */
    public abstract function sendDatabase() : void;
}