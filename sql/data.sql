insert into users (nomuser,prenomuser,genreuser,naissanceuser,mailuser,mdpuser) values 
('FitDreamer','Sarah',2,'1990-07-12','sarah90fit@gmail.com',md5('sarah13')),
('ActiveLion','David',1,'1985-05-25','david85active@gmail.com',md5('david85')),
('HealthyJourney','Emily',2,'1992-10-08','emily92healthy@gmail.com',md5('emily92')),
('FitExplorer','Alex',1,'1988-06-17','emily92healthy@gmail.com',md5('alex88')),
('WellnessSeeker','Laura',2,'1994-11-05','laura94wellness@gmail.com',md5('laura94'));


insert into superuser (mailSuperuser,mdpsuperuser) values 
('admin@gmail.com', md5('admin'));

insert into detailuser(iduser,tailleuser,poidsuser,dateupdatedetailuser) values (1,160,48,'2023-07-10');
insert into detailuser(iduser,tailleuser,poidsuser,dateupdatedetailuser) values (2,170,78,'2023-07-10');
insert into detailuser(iduser,tailleuser,poidsuser,dateupdatedetailuser) values (3,165,98,'2023-07-10');
insert into detailuser(iduser,tailleuser,poidsuser,dateupdatedetailuser) values (4,180,88,'2023-07-10');
insert into detailuser(iduser,tailleuser,poidsuser,dateupdatedetailuser) values (5,175,68,'2023-07-10');

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
('Gratin dauphinois',600),
('Flocons avoine avec des fruits',200),
('Yaourt nature',600),
('Oeufs brouillés',600),
('smoothie aux fruits avec yaourt et épinards',200),
('Barre de céréales aux amandes',200),
('Pancakes avec sirop d érable',300),
('tranches de pain complet avec beurre de cacahuète et tranches de pomme',200);

insert into photoplat (idplat,photoplat) values 
(1,'Salade de poulet.jpg'),
(2,'Saumon grille.jpg'),
(3,'Pates avec sauce.jpg'),
(4,'Wrap avocat.jpg'),
(5,'Steack boeuf.jpg'),
(6,'Omelette legumes.jpg'),
(7,'Riz blanc poulet.jpg'),
(8,'Chili vegan.jpg'),
(9,'Salade grecque.jpg'),
(10,'Buritto boeuf.jpg'),
(11,'Cheeseburger.jpg'),
(12,'Pizza.jpg'),
(13,'Poulet frit.jpg'),
(14,'Porc sauce barbecue.jpg'),
(15,'Gratin.jpg'),
(16,'Flocons d avoine.jpg'),
(17,'Yaourt.jpg'),
(18,'Oeuf brouille.jpg'),
(19,'Smoothie.jpg'),
(20,'Barres cereales.jpg'),
(21,'Pancakes.jpg'),
(22,'Pain perdu.jpg');

insert into sport (nomSport,deficitcalorie) values 
('Course à pied',400),
('Natation',400),
('Cyclisme',400),
('Zumba',300),
('Escalade en salle',500);

insert into photosport (idsport,photosport) values 
(1,'Running.jpg'),
(2,'Natation.jpg'),
(3,'Cyclisme.jpg'),
(4,'Zumba.jpg'),
(5,'Escalade en salle.jpg');


insert into objectif ( nomobjectif ) values 
('Augmenter son poids'),
('Réduire son poids');

insert into regime (nomregime,idobjectif) values 
('Regime Gagnepoids',1),
('Programme Prise de Masse',1),
('Regime Equilibre',2),
('Programme Minceur Actif',2),
('Regime Equilibre Vitalite',2);

insert into prixregime (intervalle1,intervalle2,prixregime) values 
(1,30,500000),
(31,60,1500000),
(61,90,2000000),
(91,120,2500000),
(121,null,3000000);


insert into detailregime (idregime,idplat,idsport) values
(1,10,1),
(1,15,2),
(1,10,3),
(2,11,4),
(2,12,5),
(2,13,1),
(3,14,2),
(3,1,2),
(3,2,1),
(4,3,1),
(4,1,2),
(4,2,3),
(5,3,4),
(5,4,5),
(5,5,2);

insert into kgcalorie values (1,2000);

insert into regimepersonne (iduser,idobjectif) values 
(1,1),
(2,1),
(3,2),
(4,2),
(5,2);

insert into code (numerocode,montantcode) values
('ABC123',500000),
('DEF456',750000),
('GHI789',1000000),
('JKL012',250000),
('MNO345',300000),
('PQR678',150000),
('STU901',800000),
('VWX234',60000),
('YZA567',120000),
('BCD890',40000),
('EFG123',900000),
('HIJ456',110000),
('KLM789',70000),
('NOP012',95000),
('QRS345',550000);

insert into codeuser (idcode,iduser,validitecode) values 
(15,1,1);
insert into codeuser (idcode,iduser,validitecode) values 
(14,2,0);

insert into portemonnaieuser (iduser,montant) values 
(1,550000);

insert into achatuser (iduser,montant,idregime,confirmationachat,dateachat) values 
(1,40000,1,0,'2023-07-11');