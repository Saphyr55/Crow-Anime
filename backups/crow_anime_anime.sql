create table anime
(
    id_anime       int auto_increment
        primary key,
    anime_title_en varchar(250) not null,
    anime_title_ja varchar(250) not null,
    anime_finish   tinyint(1)   not null,
    anime_season   varchar(250) null,
    anime_synopsis text         null,
    anime_studio   varchar(250) null,
    anime_date     datetime     null
)
    auto_increment = 49;

INSERT INTO `crow-anime`.anime (id_anime, anime_title_en, anime_title_ja, anime_finish, anime_season, anime_synopsis, anime_studio, anime_date) VALUES (25, 'The Rising of the Shield Hero Season 2', 'Tate no Yuusha no Nariagari Season 2', 0, 'SPRING', '', 'Kinema Citrus', '2022-04-06 00:00:00.0');
INSERT INTO `crow-anime`.anime (id_anime, anime_title_en, anime_title_ja, anime_finish, anime_season, anime_synopsis, anime_studio, anime_date) VALUES (26, 'Spy x Family', 'Spy x Family', 0, 'SPRING', '', 'Wit Studio', '2022-04-09 00:00:00.0');
INSERT INTO `crow-anime`.anime (id_anime, anime_title_en, anime_title_ja, anime_finish, anime_season, anime_synopsis, anime_studio, anime_date) VALUES (33, 'Kaguya-sama: Love Is War - Ultra Romantic', 'Kaguya-sama wa Kokurasetai: Ultra Romantic', 0, 'SPRING', '', 'A-1 Pictures', '2022-04-09 00:00:00.0');
INSERT INTO `crow-anime`.anime (id_anime, anime_title_en, anime_title_ja, anime_finish, anime_season, anime_synopsis, anime_studio, anime_date) VALUES (34, 'Shikimori''s Not Just a Cutie', 'Kawaii dake ja Nai Shikimori-san', 0, 'SPRING', '', 'Doga Kobo', '2022-04-01 00:00:00.0');
INSERT INTO `crow-anime`.anime (id_anime, anime_title_en, anime_title_ja, anime_finish, anime_season, anime_synopsis, anime_studio, anime_date) VALUES (35, 'Komi Can''t Communicate', 'Komi-san wa, Comyushou desu. 2nd Season', 0, 'SPRING', '', 'OLM', '2022-04-07 00:00:00.0');
INSERT INTO `crow-anime`.anime (id_anime, anime_title_en, anime_title_ja, anime_finish, anime_season, anime_synopsis, anime_studio, anime_date) VALUES (36, 'Date A Live IV', 'Date A Live IV', 0, 'SPRING', '', 'GEEK TOYS', '2022-04-08 00:00:00.0');
INSERT INTO `crow-anime`.anime (id_anime, anime_title_en, anime_title_ja, anime_finish, anime_season, anime_synopsis, anime_studio, anime_date) VALUES (37, 'My Teen Romantic Comedy SNAFU', 'Yahari Ore no Seishun Love Comedy wa Machigatteiru.', 1, 'SPRING', '', 'Brain''s Base', '2013-04-05 00:00:00.0');
INSERT INTO `crow-anime`.anime (id_anime, anime_title_en, anime_title_ja, anime_finish, anime_season, anime_synopsis, anime_studio, anime_date) VALUES (38, 'Aharen-san wa Hakarenai', 'Aharen-san wa Hakarenai', 0, 'SPRING', '', 'Felix Film', '2022-04-02 00:00:00.0');
INSERT INTO `crow-anime`.anime (id_anime, anime_title_en, anime_title_ja, anime_finish, anime_season, anime_synopsis, anime_studio, anime_date) VALUES (46, 'I''m Quitting Heroing', 'Yuusha, Yamemasu', 0, 'SPRING', '', 'EMT Squared', '2022-04-05 00:00:00.0');
INSERT INTO `crow-anime`.anime (id_anime, anime_title_en, anime_title_ja, anime_finish, anime_season, anime_synopsis, anime_studio, anime_date) VALUES (48, 'Paripi Koumei', 'Ya Boy Kongming!', 0, 'SPRING', '', 'P.A. Works', '2022-04-05 00:00:00.0');
