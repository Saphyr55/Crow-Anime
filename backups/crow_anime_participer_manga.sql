create table participer_manga
(
    id_character int not null,
    id_manga     int not null,
    primary key (id_character, id_manga),
    constraint participer_manga_ibfk_1
        foreign key (id_character) references _character (id_character),
    constraint participer_manga_ibfk_2
        foreign key (id_manga) references manga (id_manga)
);

create index id_manga
    on participer_manga (id_manga);

