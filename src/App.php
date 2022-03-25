<?php

namespace CrowAnime;

class App
{
    private $modules;
    private $actualURI;
    private $errorPage;
    private static $currentModule;
    private static $currentHead;
    private static $currentBody;

    public function __construct(array $modules, ?Module $errorPage)
    {    
        $this->actualURI = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        foreach ($modules as $module)
            $this->modules[] = $module;
        $this->errorPage = $errorPage;
    }

    public function run()
    {   
        self::$currentModule = $this->modules[0];
        self::$currentHead = self::$currentModule->sendHTML()['head'];
        self::$currentBody = self::$currentModule->sendHTML()['body'];

        if(strcmp($_SERVER['REQUEST_URI'], '/'.$this->modules[0]->getNameModule()) == 0 || 
           strcmp($_SERVER['REQUEST_URI'], "/") == 0) 
        {   
            foreach (self::$currentHead as $value) {
                echo $value."\n";
            }
            foreach (self::$currentBody as $value) {
                echo $value."\n";
            }
        }   
        else
        {   
            self::$currentModule = $this->modules[count($this->modules) - 1];
            foreach (self::$currentModule->sendHTML()['head'] as $value) {
                echo $value."\n";
            }
            foreach (self::$currentBody as $value) {
                echo $value."\n";
            }
        }
    }

    /**
     * Get the value of actualURI
     */ 
    public function getActualURI()
    {
        return $this->actualURI;
    }

    /**
     * Set the value of actualURI
     *
     * @return  self
     */ 
    public function setActualURI($actualURI)
    {
        $this->actualURI = $actualURI;

        return $this;
    }
}
