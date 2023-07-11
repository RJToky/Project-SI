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

insert into photoplat (photoplat) values 
('Salade de poulet.jpg'),
('Saumon grille.jpg'),
('Pates avec sauce.jpg'),
('Wrap avocat.jpg'),
('Steack boeuf.jpg'),
('Omelette legumes.jpg'),
('Riz blanc poulet.jpg'),
('Chili vegan.jpg'),
('Salade grecque.jpg'),
('Buritto boeuf.jpg'),
('Cheeseburger.jpg'),
('Pizza.jpg'),
('Poulet frit.jpg'),
('Porc sauce barbecue.jpg'),
('Gratin.jpg'),
('Flocons d avoine.jpg'),
('Yaourt.jpg'),
('Oeuf brouille.jpg'),
('Smoothie.jpg'),
('Barres cereales.jpg'),
('Pancakes.jpg'),
('Pain perdu.jpg');

insert into sport (nomSport,deficitcalorie) values 
('Course à pied',400),
('Natation',400),
('Cyclisme',400),
('Zumba',300),
('Escalade en salle',500);

insert into photosport (photosport) values 
('Running.jpg'),
('Natation.jpg'),
('Cyclisme.jpg'),
('Zumba.jpg'),
('Zumba.jpg'),
('Escalade en salle.jpg');


insert into objectif ( nomobjectif ) values 
('Augmenter son poids'),
('Réduire son poids');

insert into regime (nomregime,idobjectif) values 
('Regime Gagnepoids',1),
('Programme Prise de Masse',1),
('Programme kilosplus',1),
('Régime botabota',1),
('Regime Equilibre',2),
('Programme Minceur Actif',2),
('Regime mahia',2),
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
(5,16,4),
(5,17,5),
(5,18,2),
(6,19,1),
(6,20,2),
(6,21,3),
(7,22,4),
(7,1,5),
(7,2,2);

insert into kgcalorie values (1,2000);

insert into regimepersonne (iduser,idobjectif,poidsvisee) values 
(1,1,52),
(2,1,57),
(3,2,54),
(4,2,51),
(5,2,48);

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
(1,40000,1,0,'2023-07-11'),
(2,600000,1,0,'2023-07-11'),
(3,700000,1,0,'2023-07-11'),
(3,500000,2,0,'2023-07-11');

insert into detailuser (iduser,tailleuser,poidsuser,dateupdatedetailuser) values 
(1,160,46,'2023-07-08'),
(2,170,70,'2023-07-09'),
(1,160,50,'2023-07-11'),
(2,170,84,'2023-07-11'),
(3,165,83,'2023-07-11'),
(4,180,84,'2023-07-11'),
(5,175,62,'2023-07-11'),
(3,165,100,'2023-07-08'),
(4,180,100,'2023-07-09'),
(5,175,72,'2023-07-09');