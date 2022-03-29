<?php

namespace CrowAnime\Backend;

class Rules 
{
    const ALL = 0;
    const LOGIN_REQUIRED = 1;
    const TO_BE_NOT_LOGIN = 3;
    const ADMIN_ONLY = 9;
    const RULES_PATH = "src/Backend/sendrules.php";

    private array $rules;

    public function __construct(array $rules = [Rules::ALL]) 
    {
        $this->rules = $rules;
    }

    public function sendRules()
    {
        if (in_array(Rules::ADMIN_ONLY, $this->rules)) {
            return
                '<?php
                if (isset($_SESSION["user"]) && !($_SESSION["user"]->isAdmin())) {
                    header("Location: http://$_SERVER[HTTP_HOST]/not-found");
                    exit;
                }?>'
            ;
        } elseif (in_array(Rules::LOGIN_REQUIRED, $this->rules)) {
            return
                '<?php
                if (!isset($_SESSION["user"])) {
                    header("Location: http://$_SERVER[HTTP_HOST]/not-found");
                    exit;
                }?>'
            ;
        } elseif (in_array(Rules::TO_BE_NOT_LOGIN, $this->rules)) {
            return
            '<?php
            if (isset($_SESSION["user"])) {
                header("Location: http://$_SERVER[HTTP_HOST]/profile/" . $_SESSION["user"]->getUsername());
                exit;
            }?>'
        ;
        } elseif (in_array(Rules::ALL, $this->rules)) {
            return "";
        }
    }

}
