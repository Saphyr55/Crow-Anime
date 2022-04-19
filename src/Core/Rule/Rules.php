<?php

namespace CrowAnime\Core\Rule;

class Rules
{
    const ALL = 0;
    const LOGIN_REQUIRED = 1;
    const NOT_LOGIN_REQUIRED = 3;
    const ADMIN_ONLY = 9;

    private array $rules;

    public function __construct(array $rules = [Rules::ALL])
    {
        $this->rules = $rules;
    }

    public function check()
    {
        if (in_array(Rules::ADMIN_ONLY, $this->rules))
            Rules::admin_only();

        if (in_array(Rules::LOGIN_REQUIRED, $this->rules))
            Rules::login_required();

        if (in_array(Rules::NOT_LOGIN_REQUIRED, $this->rules))
            Rules::not_login_required();

        if (in_array(Rules::ALL, $this->rules))
            return null;
    }

    public static function admin_only()
    {
        if (!isset($_SESSION["user"]) || !($_SESSION["user"]->isAdmin())) {
            header("Location: http://$_SERVER[HTTP_HOST]/not-found");
            exit;
        }
    }

    public static function login_required()
    {
        if (!isset($_SESSION["user"])) {
            header("Location: http://$_SERVER[HTTP_HOST]/login");
            exit;
        }
    }

    public static function not_login_required()
    {
        if (isset($_SESSION["user"])) {
            header("Location: http://$_SERVER[HTTP_HOST]/profile/" . $_SESSION["user"]->getUsername());
            exit;
        }
    }
}
