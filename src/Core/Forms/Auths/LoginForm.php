<?php

namespace CrowAnime\Core\Forms\Auths;

use CrowAnime\Core\Database\Database;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Forms\Form;

class LoginForm extends Form
{
    private string $errorMsg;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->errorMsg = "";
    }

    private function checkInput(): bool
    {
        return isset($_POST['username']) &&
            !empty($_POST['username']) &&
            isset($_POST['password']) &&
            !empty($_POST['password']);
    }

    public function login()
    {
        if (isset($_POST['login'])) {
            if ($this->checkInput()) {
                $username = htmlspecialchars($_POST['username']);
                $user = Database::getDatabase()->execute(
                    "SELECT * FROM _user WHERE username=:username", ['username' => $username]
                );
                if ($user !== []) {
                    $user = $user[0];
                    if (password_verify(htmlspecialchars($_POST['password']), $user['password'])) {
                        $user = User::arrayToUser($user);
                        User::setCurrentUser($user);
                        header("Location: http://$_SERVER[HTTP_HOST]/profile/" . $user->getUsername());
                    } else $this->errorMsg = "Pseuso ou mot de passe invalide";
                } else $this->errorMsg = "Pseuso ou mot de passe invalide";
            } else $this->errorMsg = "Veuillez remplir les champs";
        }
    }

    public function getErrorMsg(): string
    {
        return $this->errorMsg;
    }

}