<?php

namespace CrowAnime\Modules;

use CrowAnime\Core\Controllers\AuthControllers\ControllerLogout;
use CrowAnime\Module;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Head;

class Logout extends Module 
{
    private static ?Module $_logout = null;

    public function __construct() {
        
        $this->nameModule = "logout";
        
        $this->head = new Head(
            "Crow Anime - Logout",[]
        );
        
        $this->body = new Body(
            "logout", null, null
        );

        $this->rules = new Rules([
            Rules::LOGIN_REQUIRED,
        ]);

        $this->controller = new ControllerLogout();

        parent::__construct($this->nameModule, $this->head, $this->body, $this->rules, $this->controller);
    }

    public static function getModule(): Logout|Module|null
    {
        if(self::$_logout === null)
            self::$_logout = new Logout();  
     
        return self::$_logout;
    }
}