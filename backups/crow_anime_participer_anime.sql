create table participer_anime
(
    id_anime     int not null,
    id_character int not null,
    primary key (id_anime, id_character),
    constraint participer_anime_ibfk_1
        foreign key (id_anime) references anime (id_anime),
    constraint participer_anime_ibfk_2
        foreign key (id_character) references _character (id_character)
);

create index id_character
    on participer_anime (id_character);

