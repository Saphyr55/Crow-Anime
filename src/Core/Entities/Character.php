<?php

namespace CrowAnime\Core\Entities;

use CrowAnime\Core\Database\Database;

class Character extends Entity
{

    private ?string $name, $pathImage, $description;
    private int|string|null $characterId;

    public function __construct(string $name, $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public static function convert(bool|array $data): ?Character
    {
        $character = new Character(
            $data[1],
            $data[2]
        );

        $character->setCharacterId($data[0]);
        $character->setPathImage('/assets/img/characters/'.$data[0].'.jpg');

        return $character;
    }

    /**
     * @inheritDoc
     */
    public function sendDatabase(): void
    {
        Database::getDatabase()->execute(
            "INSERT INTO _character (name_character, description_character) 
                      VALUES (:name_character, :description_character)",
                        [
                            ":name_character" => $this->name,
                            ":description_character" => $this->description
                        ]);
    }


    public function addInManga(Manga $manga)
    {
        Database::getDatabase()->execute(
            'INSERT INTO participer_manga (id_manga, id_character) 
                     VALUES (:id_anime, :id_character)',
            [
                ":id_anime" => $manga->getIdWork(),
                ":id_character" => $this->getCharacterId(),
            ]);
    }

    public function addInAnime(Anime $anime)
    {
        Database::getDatabase()->execute(
            'INSERT INTO participer_anime (id_anime, id_character) 
                     VALUES (:id_anime, :id_character)',
            [
                ":id_anime" => $anime->getIdWork(),
                ":id_character" => $this->getCharacterId(),
            ]);
    }

    public function deleteInManga(?Manga $manga)
    {
        Database::getDatabase()->execute(
            'DELETE FROM participer_manga
                     WHERE id_manga=:id_manga AND id_character=:id_character',
            [
                ":id_manga" => $manga->getIdWork(),
                ":id_character" => $this->getCharacterId(),
            ]);
    }

    public function deleteInAnime(?Anime $anime)
    {
        Database::getDatabase()->execute(
            'DELETE FROM participer_anime
                     WHERE id_anime=:id_anime AND id_character=:id_character',
            [
                ":id_anime" => $anime->getIdWork(),
                ":id_character" => $this->getCharacterId(),
            ]);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int|string|null
     */
    public function getCharacterId(): int|string|null
    {
        return $this->characterId;
    }

    /**
     * @param int|string|null $characterId
     */
    public function setCharacterId(int|string|null $characterId): void
    {
        $this->characterId = $characterId;
    }

    /**
     * @return string
     */
    public function getPathImage(): string
    {
        return $this->pathImage;
    }

    /**
     * @param string $pathImage
     */
    public function setPathImage(string $pathImage): void
    {
        $this->pathImage = $pathImage;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }




}