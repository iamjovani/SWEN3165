DROP DATABASE IF EXISTS HotelDB;
CREATE DATABASE HotelDB;
USE HotelDB;

CREATE TABLE CustomerAccount
(
    accountid INT NOT NULL,
    firstname VARCHAR(20) NOT NULL,
    lastname  VARCHAR(20) NOT NULL,
    email     VARCHAR(30) NOT NULL,
    gender    VARCHAR(10) NOT NULL ,
    dateofbirth DATE NOT NULL,
    username  VARCHAR(30) NOT NULL,
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


-- INSERT INTO CustomerAccount VALUES (123, "BOB", "Brown","123@db.com","Male", "2017-04-24","Bobb", "12345", "67545336");
