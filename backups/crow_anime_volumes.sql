create table volumes
(
    id_volume   int  not null
        primary key,
    volume_date date null,
    id_manga    int  not null,
    constraint volumes_ibfk_1
        foreign key (id_manga) references manga (id_manga)
);

create index id_manga
    on volumes (id_manga);

