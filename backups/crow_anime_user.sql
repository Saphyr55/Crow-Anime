create table _user
(
    id_user   int                                   not null
        primary key,
    username  varchar(250)                          not null,
    password  varchar(250)                          not null,
    user_date timestamp default current_timestamp() not null on update current_timestamp(),
    is_admin  tinyint(1)                            null,
    email     varchar(250)                          not null,
    constraint email
        unique (email),
    constraint username
        unique (username)
);

INSERT INTO `crow-anime`._user (id_user, username, password, user_date, is_admin, email) VALUES (1, 'Saphyr', '$2y$10$FRo1LBOMkQaf0iOZsQqaO.GMkdejejvEN4YYjj76nCT2C0fwUzV6.', '2022-03-29 00:00:00.0', 0, 'test@test.com');
INSERT INTO `crow-anime`._user (id_user, username, password, user_date, is_admin, email) VALUES (2, 'SaphyrAdmin', '$2y$10$U2PrDmS/AX8k2vU7ut2rCum22W9y/5vlzBuQUNj1UPMcFGqn9d0.6', '2022-03-29 00:00:00.0', 1, 'test@test1.com');
INSERT INTO `crow-anime`._user (id_user, username, password, user_date, is_admin, email) VALUES (3, 'Saphyr1', '$2y$10$HmjEdknsXPwR6NR2x2gjRuH.Pz8AHs/x.aNv8wi.SumX9v7zYs0Py', '2022-05-06 11:39:20.0', 0, 'test@test3.com');
INSERT INTO `crow-anime`._user (id_user, username, password, user_date, is_admin, email) VALUES (4, 'Saphyr5', '$2y$10$msOTRKP20bUtVFWoem33E.yaqqtGwUee1XwGmE8sWedbQFPUUkeES', '2022-05-06 11:39:20.0', 0, 'test5@gmail.com');
INSERT INTO `crow-anime`._user (id_user, username, password, user_date, is_admin, email) VALUES (5, 'Saphyr155', '$2y$10$ym8pd2C01S93.X3KIZPzs.BuzllwXHteXzFLFhuJb4vlawWIkUfA6', '2022-05-06 11:39:20.0', 0, 'test@test5.com');
INSERT INTO `crow-anime`._user (id_user, username, password, user_date, is_admin, email) VALUES (6, 'Saphyr14', '$2y$10$Y04wdNI6iwrZQ0z.hoOVAOUZ3AZEiey3LYt4PQvE1BOvOKFViz3HK', '2022-05-06 11:39:20.0', 0, 'test44@test.com');
INSERT INTO `crow-anime`._user (id_user, username, password, user_date, is_admin, email) VALUES (7, 'Saphyr15', '$2y$10$cvwFjBGCtFbs0OQqdgxUi.lY3V.Qhqi0vi7WjARTqjZViw54pygmi', '2022-05-06 11:39:20.0', 0, 'test15@test.pf');
INSERT INTO `crow-anime`._user (id_user, username, password, user_date, is_admin, email) VALUES (8, 'MangaAnimeList', '$2y$10$iXqpccAv0BuAag3yn3vteerVxqK.zHbnJM71tKBP1utEmM/l8nQwi', '2022-05-06 11:50:42.0', 0, 'test@crow-anime.com');
