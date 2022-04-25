<?php

namespace CrowAnime\Template;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Entities\Path;
use CrowAnime\Core\Entities\User;

class FunctionsTemplate
{

    private array $functions;

    public function __construct()
    {
        $this->functions = [
            'get_view' => function (string $path) {
                require_once "$_SERVER[DOCUMENT_ROOT]/" . Path::VIEWS . $path . '.php';
            },
            'date' => function (string $format) {
                return date($format);
            },
            'is_current_user' => function () {
                if(User::getCurrentUser() !== null) {
                    return User::getCurrentUserURI()->getIdUser() == User::getCurrentUser()->getIdUser();
                }
                else return false;
            },
            'current_user_is_admin' => function () {
                return !(User::getCurrentUser() === null) && User::getCurrentUser()->isAdmin();
            }
        ];
        $this->functions = Controller::compactData($this->functions);
    }

    public function getFunctions(): array
    {
        return $this->functions;
    }

}