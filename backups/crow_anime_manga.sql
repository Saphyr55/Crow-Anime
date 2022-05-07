create table manga
(
    id_manga       int          not null
        primary key,
    manga_title_ja varchar(250) null,
    manga_title_en varchar(250) null,
    manga_date     date         null,
    manga_finish   tinyint(1)   null,
    manga_author   varchar(250) null,
    manga_edition  varchar(250) null,
    manga_synopsis text         null,
    manga_volumes  int          null
);

INSERT INTO `crow-anime`.manga (id_manga, manga_title_ja, manga_title_en, manga_date, manga_finish, manga_author, manga_edition, manga_synopsis, manga_volumes) VALUES (1, 'Berserk', 'Berserk', '1985-08-22', 0, 'Miura Kentarou ', 'Young Animal', null, 41);
INSERT INTO `crow-anime`.manga (id_manga, manga_title_ja, manga_title_en, manga_date, manga_finish, manga_author, manga_edition, manga_synopsis, manga_volumes) VALUES (3, 'Grand Blue Dreaming', 'Grand Blue', '2014-04-07', 0, 'Inoue, Kenji (Story), Yoshioka, Kimitake (Art)', 'good! Afternoon', 'Among the seaside town of Izu''s ocean waves and rays of shining sun, Iori Kitahara is just beginning his freshman year at Izu University. As he moves into his uncle''s scuba diving shop, Grand Blue, he eagerly anticipates his dream college life, filled with beautiful girls and good friends.

But things don''t exactly go according to plan. Upon entering the shop, he encounters a group of rowdy, naked upperclassmen, who immediately coerce him into participating in their alcoholic activities. Though unwilling at first, Iori quickly gives in and becomes the heart and soul of the party. Unfortunately, this earns him the scorn of his cousin, Chisa Kotegawa, who walks in at precisely the wrong time. Undeterred, Iori still vows to realize his ideal college life, but will things go according to plan this time, or will his situation take yet another dive?', null);
