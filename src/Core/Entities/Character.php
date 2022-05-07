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