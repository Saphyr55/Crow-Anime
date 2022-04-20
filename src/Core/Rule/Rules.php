<?php

namespace CrowAnime\Core\Rule;

use CrowAnime\Core\User;

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
        if (in_array(Rules::ALL, $this->rules))
            return null;

        if (in_array(Rules::ADMIN_ONLY, $this->rules))
            $this->admin_only();

        if (in_array(Rules::LOGIN_REQUIRED, $this->rules))
            $this->login_required();

        if (in_array(Rules::NOT_LOGIN_REQUIRED, $this->rules))
            $this->not_login_required();
    }

    private function admin_only(): void
    {
        if (User::getCurrentUser() !== null || !(User::getCurrentUser()->isAdmin())) {
            header("Location: http://$_SERVER[HTTP_HOST]/not-permission");
            exit;
        }
    }

    private function login_required(): void
    {
        if (User::getCurrentUser() !== null) {
            header("Location: http://$_SERVER[HTTP_HOST]/");
            exit;
        }
    }

    private function not_login_required(): void
    {
        if (User::getCurrentUser() !== null) {
            header("Location: http://$_SERVER[HTTP_HOST]/");
            exit;
        }
    }
}
