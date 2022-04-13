CREATE TABLE anime(
  id_anime INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  anime_title_en VARCHAR(250) NOT NULL,
  anime_title_ja VARCHAR(250) NOT NULL,
  anime_finish BOOLEAN NOT NULL,
  anime_season VARCHAR(250),
  anime_synopsis TEXT,
  anime_studio VARCHAR(250),
  anime_score DECIMAL(15, 2),
  anime_date DATETIME
);
CREATE TABLE _character(
  id_character INTEGER PRIMARY KEY NOT NULL,
  name_character VARCHAR(250)
);
CREATE TABLE _user(
  id_user INTEGER PRIMARY KEY NOT NULL,
  username VARCHAR(250) NOT NULL,
  password VARCHAR(250) NOT NULL,
  user_date TIMESTAMP,
  is_admin BOOLEAN,
  email VARCHAR(250) NOT NULL,
  UNIQUE(username),
  UNIQUE(email)
);
CREATE TABLE episode(
  id_episode INTEGER PRIMARY KEY  NOT NULL,
  episode_date DATETIME,
  episode_duration TIME,
  id_anime INTEGER NOT NULL,
  FOREIGN KEY(id_anime) REFERENCES anime(id_anime)
);
CREATE TABLE news(
  id_news INTEGER PRIMARY KEY NOT NULL,
  news_title VARCHAR(250),
  news_date DATETIME
);
CREATE TABLE manga(
  id_manga INTEGER PRIMARY KEY NOT NULL,
  manga_title VARCHAR(250),
  manga_date DATETIME,
  manga_finish BOOLEAN,
  manga_author VARCHAR(250),
  manga_edition VARCHAR(250)
);
CREATE TABLE chapter(
  id_chapter INTEGER PRIMARY KEY NOT NULL,
  chapter_date DATETIME,
  id_manga INTEGER NOT NULL,
  FOREIGN KEY(id_manga) REFERENCES manga(id_manga)
);
CREATE TABLE participer(
  id_anime INTEGER,
  id_character INTEGER,
  id_manga INTEGER,
  PRIMARY KEY(id_anime, id_character, id_manga),
  FOREIGN KEY(id_anime) REFERENCES anime(id_anime),
  FOREIGN KEY(id_character) REFERENCES _character(id_character),
  FOREIGN KEY(id_manga) REFERENCES manga(id_manga)
);
CREATE TABLE faire(
  id_user INTEGER,
  id_news INTEGER,
  PRIMARY KEY(id_user, id_news),
  FOREIGN KEY(id_user) REFERENCES _user(id_user),
  FOREIGN KEY(id_news) REFERENCES news(id_news)
);
CREATE TABLE lister_anime(
  id_anime INTEGER,
  id_user INTEGER,
  add_date DATETIME,
  score INTEGER,
  user_finish_anime BOOLEAN,
  user_number_episode_finish INTEGER,
  PRIMARY KEY(id_anime, id_user),
  FOREIGN KEY(id_anime) REFERENCES anime(id_anime),
  FOREIGN KEY(id_user) REFERENCES _user(id_user)
);
CREATE TABLE lister_manga(
  id_user INTEGER,
  id_manga INTEGER,
  add_date DATETIME,
  score INTEGER,
  user_finish_manga BOOLEAN,
  user_number_chapter_finish INTEGER,
  PRIMARY KEY(id_user, id_manga),
  FOREIGN KEY(id_user) REFERENCES _user(id_user),
  FOREIGN KEY(id_manga) REFERENCES manga(id_manga)
);
