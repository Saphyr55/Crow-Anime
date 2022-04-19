<?php

use CrowAnime\Core\Controller\Controller;
use CrowAnime\Core\Controller\Entities\ControllerHome;
use PHPUnit\Framework\TestCase;
 

class TestHomeController extends TestCase {

    public function test()
    {
        $datas = Controller::with([
            'anime_season' => '2022'
        ]);
        
        extract($datas);
        $this->assertEquals($anime_season, '2022');
    }

}