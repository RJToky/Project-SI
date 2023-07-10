create database asiorezim;

\c asiorezim;

create table users (
    idUser serial primary key,
    nomUser varchar,
    prenomUser varchar,
    genreUser int,
    naissanceUser date,
    mailUser varchar,
    mdpUser varchar
);

create table detailUser (
    idDetailUser serial primary key,
    idUser int,
    tailleUser float,
    poidsUser float,
    dateUpdateDetailUser date,
    foreign key (idUser) references users (idUser)
);

