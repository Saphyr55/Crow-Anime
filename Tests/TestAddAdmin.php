<?php

use CrowAnime\Backend\Database\Database;
use CrowAnime\Backend\Work\Anime;
use PHPUnit\Framework\TestCase;

class TestAddAdmin extends TestCase
{

    public function testPDO()
    {
        $pdo = new PDO(
            "sqlite:$_SERVER[DOCUMENT_ROOT]/crow-anime.sqlite",
        ); 
        
        $this->assertEquals($pdo, Database::getDatabase()->getPDO());

    }

    public function testAddAdmin()
    {
        $anime = Anime::build(
            'anime_title_en',
            'anime_title_ja',
            'anime_finish',
            'anime_synopsis',
            'anime_season',
            'anime_studio',
            'anime_date'
        );
        $anime->sendDatabase();

        $last_anime = Database::getDatabase()->query(
            "SELECT * FROM anime ORDER BY id_anime DESC"
        )[0];

        $this->assertEquals( (array) $anime, $last_anime);
    }
}