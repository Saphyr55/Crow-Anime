CREATE TABLE _character(
  id_character INTEGER PRIMARY KEY NOT NULL,
  name_character VARCHAR(250)
);
CREATE TABLE episode(
  id_episode INTEGER PRIMARY KEY NOT NULL,
  episode_date DATE,
  episode_duration TIME,
  id_anime INTEGER NOT NULL,
  FOREIGN KEY(id_anime) REFERENCES anime(id_anime)
);
CREATE TABLE news(
  id_news INTEGER PRIMARY KEY NOT NULL,
  news_title VARCHAR(250),
  news_date DATETIME
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
  add_date DATE,
  score INTEGER,
  user_finish_anime BOOLEAN,
  user_number_episode_finish INTEGER,
  PRIMARY KEY(id_anime, id_user),
  FOREIGN KEY(id_anime) REFERENCES anime(id_anime),
  FOREIGN KEY(id_user) REFERENCES _user(id_user)
);
INSERT INTO lister_anime VALUES(26,3,'2022-04-17',10,0,2);
INSERT INTO lister_anime VALUES(37,3,'2022-04-17',9,1,13);
INSERT INTO lister_anime VALUES(26,1,'2022-04-17',2,0,2);
INSERT INTO lister_anime VALUES(48,2,1999,10,0,3);
INSERT INTO lister_anime VALUES(48,1,1999,8,0,3);
INSERT INTO lister_anime VALUES(26,2,1999,10,0,3);
CREATE TABLE anime(
  id_anime INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  anime_title_en VARCHAR(250) NOT NULL,
  anime_title_ja VARCHAR(250) NOT NULL,
  anime_finish BOOLEAN NOT NULL,
  anime_season VARCHAR(250),
  anime_synopsis TEXT,
  anime_studio VARCHAR(250),
  anime_date DATETIME
);
INSERT INTO anime VALUES(25,'The Rising of the Shield Hero Season 2','Tate no Yuusha no Nariagari Season 2',0,'SPRING','','Kinema Citrus','2022-04-06');
INSERT INTO anime VALUES(26,'Spy x Family','Spy x Family',0,'SPRING','','Wit Studio','2022-04-09');
INSERT INTO anime VALUES(33,'Kaguya-sama: Love Is War - Ultra Romantic','Kaguya-sama wa Kokurasetai: Ultra Romantic',0,'SPRING','','A-1 Pictures','2022-04-09');
INSERT INTO anime VALUES(34,'Shikimori''s Not Just a Cutie','Kawaii dake ja Nai Shikimori-san',0,'SPRING','','Doga Kobo','2022-04-01');
INSERT INTO anime VALUES(35,'Komi Can''t Communicate','Komi-san wa, Comyushou desu. 2nd Season',0,'SPRING','','OLM','2022-04-07');
INSERT INTO anime VALUES(36,'Date A Live IV','Date A Live IV',0,'SPRING','','GEEK TOYS','2022-04-08');
INSERT INTO anime VALUES(37,'My Teen Romantic Comedy SNAFU','Yahari Ore no Seishun Love Comedy wa Machigatteiru.',1,'SPRING','','Brain''s Base','2013-04-05');
INSERT INTO anime VALUES(38,'Aharen-san wa Hakarenai','Aharen-san wa Hakarenai',0,'SPRING','','Felix Film','2022-04-02');
INSERT INTO anime VALUES(46,'I''m Quitting Heroing','Yuusha, Yamemasu',0,'SPRING','','EMT Squared','2022-04-05');
INSERT INTO anime VALUES(48,'Paripi Koumei','Ya Boy Kongming!',0,'SPRING','','P.A. Works','2022-04-05');
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
INSERT INTO _user VALUES(1,'Saphyr','$2y$10$FRo1LBOMkQaf0iOZsQqaO.GMkdejejvEN4YYjj76nCT2C0fwUzV6.','2022-03-29',0,'test@test.com');
INSERT INTO _user VALUES(2,'SaphyrAdmin','$2y$10$U2PrDmS/AX8k2vU7ut2rCum22W9y/5vlzBuQUNj1UPMcFGqn9d0.6','2022-03-29',1,'test@test1.com');
INSERT INTO _user VALUES(3,'Saphyr1','$2y$10$HmjEdknsXPwR6NR2x2gjRuH.Pz8AHs/x.aNv8wi.SumX9v7zYs0Py',NULL,0,'test@test3.com');
INSERT INTO _user VALUES(4,'Saphyr5','$2y$10$msOTRKP20bUtVFWoem33E.yaqqtGwUee1XwGmE8sWedbQFPUUkeES',NULL,0,'test5@gmail.com');
INSERT INTO _user VALUES(5,'Saphyr155','$2y$10$ym8pd2C01S93.X3KIZPzs.BuzllwXHteXzFLFhuJb4vlawWIkUfA6',NULL,0,'test@test5.com');
INSERT INTO _user VALUES(6,'Saphyr14','$2y$10$Y04wdNI6iwrZQ0z.hoOVAOUZ3AZEiey3LYt4PQvE1BOvOKFViz3HK',NULL,0,'test44@test.com');
INSERT INTO _user VALUES(7,'Saphyr15','$2y$10$cvwFjBGCtFbs0OQqdgxUi.lY3V.Qhqi0vi7WjARTqjZViw54pygmi',NULL,0,'test15@test.pf');
CREATE TABLE manga(
  id_manga INTEGER PRIMARY KEY NOT NULL,
  manga_title_ja VARCHAR(250),
  manga_title_en VARCHAR(250),
  manga_date DATE,
  manga_finish BOOLEAN,
  manga_author VARCHAR(250),
  manga_edition VARCHAR(250),
  manga_synopsis TEXT,
  manga_volumes INT
);
INSERT INTO manga VALUES(1,'Berserk','Berserk','1985-08-22',0,'Young Animal','Miura Kentarou',NULL,41);
CREATE TABLE lister_manga(
  id_user INTEGER,
  id_manga INTEGER,
  add_date DATE,
  score INTEGER,
  user_finish_manga BOOLEAN,
  user_number_volume_finish INTEGER,
  PRIMARY KEY(id_user, id_manga),
  FOREIGN KEY(id_user) REFERENCES _user(id_user),
  FOREIGN KEY(id_manga) REFERENCES manga(id_manga)
);
INSERT INTO lister_manga VALUES(3,1,'2022-04-17',10,0,49);
CREATE TABLE volumes(
  id_volume INTEGER PRIMARY KEY NOT NULL,
  volume_date DATE,
  id_manga INTEGER NOT NULL,
  FOREIGN KEY(id_manga) REFERENCES manga(id_manga)
);
DELETE FROM sqlite_sequence;
INSERT INTO sqlite_sequence VALUES('anime',48);