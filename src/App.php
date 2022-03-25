<?php

namespace CrowAnime;

class App
{
    private $modules;
    private $actualURI;

    public function __construct(array $modules = null) 
    {    
        $this->actualURI = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        foreach ($modules as $module)
            $this->modules[] = $module;
        
    }

    public function run()
    {
        var_dump($this->actualURI);    
        
    }
}
