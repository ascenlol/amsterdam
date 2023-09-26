DROP DATABASE if EXISTS kradziezrower;
CREATE DATABASE kradziezrower;
USE kradziezrower;

Create  table uzytkownicy(
    ID int PRIMARY KEY AUTO_INCREMENT,
    login varchar(50),
    haslo varchar(50),
    email varchar(50),
    adres varchar(50),
    kod_pocztowy varchar(50),
    telefon int(20),
	admin boolean);

CREATE TABLE kategrie(
    ID int PRIMARY KEY AUTO_INCREMENT,
    nazwa varchar(50));
    
CREATE TABLE produkty(
    ID int PRIMARY KEY AUTO_INCREMENT,
    nazwa varchar(100),
    opis varchar(255),
    cena int(20),
    ID_kategoria int(10),
    ID_sprzedajacy int,
    FOREIGN KEY (ID_sprzedajacy) REFERENCES uzytkownicy(ID),
    FOREIGN KEY (ID_kategoria) REFERENCES kategorie(ID));
    
CREATE TABLE zamowienia(
    ID int PRIMARY KEY AUTO_INCREMENT,
    status_zamowienia varchar(50),
    kiedy_zamowione datetime,
    kiedy_wyslane datetime,
    ID_sprzedajacy int,
    ID_kupujacy int,
     FOREIGN KEY (ID_sprzedajacy) REFERENCES uzytkownicy(ID),
    FOREIGN KEY (ID_kupujacy) REFERENCES uzytkownicy(ID));