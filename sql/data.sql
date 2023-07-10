insert into users (nomuser,prenomuser,genreuser,naissanceuser,mailuser,mdpuser) values 
('FitDreamer','Sarah',2,'1990-07-12','sarah90fit@gmail.com',md5('sarah13')),
('ActiveLion','David',1,'1985-05-25','david85active@gmail.com',md5('david85')),
('HealthyJourney','Emily',2,'1992-10-08','emily92healthy@gmail.com',md5('emily92')),
('FitExplorer','Alex',1,'1988-06-17','emily92healthy@gmail.com',md5('alex88')),
('WellnessSeeker','Laura',2,'1994-11-05','laura94wellness@gmail.com',md5('laura94'));


insert into superuser (mailSuperuser,mdpsuperuser) values 
('admin@gmail.com','admin');

insert into detailuser(iduser,tailleuser,poidsuser,dateUpdateDetailuser) values (1,160,48,'2023-07-10');
insert into detailuser(iduser,tailleuser,poidsuser,dateUpdateDetailuser) values (2,170,78,'2023-07-10');
insert into detailuser(iduser,tailleuser,poidsuser,dateUpdateDetailuser) values (3,165,98,'2023-07-10');
insert into detailuser(iduser,tailleuser,poidsuser,dateUpdateDetailuser) values (4,180,88,'2023-07-10');
insert into detailuser(iduser,tailleuser,poidsuser,dateUpdateDetailuser) values (5,175,68,'2023-07-10');

insert into plat (nomplat,apportcalorieplat) values 
('Salade de poulet grillé',350),
('Saumon grillé avec légumes rôtis',400),
('Pâtes à la sauce tomate et aux légumes',350),
('Wrap au poulet avec salade et avocat',300),
('Steak de boeuf avec pommes de terre rôties et légumes verts',450),
('Omelette aux légumes avec une tranche de pain complet',250),
('Riz brun avec poulet teriyaki et légumes sautés',400),
('Chili végétarien avec du riz',350),
('Salade grecque avec feta, concombre, tomate et olives',200),
('Burrito au boeuf haché avec haricots, riz et salsa',400),
('Cheeseburger avec frites',700),
('Pizza au pepperoni avec croûte épaisse',800),
('Poulet frit avec purée de pommes de terre et sauce',700),
('Ribs de porc avec sauce barbecue et accompagnement',800),
('Gratin dauphinois',600);

insert into sport (nomSport,deficitcalorieplat) values 
('Course à pied',400),
('Natation',400),
('Cyclisme',400),
('Aérobic',400),
('Zumba',300),
('Boxe',500),
('Escalade en salle',500),
('Tennis',300);


insert into objectif ( nomobjectif ) values 
('Augmenter son poids'),
('Réduire son poids');

insert into regime (nomregime,idobjectif,prixregime) values 
('Regime Gagnepoids',1,50000),
('Programme Prise de Masse',1,100000),
('Regime Equilibre',1,60000),
('Programme Minceur Actif',2,150000),
('Regime Equilibre Vitalite',2,120000);


insert into detailregimeplat (idplat) values
(10),
(15),
(10),
(11),
(12),
(13),
(14),
(1),
(2),
(3),
(1),
(2),
(3),
(4),
(5);


insert into detailregimesport (idsport) values 
(1),
(2),
(3),
(4),
(5);

