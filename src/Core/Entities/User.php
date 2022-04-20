<?php

namespace CrowAnime\Core;

use CrowAnime\Core\Database\Database;
use CrowAnime\Entities\Anime;
use CrowAnime\Entities\Manga;
use DateTime;

class User
{
    private static array $usersConnected = [];
    private static ?string $currentUsernameURI = null;
    private int $idUser;
    private string $username;
    private string $email;
    private string $password;
    private bool $isAdmin;
    private DateTime $dateConnection;
    private DateTime $dateRegister;

    /**
     *
     * @param int $idUser
     * @param string $username
     * @param string $email
     * @param string $password
     * @param bool $isAdmin
     * @param string|DateTime $dateConnection
     * @param string|DateTime $dateRegister
     */
    public function __construct(int $idUser, string $username, string $email, string $password, bool $isAdmin, string|DateTime $dateConnection, string|DateTime $dateRegister)
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
            $anime_for_views[] = $anime;
        }
        return $anime_for_views;
    }

    public function mangasView(): array
    {
        $mangas_r = [];
        $mangas = Database::getDatabase()->execute(
            "SELECT * FROM manga 
            INNER JOIN lister_manga ON manga.id_manga=lister_manga.id_manga
            WHERE lister_manga.id_user=:id_user
            ORDER BY lister_manga.score",
            [':id_user' => $this->getIdUser()]
        );

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

    public static function arrayToUser(array $user) : User
    {
        return new User(
            $user['id_user'],
            $user['username'],
            $user['email'],
            $user['password'],
            $user['is_admin'],
            new DateTime(),
            new DateTime()#date_create_from_format("Y-m-d H:i:s", $user['user_date'])
        );
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
    public static function getCurrentUsernameURI(): ?string
    {
        return self::$currentUsernameURI;
    }

    /**
     * Set the value of currentUsernameURI
     */
    public static function setCurrentUsernameURI(?string $currentUsernameURI): void
    {
        self::$currentUsernameURI = $currentUsernameURI;
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

    public static function getCurrentUser() : ?User
    {
        return $_SESSION['user'];
    }

    public static function setCurrentUser(User $user): void
    {
        $_SESSION['user'] = $user;
    }
}
