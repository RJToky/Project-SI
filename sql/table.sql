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

create table SuperUser (
    idSuperUser serial primary key,
    mailSuperUser varchar,
    mdpSuperUser varchar
);

create table detailUser (
    idDetailUser serial primary key,
    idUser int,
    tailleUser float,
    poidsUser float,
    dateUpdateDetailUser date,
    foreign key (idUser) references users (idUser)
);

create table plat (
    idPlat serial primary key,
    nomPlat varchar,
    apportCaloriePlat float,
    prixPlat float
);

create table photoPlat (
    idPlat int,
    photoPlat varchar,
    foreign key (idPlat) references plat (idPlat)
);

create table sport (
    idSport serial primary key,
    nomSport varchar,
    deficitCalorePlat float
);

create table photoSport (
    idSport int,
    photoSport varchar,
    foreign key (idSport) references sport (idSport)
);

create table objetif (
    idObjetif serial primary key,
    nomObjectif varchar
);

create table regime (
    idRegime serial primary key,
    nomRegime varchar,
    idObjetif int,
    foreign key (idObjetif) references objetif (idObjetif)
);

create table detailRegime (
    idRegime serial primary key,
    idPlat int,
    idSport int,
    foreign key (idPlat) references plat (idPlat),
    foreign key (idSport) references sport (idSport)
);

create table regimePersonne (
    idRegimePersonne serial primary key,
    idUser int,
    idObjetif int,
    foreign key (idUser) references users (idUser),
    foreign key (idObjetif) references objetif (idObjetif)
);

