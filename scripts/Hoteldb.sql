DROP DATABASE IF EXISTS HotelDB;
CREATE DATABASE HotelDB;
USE HotelDB;

CREATE TABLE CustomerAccount
(
    accountid VARCHAR(100) NOT NULL,
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
    resid     VARCHAR(50) NOT NULL,
    accountid VARCHAR(50) NOT NULL,
    firstname VARCHAR(30),
    lastname  VARCHAR(30),
    email     VARCHAR(30),
    startdate DATE NOT NULL,
    enddate   DATE NOT NULL,
    bookingtype VARCHAR(30) NOT NULL,
    numadults INT NOT NULL,
    numchildren INT NOT NULL,

    cardnum VARCHAR(30) NOT NULL,
    CV INT NOT NULL,
    ExpirationDate DATE,

    PRIMARY KEY(accountid, resid),
    FOREIGN KEY(accountid) REFERENCES CustomerAccount(accountid)
);

/*
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

*/

CREATE TABLE Room
(
    roomnum INT NOT NULL,
    roomtype VARCHAR(30) NOT NULL,
    price decimal(10,2) NOT NULL,
    PRIMARY KEY(roomnum, roomtype)
);


CREATE TABLE Adminuser
(
    adminid VARCHAR(10),
    username VARCHAR(20),
    password VARCHAR(20),
    PRIMARY KEY(adminid)
);

INSERT INTO Adminuser VALUES ('ADMIN01', 'adminuser', 'admin12345');
INSERT INTO Adminuser VALUES ('ADMIN02', 'adminuser', 'password123');


INSERT INTO CustomerAccount VALUES ("123", "BOB", "Brown","123@db.com","Male", "2017-04-24","Bobb", "123456", "67545336");
