<?php

namespace CrowAnime\Core\Forms\Auths;

use CrowAnime\Core\Database\Database;
use CrowAnime\Core\Forms\Form;

class SignupForm extends Form
{
    private string $errorMsg = "";

    public function signup()
    {
        if (isset($_POST['register'])) {
            if (
                isset($_POST['username']) &&
                !empty($_POST['username']) &&
                isset($_POST['password']) &&
                !empty($_POST['password']) &&
                isset($_POST['email']) &&
                !empty($_POST['email'])
            ) {
                $username = htmlentities(htmlspecialchars($_POST['username']));
                $email = htmlentities(htmlspecialchars($_POST['email']));
                var_dump(strcmp(htmlentities(htmlspecialchars($_POST['password'])),
                        htmlentities(htmlspecialchars($_POST['confirm_password']))) === 0);
                var_dump(htmlentities(htmlspecialchars($_POST['password'])));
                var_dump(htmlentities(htmlspecialchars($_POST['confirm_password'])));

                try {
                    if (
                        strcmp(htmlspecialchars($_POST['password']),
                            htmlspecialchars($_POST['confirm_password'])) === 0
                    ) {
                        $user = Database::getDatabase()->execute(
                            "SELECT * FROM _user 
			                        WHERE username=:username
			                        AND email=:email",
                            [
                                'username' => $username,
                                'email' => $email
                            ]
                        );
                        if ($user === []) {
                            Database::getDatabase()->execute(
                                'INSERT INTO _user (username, password, is_admin, email) 
                                         VALUES (:username, :password,:is_admin, :email)',
                                [
                                    ":username" => $username,
                                    ":password" => password_hash(htmlentities(htmlspecialchars($_POST['password'])), PASSWORD_DEFAULT),
                                    ":is_admin" => 0,
                                    ":email" => $email
                                ]
                            );
                            header("Location: http://$_SERVER[HTTP_HOST]/profile/".$username);
                        } else $this->errorMsg = "Username ou email déjà utiliser";
                    } else $this->errorMsg = "Mot de passe non conrespondant";
                } catch (\PDOException $e) {
                    error_log("PDO : $e");
                    $this->errorMsg = "Username ou email déjà utiliser";
                }
            } else $this->errorMsg = "Veuillez remplir les champs";
        }
    }

    public function getErrorMsg(): string
    {
        return $this->errorMsg;
    }

}