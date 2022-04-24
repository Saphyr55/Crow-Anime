<?php

namespace CrowAnime\Core\Entities;

use CrowAnime\Core\Database\Database;
use CrowAnime\Core\Errors\Error;
use CrowAnime\Core\Errors\ErrorsType;
use DateTime;

class User
{
    private static array $usersConnected = [];
    private static ?string $currentUsernameURI = null;
    private int $idUser;
    private string $username = "";
    private string $email;
    private string $password;
    private bool $isAdmin;
    private string|DateTime|null $dateConnection;
    private string|DateTime|null $dateRegister;

    /**
     *
     * @param int $idUser
     * @param string $username
     * @param string $email
     * @param string $password
     * @param bool $isAdmin
     * @param string|DateTime|null $dateConnection
     * @param string|DateTime|null $dateRegister
     */
    public function __construct(int $idUser, string $username, string $email, string $password, bool $isAdmin, string|DateTime|null $dateConnection, string|DateTime|null $dateRegister)
    {
        $this->idUser = $idUser;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->isAdmin = $isAdmin;
        $this->dateConnection = $dateConnection;
        $this->dateRegister = $dateRegister;
        self::$usersConnected[] = $this;
    }

    public function totalAnime()
    {
        return Database::getDatabase()->execute(
            "SELECT COUNT(id_anime) FROM lister_anime
            WHERE id_user=:id_user GROUP BY id_user",
            [':id_user' => $this->getIdUser()]
        )[0]['COUNT(id_anime)'];
    }

    public function totalManga()
    {
        return Database::getDatabase()->execute(
            "SELECT COUNT(id_manga) FROM lister_manga
            WHERE id_user=:id_user
            GROUP BY id_user",
            [':id_user' => $this->getIdUser()]
        )[0]['COUNT(id_manga)'];
    }

    public function meanMangas()
    {
        return Database::getDatabase()->execute(
            "SELECT AVG(score) FROM lister_manga
            WHERE id_user=:id_user
            GROUP BY id_user",
            [':id_user' => $this->getIdUser()]
        )[0]['AVG(score)'];
    }

    public function meanAnimes()
    {
        return Database::getDatabase()->execute(
            "SELECT AVG(score) FROM lister_anime 
            WHERE id_user=:id_user
            GROUP BY id_user",
            [':id_user' => $this->getIdUser()]
        )[0]['AVG(score)'];
    }

    public function animesView(): array
    {
        $anime_for_views = [];
        $anime_from_database = Database::getDatabase()->execute(
            "SELECT * FROM anime 
            INNER JOIN lister_anime ON anime.id_anime=lister_anime.id_anime
            WHERE lister_anime.id_user=:id_user
            ORDER BY lister_anime.score",
            [':id_user' => $this->getIdUser()]
        );
        return $this->createAnimeByArray($anime_from_database, $anime_for_views);
    }

    public function animesRecentAdd(): array
    {
        return Database::getDatabase()->execute(
            "SELECT * FROM anime 
            INNER JOIN lister_anime ON anime.id_anime=lister_anime.id_anime
            WHERE lister_anime.id_user=:id_user
            ORDER BY lister_anime.add_date DESC",
            [':id_user' => $this->getIdUser()]
        );
    }

    public function mangasRecentAdd(): array
    {
        return Database::getDatabase()->execute(
            "SELECT * FROM manga 
            INNER JOIN lister_manga ON manga.id_manga=lister_manga.id_manga
            WHERE lister_manga.id_user=:id_user
            ORDER BY lister_manga.add_date DESC",
            [':id_user' => $this->getIdUser()]
        );
    }

    public function mangasView(): array
    {
        $mangas = Database::getDatabase()->execute(
            "SELECT * FROM manga 
            INNER JOIN lister_manga ON manga.id_manga=lister_manga.id_manga
            WHERE lister_manga.id_user=:id_user
            ORDER BY lister_manga.score",
            [':id_user' => $this->getIdUser()]
        );

        return $this->createMangaByArray($mangas);
    }

    public static function arrayToUser(array $user): User
    {
        return new User(
            $user['id_user'],
            $user['username'],
            $user['email'],
            $user['password'],
            $user['is_admin'],
            new DateTime(),
            new DateTime()
        );
    }

    public function isInURI(): bool
    {
        $uri = $_SERVER['REQUEST_URI'];
        if (
            strcmp(explode('/', $uri)[1], 'profile') === 0 ||
            strcmp(explode('/', $uri)[1], 'admin') === 0
        ) {
            if (strcmp(self::getCurrentUserURI()->getUsername(), self::getCurrentUser()->username) === 0)
                return true;
            else return false;
        } else return false;
    }

