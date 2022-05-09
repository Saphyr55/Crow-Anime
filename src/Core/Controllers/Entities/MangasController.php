<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace CrowAnime\Core\Controllers\Entities;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Entities\Manga;
use CrowAnime\Core\Language\Language;

class MangasController extends Controller
{
    private $stylePopular = "";
    private $styleTop = "";


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
                $this->stylePopular = "style='border-color: #FF66C4;'";
                break;
            default:
                $this->styleTop = "style='border-color: #FF66C4;'";
                break;
        }
    }

    public function action(): void
    {
        $this->language(Language::getLanguage()->for('mangas'));
        $this->styles();
        $this->with([
            'mangas' => $this->mangas(),
            'styles' => [
                'popular' => $this->stylePopular,
                'top' => $this->styleTop
            ]
        ]);
    }
}
