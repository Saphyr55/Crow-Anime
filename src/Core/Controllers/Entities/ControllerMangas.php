<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace CrowAnime\Core\Controller\Entities;

use CrowAnime\Core\Controller\Controller;
use CrowAnime\Core\Entities\Manga;

class ControllerMangas extends Controller
{
    private $stylePopular;
    private $styleTop;

    public function __construct()
    {
        $this->styles();
        $this->with([
            'mangas' => $this->mangas(),
            'styles' => [
                'popular' => $this->stylePopular,
                'top' => $this->styleTop
            ]
        ]);
    }

    private function mangas(): array
    {
        return match ($_GET['type']) {
            'popular' => Manga::getMostPopularMangas(),
            'recent_upload' => Manga::recentUpload(),
            default => Manga::getTopMangas(),
        };
    }

    private function styles()
    {
        switch ($_GET['type']) {
            case 'popular':
                $this->styleTop = "style='border-color: transpared;'";
                $this->stylePopular = "style='border-color: white;'";
                break;
            case 'recent_upload':
                $this->styleTop = "style='border-color: transpared;'";
                $this->stylePopular = "style='border-color: transpared;'";
                break;
            default:
                $this->styleTop = "style='border-color: white;'";
                $this->stylePopular = "style='border-color: transpared;'";
                break;
        }
    }

    public function action() : void
    {
        // TODO: Implement action() method.
    }
}
