create table news
(
    id_news        int          not null
        primary key,
    news_text      text         null,
    news_date      datetime     null,
    news_url_video varchar(255) null
);

INSERT INTO `crow-anime`.news (id_news, news_text, news_date, news_url_video) VALUES (1, 'An anime adaptation of Arknights, titled Arknights: Prelude to Dawn, is currently in production by Yostar Pictures and was announced in October 24, 2021. The anime will adapt the Main Theme, thus making it canon to the Arknights storyline.', '2022-04-25 00:00:00.0', 'https://www.youtube-nocookie.com/embed/NakocJ9Ky0I?controls=0?rel=0');
INSERT INTO `crow-anime`.news (id_news, news_text, news_date, news_url_video) VALUES (2, 'General of the Three Kingdoms, Kongming had struggled his whole life, facing countless battles that made him into the accomplished strategist he was. So on his deathbed, he wished only to be reborn into a peaceful world... and was sent straight to modern-day party-central, Tokyo! Can even a brilliant strategist like Kongming adapt to the wild beats and even wilder party people?!,', '2022-04-25 00:00:00.0', 'https://www.youtube.com/embed/FN4pZixlYPc');
