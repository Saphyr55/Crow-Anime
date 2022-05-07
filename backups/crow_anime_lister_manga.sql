create table lister_manga
(
    id_user                   int        not null,
    id_manga                  int        not null,
    add_date                  date       null,
    score                     int        null,
    user_finish_manga         tinyint(1) null,
    user_number_volume_finish int        null,
    primary key (id_user, id_manga),
    constraint lister_manga_ibfk_1
        foreign key (id_user) references _user (id_user),
    constraint lister_manga_ibfk_2
        foreign key (id_manga) references manga (id_manga)
);

create index id_manga
    on lister_manga (id_manga);

INSERT INTO `crow-anime`.lister_manga (id_user, id_manga, add_date, score, user_finish_manga, user_number_volume_finish) VALUES (2, 1, '2022-05-07', 6, null, null);
INSERT INTO `crow-anime`.lister_manga (id_user, id_manga, add_date, score, user_finish_manga, user_number_volume_finish) VALUES (2, 3, '2022-05-06', 10, null, null);
INSERT INTO `crow-anime`.lister_manga (id_user, id_manga, add_date, score, user_finish_manga, user_number_volume_finish) VALUES (3, 1, '2022-04-17', 10, 0, 49);
INSERT INTO `crow-anime`.lister_manga (id_user, id_manga, add_date, score, user_finish_manga, user_number_volume_finish) VALUES (8, 3, null, null, null, null);
