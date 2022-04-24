<?php

namespace CrowAnime\Core\Rules;

use CrowAnime\Core\Entities\User;

class Rules
{
    const ALL = 0;
    const LOGIN_REQUIRED = 1;
    const NOT_LOGIN_REQUIRED = 3;
    const ADMIN_ONLY = 9;
    const USER_CURRENT_ONLY = 2;

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

        if (in_array(Rules::USER_CURRENT_ONLY, $this->rules))
            $this->user_current_only();

    }

    private function user_current_only(): void
    {
        if (!User::getCurrentUser()->isInURI()) {
            header("Location: http://$_SERVER[HTTP_HOST]/not-found");
            exit();
        }
    }

    private function admin_only(): void
    {
        $this->login_required();
        if (!(User::getCurrentUser()->isAdmin())) {
            header("Location: http://$_SERVER[HTTP_HOST]/not-found");
            exit;
        }
    }

    private function login_required(): void
    {
        if (User::getCurrentUser() === null) {
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
