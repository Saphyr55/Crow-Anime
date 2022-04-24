<?php

use CrowAnime\App;

require_once './vendor/autoload.php';

App::start();

$app = new App(
        CrowAnime\Modules\ErrorModule::getModule(),
        CrowAnime\Modules\HomeModule::getModule(),
        CrowAnime\Modules\Profile\UserListAnimeModule::getModule(),
        CrowAnime\Modules\Profile\UserListMangaModule::getModule(),
        CrowAnime\Modules\AnimesModule::getModule(),
        CrowAnime\Modules\MangasModule::getModule(),
        CrowAnime\Modules\SignupModule::getModule(),
        CrowAnime\Modules\LoginModule::getModule(),
        CrowAnime\Modules\LogoutModule::getModule(),
        CrowAnime\Modules\Admin\AddAnimeModule::getModule(),
        CrowAnime\Modules\Admin\AddMangaModule::getModule(),
        CrowAnime\Modules\Profile\UserProfileModule::getModule(),
        CrowAnime\Modules\NewsModule::getModule()
);
$app->run();

