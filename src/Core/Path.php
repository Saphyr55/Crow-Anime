<?php

namespace CrowAnime\Core;

class Path
{
    // Ressouces frontend
    const VIEWS = "src/resources/views/";
    const CSS = "src/resources/css/";
    
    // Configs
    const CONFIGS = "src/Core/Config/configs/";

    // Rules
    const ADMIN_ONLY = "src/Core/Rule/rules/admin_only.php";
    const NOT_LOGIN_REQUIRED = "src/Core/Rule/rules/not_login_required.php";
    const LOGIN_REQUIRED = "src/Core/Rule/rules/login_required.php";
}
