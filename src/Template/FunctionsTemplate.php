<?php

namespace CrowAnime\Template;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Entities\Path;

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
            }
        ];
        $this->functions = Controller::compactData($this->functions);
    }

    public function getFunctions(): array
    {
        return $this->functions;
    }

}