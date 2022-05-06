<?php

namespace CrowAnime\Core\Controllers\Users;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Forms\Form;

class UserProfileController extends Controller
{

    public function action(): void
    {
        $this->change_picture();
        $user = User::getCurrentUserURI();
        $this->with([
            'path_profile_picture' => '/assets/img/users/' . $user->getIdUser() . '.jpg',
            'profile_username' => $user->getUsername() . '\'s',
            'mangas' => $user->mangasRecentAdd(),
            'animes' => $user->animesRecentAdd(),
            'mean_animes' => $user->meanAnimes() === null ? '---' : round($user->meanAnimes(), 2),
            'mean_mangas' => $user->meanMangas() === null ? '---' : round($user->meanMangas(), 2),
            'total_anime' => $user->totalAnime() === null ? '---' : $user->totalAnime(),
            'total_manga' => $user->totalManga() === null ? '---' : $user->totalManga(),
            'redirect_animes_list' => '/profile/'.$user->getUsername() . '/animes',
            'redirect_mangas_list' => '/profile/'.$user->getUsername() . '/mangas',
            'profile_date_join' => explode(' ', $user->getDateRegister())[0]
        ]);
    }

    private function change_picture()
    {
        if ($_POST['submit_picture_profile']) {
            $allowed = ["jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png"];
            $upload_dir = getcwd() . DIRECTORY_SEPARATOR . '/assets/img/users/';
            $id = User::getCurrentUser()->getIdUser();
            $theoretic_file = $upload_dir. $id . '.jpg';
            $name_file = 'profile_picture';
            if (file_exists("$theoretic_file"))
                unlink("$theoretic_file");
            $upload_file = $upload_dir . basename($_FILES[$name_file]['name']);
            Form::upload_file($name_file, $allowed, $upload_file);
            rename("$_SERVER[DOCUMENT_ROOT]/assets/img/users/" . $_FILES[$name_file]['name'], $theoretic_file);
        }
    }

}