<?php

namespace CrowAnime\Core\Language;

use CrowAnime\Core\Entities\Path;
use CrowAnime\Router\Router;

class Language
{
    const LANG = [
        'en' => 'en',
        'fr' => 'fr',
    ];
    const DEFAULT_LANG = self::LANG['en'];

    private static ?Language $languageInstance = null;
    private string $currentLanguage;
    private string $langBrowser;

    public function __construct()
    {
        $this->langBrowser = in_array($this->getBrowserLanguage(), self::LANG) ? $this->getBrowserLanguage() : self::DEFAULT_LANG;
        if (strval($this->isActiveBrowserLanguage()) == 1)
            $this->setCurrentLanguage($this->langBrowser);
        else
            $this->setCurrentLanguage($this->getCookieLanguage());
    }

    private function getBrowserLanguage(): string
    {
        return substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    }

    public function isActiveBrowserLanguage()
    {
        return $_COOKIE['active_browser_lang'];
    }

    public static function activeBrowserLanguage(bool $active): void
    {
        if (isset($_COOKIE['active_browser_lang'])) {
            unset($_COOKIE['active_browser_lang']);
        }
        setcookie('active_browser_lang', intval($active), time() + (10 * 365 * 24 * 60 * 60), '/');
    }

    public function for(string $name): array
    {
        $content = file_get_contents("$_SERVER[DOCUMENT_ROOT]/" . Path::LANG . $this->currentLanguage . '.json');
        $strings = json_decode($content, true);
        return $strings[$name];
    }

    public function switchLanguage(): void
    {
        if (isset($_GET['lang']) && !empty($_GET['lang'])) {
            $lang = htmlspecialchars($_GET['lang']);
            if (in_array($lang ,Language::LANG)) {
                self::activeBrowserLanguage(false);
                self::getLanguage()->setCurrentLanguage($lang);
            }
        }
    }

    /**
     * @return string
     */
    public function getCurrentLanguage(): string
    {
        return $this->currentLanguage;
    }

    /**
     * @param string $currentLanguage
     * @return Language
     */
    public function setCurrentLanguage(string $currentLanguage): self
    {
        $this->setCookieLanguage($currentLanguage);
        $this->currentLanguage = $currentLanguage;
        return $this;
    }

    public function getCookieLanguage()
    {
        return $_COOKIE['lang'];
    }

    private function setCookieLanguage(string $currentLanguage): void
    {
        if (isset($_COOKIE['lang'])) {
            unset($_COOKIE['lang']);
        }
        setcookie('lang', $currentLanguage, time() + (10 * 365 * 24 * 60 * 60), '/');
    }

    public static function getLanguage(): self
    {
        if (self::$languageInstance === null) {
            self::$languageInstance = new Language();
        }
        return self::$languageInstance;
    }

}