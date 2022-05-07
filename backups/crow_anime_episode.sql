create table episode
(
    id_episode       int  not null
        primary key,
    episode_date     date null,
    episode_duration time null,
    id_anime         int  not null,
    constraint episode_ibfk_1
        foreign key (id_anime) references anime (id_anime)
);

create index id_anime
    on episode (id_anime);

