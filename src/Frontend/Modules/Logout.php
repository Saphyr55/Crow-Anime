<?php

namespace CrowAnime\Frontend\Modules;

use CrowAnime\Backend\Head;
use CrowAnime\Backend\Rules;
use CrowAnime\Frontend\Body;
use CrowAnime\Module;

class Logout extends Module 
{
    private static ?Module $_logout = null;
    private string $nameModule;
    private Head $head;
    private Body $body;
    private Rules $rules;

    public function __construct() {
        
        $this->nameModule = "logout";
        
        $this->head = new Head(
            "Crow Anime - Logout",[]
        );
        
        $this->body = new Body(
            "src/Frontend/components/logout.php", null, null
        );

        $this->rules = new Rules([
            Rules::LOGIN_REQUIRED,
        ]);

        parent::__construct($this->nameModule, $this->head, $this->body, $this->rules);
    }

    public static function getModule()
    {
        if(self::$_logout === null)
            self::$_logout = new Logout();  
     
        return self::$_logout;
    }
}