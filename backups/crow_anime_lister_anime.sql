create table lister_anime
(
    id_anime                   int        not null,
    id_user                    int        not null,
    add_date                   date       null,
    score                      int        null,
    user_finish_anime          tinyint(1) null,
    user_number_episode_finish int        null,
    primary key (id_anime, id_user),
    constraint lister_anime_ibfk_1
        foreign key (id_anime) references anime (id_anime),
    constraint lister_anime_ibfk_2
        foreign key (id_user) references _user (id_user)
);

create index id_user
    on lister_anime (id_user);

INSERT INTO `crow-anime`.lister_anime (id_anime, id_user, add_date, score, user_finish_anime, user_number_episode_finish) VALUES (25, 2, '2022-05-07', 2, null, null);
INSERT INTO `crow-anime`.lister_anime (id_anime, id_user, add_date, score, user_finish_anime, user_number_episode_finish) VALUES (25, 8, null, null, null, null);
INSERT INTO `crow-anime`.lister_anime (id_anime, id_user, add_date, score, user_finish_anime, user_number_episode_finish) VALUES (26, 1, '2022-04-17', 2, 0, 2);
INSERT INTO `crow-anime`.lister_anime (id_anime, id_user, add_date, score, user_finish_anime, user_number_episode_finish) VALUES (26, 2, '2022-05-07', 10, null, null);
INSERT INTO `crow-anime`.lister_anime (id_anime, id_user, add_date, score, user_finish_anime, user_number_episode_finish) VALUES (26, 3, '2022-04-17', 10, 0, 2);
INSERT INTO `crow-anime`.lister_anime (id_anime, id_user, add_date, score, user_finish_anime, user_number_episode_finish) VALUES (26, 8, null, null, null, null);
INSERT INTO `crow-anime`.lister_anime (id_anime, id_user, add_date, score, user_finish_anime, user_number_episode_finish) VALUES (33, 2, '2022-05-07', 10, null, null);
INSERT INTO `crow-anime`.lister_anime (id_anime, id_user, add_date, score, user_finish_anime, user_number_episode_finish) VALUES (33, 8, null, null, null, null);
INSERT INTO `crow-anime`.lister_anime (id_anime, id_user, add_date, score, user_finish_anime, user_number_episode_finish) VALUES (34, 2, '2022-05-07', 4, null, null);
INSERT INTO `crow-anime`.lister_anime (id_anime, id_user, add_date, score, user_finish_anime, user_number_episode_finish) VALUES (34, 8, null, null, null, null);
INSERT INTO `crow-anime`.lister_anime (id_anime, id_user, add_date, score, user_finish_anime, user_number_episode_finish) VALUES (35, 2, '2022-05-06', 7, null, null);
INSERT INTO `crow-anime`.lister_anime (id_anime, id_user, add_date, score, user_finish_anime, user_number_episode_finish) VALUES (35, 8, null, null, null, null);
INSERT INTO `crow-anime`.lister_anime (id_anime, id_user, add_date, score, user_finish_anime, user_number_episode_finish) VALUES (36, 2, '2022-05-06', 3, null, null);
INSERT INTO `crow-anime`.lister_anime (id_anime, id_user, add_date, score, user_finish_anime, user_number_episode_finish) VALUES (36, 8, null, null, null, null);
INSERT INTO `crow-anime`.lister_anime (id_anime, id_user, add_date, score, user_finish_anime, user_number_episode_finish) VALUES (37, 2, '2022-05-06', 7, null, null);
INSERT INTO `crow-anime`.lister_anime (id_anime, id_user, add_date, score, user_finish_anime, user_number_episode_finish) VALUES (37, 3, '2022-04-17', 9, 1, 13);
INSERT INTO `crow-anime`.lister_anime (id_anime, id_user, add_date, score, user_finish_anime, user_number_episode_finish) VALUES (37, 8, null, null, null, null);
INSERT INTO `crow-anime`.lister_anime (id_anime, id_user, add_date, score, user_finish_anime, user_number_episode_finish) VALUES (38, 8, null, null, null, null);
INSERT INTO `crow-anime`.lister_anime (id_anime, id_user, add_date, score, user_finish_anime, user_number_episode_finish) VALUES (46, 8, null, null, null, null);
INSERT INTO `crow-anime`.lister_anime (id_anime, id_user, add_date, score, user_finish_anime, user_number_episode_finish) VALUES (48, 1, '0000-00-00', 8, 0, 3);
INSERT INTO `crow-anime`.lister_anime (id_anime, id_user, add_date, score, user_finish_anime, user_number_episode_finish) VALUES (48, 2, '0000-00-00', 8, 0, 3);
INSERT INTO `crow-anime`.lister_anime (id_anime, id_user, add_date, score, user_finish_anime, user_number_episode_finish) VALUES (48, 8, null, null, null, null);
