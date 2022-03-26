<?php

namespace CrowAnime;

class App
{
    private $modules;
    private $actualURI;
    private $errorPage;
    private static $currentPage;
    private static $currentModule;
    private static $currentHead;
    private static $currentBody;
    const PATH_CURRENT_PAGE = __DIR__ . "/Frontend/currentPage.php";

    public function __construct(array $modules, Module $errorPage)
    {
        $this->errorPage = $errorPage;
        $this->actualURI = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $this->modules = $modules;
    }

    public function run()
    {
        for ($i = 0; $i < count($this->modules); $i++) {

            self::$currentModule = $this->modules[$i];
            self::$currentHead   = self::$currentModule->getHead();
            self::$currentBody   = self::$currentModule->getBody();

            if (
                strcmp($_SERVER['REQUEST_URI'], '/' . self::$currentModule->getNameModule()) == 0
            ) {
                self::putCurrentFileContent(self::$currentModule);
                break;
            } elseif (strcmp($_SERVER['REQUEST_URI'], "/") == 0) {
                self::putCurrentFileContent($this->modules[0]);
                break;
            } elseif ($i == (count($this->modules) - 1)) {
                if ($this->errorPage !== null) {
                    self::putCurrentFileContent($this->errorPage);
                    break;
                }
            }
        }
        return $this;
    }

    private static function putCurrentFileContent(Module $currentModule)
    {
        file_put_contents(self::PATH_CURRENT_PAGE, "");

        $contentCurrentPage = [];

        self::$currentModule = $currentModule;
        self::$currentHead   = self::$currentModule->getHead();
        self::$currentBody   = self::$currentModule->getBody();

        foreach (self::$currentModule->sendHTML()['head'] as $value) {
            $contentCurrentPage[] = $value . "\n";
        }

        foreach (self::$currentBody->sendHTML() as $value) {
            $contentCurrentPage[] = $value . "\n";
        }

        file_put_contents(self::PATH_CURRENT_PAGE, implode($contentCurrentPage));

        require self::PATH_CURRENT_PAGE;
    }

    /**
     * Get the value of actualURI
     */
    public function getActualURI()
    {
        return $this->actualURI;
    }

    /**
     * Set the value of actualURI
     *
     * @return  self
     */
    public function setActualURI($actualURI)
    {
        $this->actualURI = $actualURI;

        return $this;
    }

    /**
     * Get the value of currentPage
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * Set the value of currentPage
     *
     * @return  self
     */
    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;

        return $this;
    }

    /**
     * Get the value of errorPage
     */
    public function getErrorPage()
    {
        return $this->errorPage;
    }

    /**
     * Set the value of errorPage
     *
     * @return  self
     */
    public function setErrorPage($errorPage)
    {
        $this->errorPage = $errorPage;

        return $this;
    }
}
