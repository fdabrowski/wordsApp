DROP TABLE user, zestaw, wynik, uprawnienia, rola, podkategoria, konto, kategoria, jezyk;

CREATE TABLE user (
    id SERIAL NOT NULL PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password_hash VARCHAR(50) NOT NULL,
    password_reset_token VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    auth_key VARCHAR(50) NOT NULL,
    status INTEGER,
    created_at INTEGER,
    updated_at INTEGER,
    password VARCHAR(50) NOT NULL
);

CREATE TABLE jezyk (
  id SERIAL NOT NULL PRIMARY KEY,
  nazwa VARCHAR(50) NOT NULL
);

CREATE TABLE kategoria  (
  id SERIAL NOT NULL PRIMARY KEY,
  nazwa VARCHAR(50) NOT NULL,
  opis TEXT NOT NULL,
  obrazek BLOB NULL
);

CREATE TABLE podkategoria (
  id SERIAL NOT NULL PRIMARY KEY,
  kategoria_id INTEGER NOT NULL REFERENCES kategoria(id),
  nazwa VARCHAR(50) NOT NULL,
  opis TEXT NOT NULL,
  obrazek BLOB NULL
);

CREATE TABLE konto (
  id SERIAL NOT NULL PRIMARY KEY,
  rola_id INTEGER NOT NULL REFERENCES rola(id),
  imie VARCHAR(20) NOT NULL,
  nazwisko VARCHAR(30) NOT NULL,
  email VARCHAR(50) NOT NULL,
  login VARCHAR(50) NOT NULL,
  haslo VARCHAR(50) NOT NULL
);

CREATE TABLE rola (
  id SERIAL NOT NULL PRIMARY KEY,
  nazwa VARCHAR(50) NOT NULL,
  opis VARCHAR(300) NOT NULL
);

CREATE TABLE uprawnienia (
  konto_id INTEGER NOT NULL REFERENCES konto(id),
  podkategoria_id INTEGER NOT NULL REFERENCES podkategoria(id),
  PRIMARY KEY(konto_id, podkategoria_id)
);

CREATE TABLE wynik (
  id SERIAL NOT NULL PRIMARY KEY,
  konto_id INTEGER NOT NULL REFERENCES konto(id),
  zestaw_id INTEGER NOT NULL REFERENCES zestaw(id),
  data_wyniku DATE NOT NULL,
  wynik INTEGER NOT NULL
);

CREATE TABLE zestaw (
  id SERIAL NOT NULL,
  konto_id INTEGER NOT NULL REFERENCES konto(id),
  jezyk1_id INTEGER NOT NULL REFERENCES jezyk(id),
  jezyk2_id INTEGER NOT NULL REFERENCES jezyk(id),
  podkategoria_id INTEGER NOT NULL REFERENCES podkategoria(id),
  nazwa VARCHAR(200) NOT NULL,
  zestaw TEXT NOT NULL,
  ilosc_slowek INTEGER NOT NULL,
  data_dodania DATE NOT NULL,
  data_edycji DATE NULL
);

alter table jezyk convert to character set utf8 COLLATE utf8_polish_ci;
alter table kategoria convert to character set utf8 COLLATE utf8_polish_ci;
alter table podkategoria convert to character set utf8 COLLATE utf8_polish_ci;
alter table konto convert to character set utf8 COLLATE utf8_polish_ci;
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
INSERT INTO jezyk(nazwa) values('polski');

INSERT INTO rola(nazwa,opis) values('Użytkownik zarejestrowany','-');
INSERT INTO rola(nazwa,opis) values('Redaktor','-');
INSERT INTO rola(nazwa,opis) values('Super Redaktor','-');
INSERT INTO rola(nazwa,opis) values('Administrator','-');

INSERT INTO zestaw(podkategoria_id, nazwa, zestaw, ilosc_slowek) values(1, 'Zestaw 1', 'widelec;fork nóż;knife szuflada;drawer piekarnik;cooker miska;bowl', 5);
INSERT INTO zestaw(podkategoria_id, nazwa, zestaw, ilosc_slowek) values(1, 'Zestaw 2', 'lodówka;fridge zlew;sink półka;shelf łyżka;spoon zamrażarka;freezer', 5);
