CREATE TABLE user (
    id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password_hash VARCHAR(50) NOT NULL,
    password_reset_token VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    auth_key VARCHAR(50) NOT NULL,
    status INTEGER,
    created_at INTEGER,
    updated_at INTEGER,
    password VARCHAR(50) NOT NULL,
	PRIMARY KEY(id)
);

CREATE TABLE jezyk (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nazwa VARCHAR(50) NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE kategoria  (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nazwa VARCHAR(50) NOT NULL,
  opis TEXT NOT NULL,
  obrazek BLOB NULL,
  PRIMARY KEY(id)
);

CREATE TABLE podkategoria (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  kategoria_id INTEGER UNSIGNED NOT NULL ,
  nazwa VARCHAR(50) NOT NULL,
  opis TEXT NOT NULL,
  obrazek BLOB NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (kategoria_id) REFERENCES kategoria(id)
);

CREATE TABLE rola (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nazwa VARCHAR(50) NOT NULL,
  opis VARCHAR(300) NOT NULL,
  PRIMARY KEY(id)
);

-- CREATE TABLE konto (
--   id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
--   rola_id INTEGER UNSIGNED NOT NULL,
--   imie VARCHAR(20) NOT NULL,
--   nazwisko VARCHAR(30) NOT NULL,
--   email VARCHAR(50) NOT NULL,
--   login VARCHAR(50) NOT NULL,
--   haslo VARCHAR(50) NOT NULL,
--   PRIMARY KEY(id),
--   FOREIGN KEY (rola_id) REFERENCES rola(id)
-- );


CREATE TABLE uprawnienia (
  konto_id INTEGER NOT NULL,
  podkategoria_id INTEGER NOT NULL,
  PRIMARY KEY(konto_id, podkategoria_id)
);

CREATE TABLE uprawnienia (
  user_id INTEGER UNSIGNED NOT NULL,
  podkategoria_id INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(user_id, podkategoria_id),
  FOREIGN KEY (user_id) REFERENCES user(id),
  FOREIGN KEY (podkategoria_id) REFERENCES podkategoria(id)
);

CREATE TABLE IF NOT EXISTS `user` (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(255) NOT NULL,
  auth_key varchar(32) NOT NULL,
  password_hash varchar(255) NOT NULL,
  password_reset_token varchar(255) NOT NULL,
  email varchar(100) NOT NULL,
  status smallint(10) NOT NULL,
  'role' int(11) NOT NULL,
  created_at int(11) NOT NULL,
  updated_at int(11) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (role) REFERENCES rola(id)
);

CREATE TABLE zestaw (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  user_id INTEGER UNSIGNED NOT NULL,
  jezyk1_id INTEGER UNSIGNED NOT NULL,
  jezyk2_id INTEGER UNSIGNED NOT NULL,
  podkategoria_id INTEGER UNSIGNED NOT NULL,
  nazwa VARCHAR(200) NOT NULL,
  zestaw TEXT NOT NULL,
  ilosc_slowek INTEGER NOT NULL,
  data_dodania DATE NOT NULL,
  data_edycji DATE NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (user_id) REFERENCES `user`(id),
  FOREIGN KEY (jezyk1_id) REFERENCES jezyk(id),
  FOREIGN KEY (jezyk2_id) REFERENCES jezyk(id),
  FOREIGN KEY (podkategoria_id) REFERENCES podkategoria(id)
);

CREATE TABLE wynik (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  user_id INTEGER UNSIGNED NOT NULL ,
  zestaw_id INTEGER UNSIGNED NOT NULL ,
  data_wyniku DATE NOT NULL,
  wynik INTEGER NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (user_id) REFERENCES `user`(id),
  FOREIGN KEY (zestaw_id) REFERENCES zestaw(id)
);



alter table jezyk convert to character set utf8 COLLATE utf8_polish_ci;
alter table kategoria convert to character set utf8 COLLATE utf8_polish_ci;
alter table podkategoria convert to character set utf8 COLLATE utf8_polish_ci;
alter table rola convert to character set utf8 COLLATE utf8_polish_ci;
alter table uprawnienia convert to character set utf8 COLLATE utf8_polish_ci;
alter table wynik convert to character set utf8 COLLATE utf8_polish_ci;
alter table zestaw convert to character set utf8 COLLATE utf8_polish_ci;

INSERT INTO kategoria(nazwa,opis,obrazek) VALUES('Pomieszczenia','Zestaw wyrazów związanych z konkretnym pomieszczeniem','pomieszczenia.jpg');
INSERT INTO kategoria(nazwa,opis,obrazek) VALUES('Nauka','Zestaw wyrazów związanych z nauką','nauka.jpg');
INSERT INTO kategoria(nazwa,opis,obrazek) VALUES('Sport','Zestaw wyrazów związanych ze sportem','sport.jpg');
INSERT INTO kategoria(nazwa,opis,obrazek) VALUES('Pogoda','Zestaw wyrazów opisujących pogodę','pogoda.jpg');

INSERT INTO podkategoria(kategoria_id,nazwa,opis,obrazek) VALUES(1,'Kuchnia','Zestaw wyrazów zwiazanych z kuchnią','pomieszczenia.jpg');
INSERT INTO podkategoria(kategoria_id,nazwa,opis,obrazek) VALUES(1,'Lazienka','Zestaw wyrazów zwiazanych z łazienką','pomieszczenia.jpg');
INSERT INTO podkategoria(kategoria_id,nazwa,opis,obrazek) VALUES(1,'Sypialnia', 'Zestaw wyrazów zwiazanych z sypialnią','pomieszczenia.jpg');
INSERT INTO podkategoria(kategoria_id,nazwa,opis,obrazek) VALUES(1,'Salon','Zestaw wyrazów zwiazanych z salonem','pomieszczenia.jpg');

INSERT INTO podkategoria(kategoria_id,nazwa,opis,obrazek) VALUES(2,'Matematyka','Zestaw wyrazów zwiazanych z matematyką','matematyka.jpg');
INSERT INTO podkategoria(kategoria_id,nazwa,opis,obrazek) VALUES(2,'Biologia','Zestaw wyrazów zwiazanych z biologią','biologia.jpg');
INSERT INTO podkategoria(kategoria_id,nazwa,opis,obrazek) VALUES(2,'Geografia','Zestaw wyrazów zwiazanych z geografią','geografia.jpg');
INSERT INTO podkategoria(kategoria_id,nazwa,opis,obrazek) VALUES(2,'Chemia','Zestaw wyrazów zwiazanych z chemią','chemia.jpg');

INSERT INTO podkategoria(kategoria_id,nazwa,opis,obrazek) VALUES(3,'Sporty drużynowe','Zestaw wyrazów zwiazanych z konkretnym pomieszczeniem','drużynowe.jpg');
INSERT INTO podkategoria(kategoria_id,nazwa,opis,obrazek) VALUES(3,'Sporty wodne','Zestaw wyrazów zwiazanych z konkretnym pomieszczeniem','wodne.jpg');
INSERT INTO podkategoria(kategoria_id,nazwa,opis,obrazek) VALUES(3,'Lekkoatletyka','Zestaw wyrazów zwiazanych z konkretnym pomieszczeniem','lekkoatletyka.jpg');

INSERT INTO podkategoria(kategoria_id,nazwa,opis,obrazek) VALUES(4,'Przyjemna','Opis przedmiotów zwiazanych z konkretnym pomieszczeniem','pomieszczenia.jpg');
INSERT INTO podkategoria(kategoria_id,nazwa,opis,obrazek) VALUES(4,'Nieprzyjemna','Opis przedmiotów zwiazanych z konkretnym pomieszczeniem','pomieszczenia.jpg');
INSERT INTO podkategoria(kategoria_id,nazwa,opis,obrazek) VALUES(4,'Klęski żywiołowe','Opis przedmiotów zwiazanych z konkretnym pomieszczeniem','pomieszczenia.jpg');

INSERT INTO jezyk(nazwa) values('polski');
INSERT INTO jezyk(nazwa) values('angielski');

INSERT INTO rola(nazwa,opis) values('Użytkownik zarejestrowany','-');
INSERT INTO rola(nazwa,opis) values('Redaktor','-');
INSERT INTO rola(nazwa,opis) values('Super Redaktor','-');
INSERT INTO rola(nazwa,opis) values('Administrator','-');

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '', '$2y$13$uqe3LPW9ya3RZhynJpPN5um9fvdxUmoqjOqQBJDdIDXSKxRZB5bPu', '', '', 10, 0, 0, 0);

INSERT INTO zestaw(user_id, jezyk1_id, jezyk2_id, podkategoria_id, nazwa, zestaw, ilosc_slowek, data_dodania, data_edycji) VALUES ('1','1','2','1','kolory','blue;niebieski czerwony;red','2','12.12.2012','14.12.2012');