    public static function setUserURI(): void
    {
            $uri = $_SERVER['REQUEST_URI'];
            $uri = explode('?', $uri)[0];
            if (
                strcmp(explode('/', $uri)[1], 'profile') === 0 ||
                strcmp(explode('/', $uri)[1], 'admin') === 0
            ) {
                $theoreticUser = explode('/', $uri)[2];
                $user = Database::getDatabase()->execute(
                    "SELECT * FROM _user WHERE username=:username", [':username' => $theoreticUser]
                );
                if (!strcmp($theoreticUser, $user[0]['username'])) {
                    if(isset($theoreticUser) && isset($user[0]['username'])){
                        self::setCurrentUserURI(
                            new User(
                                $user[0]['id_user'],
                                $user[0]['username'],
                                $user[0]['email'],
                                $user[0]['password'],
                                $user[0]['is_admin'],
                                null,
                                $user[0]['user_date']
                            )
                        );
                    }
                } else self::setCurrentUserURI(new User(-1, "", "", "", "", "", ""));
            } else self::setCurrentUserURI(new User(-1, "", "", "", "", "", ""));


    }

    /**
     * Get the value of dateConnection
     */
    public function getDateConnection(): DateTime
    {
        return $this->dateConnection;
    }


    /**
     * Set the value of dateConnection
     *
     * @param DateTime $dateConnection
     * @return  self
     */
    public function setDateConnection(DateTime $dateConnection): self
    {
        $this->dateConnection = $dateConnection;

        return $this;
    }

    /**
     * Get the value of isAdmin
     */
    public function isAdmin(): bool
    {
        return $this->isAdmin;
    }

    /**
     * Set the value of isAdmin
     *
     * @param bool $isAdmin
     * @return  self
     */
    public function setIsAdmin(bool $isAdmin): self
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    /**
     * Get the value of username
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @param $username
     * @return  self
     */
    public function setUsername($username): static
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param $email
     * @return  self
     */
    public function setEmail($email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of dateRegister
     */
    public function getDateRegister(): DateTime
    {
        return $this->dateRegister;
    }

    /**
     * Set the value of dateRegister
     *
     * @param $dateRegister
     * @return  self
     */
    public function setDateRegister($dateRegister): static
    {
        $this->dateRegister = $dateRegister;

        return $this;
    }


    /**
     * Get the value of currentUsernameURI
     */
    public static function getCurrentUserURI(): ?User
    {
        return $_SESSION['user_uri'];
    }

    /**
     * Set the value of currentUsernameURI
     */
    public static function setCurrentUserURI(?User $currentUserURI): void
    {
        $_SESSION['user_uri'] = $currentUserURI;
    }

    /**
     * Get the value of idUser
     */
    public function getIdUser(): int
    {
        return $this->idUser;
    }

    /**
     * Get the value of usersConnected
     */
    public static function getUsersConnected(): array
    {
        return self::$usersConnected;
    }

    public static function getCurrentUser(): ?User
    {
        return $_SESSION['user'];
    }

    public static function setCurrentUser(User $user): void
    {
        $_SESSION['user'] = $user;
    }

    /**
     * @param bool|array $mangas
     * @param array $mangas_r
     * @return array
     */
    private function createMangaByArray(bool|array $mangas): array
    {
        $mangas_r =[];
        foreach ($mangas as $value) {
            $manga = new Manga(
                $value['manga_title_ja'],
                $value['manga_title_en'],
                $value['manga_finish'],
                $value['manga_synopsis'],
                $value['manga_author'],
                $value['manga_edition'],
                $value['manga_volumes'],
                $value['manga_date']
            );
            $manga->setIdWork($value['id_manga']);
            $mangas_r[] = $manga;
        }
        return $mangas_r;
    }

    /**
     * @param bool|array $anime_from_database
     * @param array $anime_for_vews
     * @return array
     */
    private function createAnimeByArray(bool|array $anime_from_database, array $anime_for_vews): array
    {
        foreach ($anime_from_database as $value) {
            $anime = Anime::build(
                $value['anime_title_en'],
                $value['anime_title_ja'],
                $value['anime_finish'],
                $value['anime_synopsis'],
                $value['anime_season'],
                $value['anime_studio'],
                $value['anime_date'],
            );
            $anime->setIdWork($value['id_anime']);
            $anime_for_vews[] = $anime;
        }
        return $anime_for_vews;
    }


}
