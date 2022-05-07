create table faire
(
    id_user int not null,
    id_news int not null,
    primary key (id_user, id_news),
    constraint faire_ibfk_1
        foreign key (id_user) references _user (id_user),
    constraint faire_ibfk_2
        foreign key (id_news) references news (id_news)
);

create index id_news
    on faire (id_news);

