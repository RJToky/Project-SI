create database asiorezim;

\c asiorezim;

create table users (
    iduser serial primary key,
    nomuser varchar,
    prenomuser varchar,
    genreuser int,
    naissanceuser date,
    mailuser varchar,
    mdpuser varchar
);

create table superuser (
    idsuperuser serial primary key,
    mailsuperuser varchar,
    mdpsuperuser varchar
);

create table detailuser (
    iddetailuser serial primary key,
    iduser int,
    tailleuser float,
    poidsuser float,
    dateupdatedetailuser date,
    foreign key (iduser) references users (iduser)
);

create table plat (
    idplat serial primary key,
    nomplat varchar,
    apportcalorieplat float
);

create table photoplat (
    idplat int,
    photoplat varchar,
    foreign key (idplat) references plat (idplat)
);

create table sport (
    idsport serial primary key,
    nomsport varchar,
    deficitcalorieplat float
);

create table photopsort (
    idsport int,
    photopsort varchar,
    foreign key (idsport) references sport (idsport)
);

create table objectif (
    idobjectif serial primary key,
    nomobjectif varchar
);

create table regime (
    idregime serial primary key,
    nomregime varchar,
    idobjectif int,
    poids1 float,
    poids2 float,
    dureeregime int,
    prixregime float,
    foreign key (idobjectif) references objectif (idobjectif)
);

create table detailregime (
    iddetailregime serial primary key,
    idregime int,
    idplat int,
    idsport int,
    foreign key (idregime) references regime (idregime),
    foreign key (idplat) references plat (idplat),
    foreign key (idsport) references sport (idsport)
);


create table regimepersonne (
    idregimepersonne serial primary key,
    iduser int,
    idobjectif int,
    foreign key (iduser) references users (iduser),
    foreign key (idobjectif) references objectif (idobjectif)
);

