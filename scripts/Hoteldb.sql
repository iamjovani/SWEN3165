CREATE DATABASE HotelDB;
USE HotelDB;

CREATE TABLE CustomerAccount
(
    accountid INT AUTO_INCREMENT NOT NULL,
    firstname VARCHAR(20) NOT NULL,
    lastname  VARCHAR(20) NOT NULL,
    email     VARCHAR(30) NOT NULL,
    gender    VARCHAR(6) NOT NULL ,
    dateofbirth DATE,
    username  VARCHAR(10) NOT NULL,
    password  VARCHAR(30) NOT NULL,
    telephone VARCHAR(10),

    PRIMARY KEY(accountid)
);

CREATE TABLE Reservation
(
    accountid INT NOT NULL,
    startdate DATE NOT NULL,
    enddate   DATE NOT NULL,
    bookingtype VARCHAR(30) NOT NULL,
    numadults INT NOT NULL,
    numchildren INT NOT NULL,
    PRIMARY KEY(accountid),
    FOREIGN KEY(accountid) REFERENCES CustomerAccount(accountid)

);

CREATE TABLE CreditCard
(
    accountid INT NOT NULL,
    name_on_account VARCHAR(40) NOT NULL,
    cardnum INT NOT NULL,
    CV INT NOT NULL,
    ExpirationDate INT NOT NULL,
    PRIMARY KEY(accountid, cardnum),
    FOREIGN KEY(accountid) REFERENCES CustomerAccount(accountid)
);


CREATE TABLE Room
(
    roomnum INT NOT NULL,
    roomtype VARCHAR(30) NOT NULL,
    price decimal(10,2) NOT NULL,
    PRIMARY KEY(roomnum, roomtype)
);
