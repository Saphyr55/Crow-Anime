<?php

namespace CrowAnime\Core\Errors;

class Error implements ErrorInterface
{

    private static ?Error $error = null;
    private string $message;

    private function setErrorMessage(string $message) : void
    {
        $this->message = $message;
    }

    private function getErrorMessage(): string
    {
        return $this->message;
    }

    public static function set(string $message) : void
    {
        self::getError()->setErrorMessage($message);
    }

    public static function get(): string
    {
        return self::getError()->getErrorMessage();
    }

    public static function redirection(?string $message = null) : void
    {
        if ($message !== null)
            self::set($message);
        else self::set(self::get());
        header('Location: '.\CrowAnime\Modules\Error::getModule()->getURL());
        exit();
    }

    private static function getError(): ?Error
    {
        if (self::$error === null) {
            self::$error = new Error();
        }
        return self::$error;
    }

}