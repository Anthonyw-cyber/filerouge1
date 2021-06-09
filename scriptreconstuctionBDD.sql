DROP DATABASE IF EXISTS Miyazaki;
CREATE USER IF NOT EXISTS 'anthony' IDENTIFIED BY 'root';
        GRANT ALL PRIVILEGES ON Miyazaki . * TO 'anthony';
         FLUSH PRIVILEGES;
CREATE DATABASE Miyazaki;

USE Miyazaki;

DROP TABLE IF EXISTS  films;
DROP TABLE IF EXISTS heros;
DROP TABLE IF EXISTS genres;
DROP TABLE IF EXISTS genres_films;
CREATE TABLE films
(
    film_id  INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom      VARCHAR(100),
    annee    INT(4),
    note     VARCHAR(100),
    image    VARCHAR(255),
    trailers VARCHAR(255)
)ENGINE=InnoDB;

CREATE TABLE heros
(

    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    noms VARCHAR(100),
    film INT(100),
    description VARCHAR(100),
    role VARCHAR(255)

)ENGINE=InnoDB;

CREATE TABLE genres
(
    genre_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    genre VARCHAR(100),
    UNIQUE (genre)
)ENGINE=InnoDB;
DROP TABLE IF EXISTS genres_films;
CREATE TABLE IF NOT EXISTS genres_films
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `id_films` INT(255) NOT NULL,
    `genres_id` INT(255) DEFAULT NULL


)ENGINE=InnoDB;
DROP TABLE IF EXISTS Hisaishi;
CREATE TABLE Hisaishi
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    film_id INT ,
    music VARCHAR(255)
)ENGINE=InnoDB;



ALTER TABLE heros Add FOREIGN Key (film) REFERENCES films(film_id);
ALTER TABLE genres_films Add FOREIGN Key (id_films) REFERENCES films(film_id) ;
ALTER TABLE genres_films Add FOREIGN Key (genres_id) REFERENCES genres(genre_id);
ALTER TABLE hisaishi Add FOREIGN Key (id) REFERENCES films(film_id);
