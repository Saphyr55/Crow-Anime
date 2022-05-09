<?php

use CrowAnime\App;

require_once './vendor/autoload.php';

App::start();

$app = new App(
        CrowAnime\Modules\ErrorModule::getModule(),
        CrowAnime\Modules\HomeModule::getModule(),
        CrowAnime\Modules\NewsModule::getModule(),
        CrowAnime\Modules\SearchModule::getModule(),

        CrowAnime\Modules\Profile\UserListAnimeModule::getModule(),
        CrowAnime\Modules\Profile\UserListMangaModule::getModule(),
        CrowAnime\Modules\AnimesModule::getModule(),
        CrowAnime\Modules\MangasModule::getModule(),

        // Auths
        CrowAnime\Modules\SignupModule::getModule(),
        CrowAnime\Modules\LoginModule::getModule(),
        CrowAnime\Modules\LogoutModule::getModule(),

        // Admin
        CrowAnime\Modules\Admin\AdminModule::getModule(),
        CrowAnime\Modules\Admin\AddAnimeModule::getModule(),
        CrowAnime\Modules\Admin\AddMangaModule::getModule(),
        CrowAnime\Modules\Admin\AddCharacterModule::getModule(),

        CrowAnime\Modules\Profile\UserProfileModule::getModule(),
        CrowAnime\Modules\ProfileAnimeModule::getModule(),
        CrowAnime\Modules\ProfileMangaModule::getModule(),
        CrowAnime\Modules\Ajax\AjaxModule::getModule(),
        CrowAnime\Modules\CharacterModule::getModule(),

);
$app->run();

