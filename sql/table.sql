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
    idplat serial primary key,
    photoplat varchar,
    foreign key (idplat) references plat (idplat)
);

create table sport (
    idsport serial primary key,
    nomsport varchar,
    deficitcalorie float
);

create table photosport (
    idsport serial primary key,
    photosport varchar,
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
    foreign key (idobjectif) references objectif (idobjectif)
);

create table prixregime (
    idprixregime serial primary key,
    intervalle1 int,
    intervalle2 int,
    prixregime float
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


create table kgcalorie (
    kg int,
    calorie float
);


create table code (
    idcode serial primary key,
    numerocode varchar,
    montantcode float
);

create table codeuser (
    idcodeuser serial primary key,
    idcode int,
    iduser int,
    validitecode int,
    foreign key (idcode) references code (idcode),
    foreign key (iduser) references users (iduser)
);


create table portemonnaieuser (
    idportemonnaie serial primary key,
    iduser int,
    montant float,
    foreign key (iduser) references users (iduser)
);

create table achatuser (
    idachatuser serial primary key,
    iduser int,
    montant float,
    idregime int,
    confirmationachat int,
    foreign key (iduser) references users (iduser),
    foreign key (idregime) references regime (idregime)
);