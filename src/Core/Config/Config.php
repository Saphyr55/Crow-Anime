<?php

namespace CrowAnime\Core\Config;

use CrowAnime\Core\Path;

class Config {

    private $pathConfig;
    private $nameConfig;

    public function __construct(string $nameConfig) {
        $this->nameConfig = $nameConfig;
        $this->pathConfig = Path::CONFIGS . $this->nameConfig . '.config.php'; 
    }

    public function getPathConfig()
    {
        return $this->pathConfig;
    }

    public function setPathConfig($pathConfig)
    {
        $this->pathConfig = $pathConfig;

        return $this;
    }

    public function getNameConfig()
    {
        return $this->nameConfig;
    }

    public function setNameConfig($nameConfig)
    {
        $this->nameConfig = $nameConfig;

        return $this;
    }
}