<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace CrowAnime\Core\Controllers\Components;

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
                $this->stylePopular = "style='border-color: white;'";
                break;
            default:
                $this->styleTop = "style='border-color: white;'";
                break;
        }
    }

    public function action(): void
    {
        $this->language(Language::getStrings()->for('mangas'));
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
