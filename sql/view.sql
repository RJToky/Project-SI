CREATE OR REPLACE VIEW v_platsportregime AS
SELECT DISTINCT
    detailregime.iddetailregime,
    detailregime.idregime,
    detailregime.idplat,
    plat.apportcalorieplat,
    plat.nomplat,
    regime.idobjectif,
    regime.nomregime,
    detailregime.idsport,
    sport.deficitcalorie,
    sport.nomsport,
    objectif.nomobjectif,
    photoplat.photoplat,
    photosport.photosport
FROM
    detailregime
    JOIN regime ON regime.idregime = detailregime.idregime
    JOIN plat ON plat.idplat = detailregime.idplat
    JOIN objectif ON regime.idobjectif = objectif.idobjectif
    JOIN sport ON sport.idsport = detailregime.idsport
    JOIN photosport ON photosport.idsport = detailregime.idsport
    JOIN photoplat ON photoplat.idplat = detailregime.idplat;


create or replace view v_photoplat as 
select photoplat.photoplat,v_platsportregime.idregime,plat.nomplat
from photoplat 
join v_platsportregime on v_platsportregime.idplat = photoplat.idplat
join plat on plat.idplat = photoplat.idplat;


create or replace view v_photosport as 
select photosport.photosport,v_platsportregime.idregime,sport.nomsport
from photosport 
join v_platsportregime on v_platsportregime.idsport = photosport.idsport
join sport on sport.idsport = photosport.idsport;


create or replace view v_diffplatsport as
select idobjectif, nomobjectif, idregime, nomregime, sum(apportcalorieplat) as calorieplat,sum(deficitcalorie) as caloriesport,(sum(apportcalorieplat)-sum(deficitcalorie)) as diffplatsport from v_platsportregime group by idregime,idobjectif,nomobjectif,nomregime;


create or replace view v_codeuser as
select code.numerocode,code.montantcode,users.nomuser,users.prenomuser,codeuser.validitecode
from codeuser 
join code on code.idcode = codeuser.idcode
join users on users.iduser = codeuser.iduser;

create or replace view v_derniertransaction as
select achatuser.iduser, achatuser.montant, v_diffplatsport.idobjectif, v_diffplatsport.nomregime, achatuser.dateachat, v_diffplatsport.diffplatsport
from achatuser
join v_diffplatsport on v_diffplatsport.idregime = achatuser.idregime
LIMIT 10;

create or replace view v_objectifpersonne as
select detailuser.iduser, detailuser.tailleuser, detailuser.poidsuser , detailuser.dateupdatedetailuser, regimepersonne.idobjectif
from detailuser 
join regimepersonne on regimepersonne.iduser = detailuser.iduser;


create or replace view v_poidsmoyen as
select avg(poidsuser) as poidsmoyen, detailuser.dateupdatedetailuser , regimepersonne.idobjectif
from detailuser 
join regimepersonne on regimepersonne.iduser = detailuser.iduser group by detailuser.dateupdatedetailuser,regimepersonne.idobjectif order by detailuser.dateupdatedetailuser ASC;


create or replace view imc as
select iduser,poidsuser/((tailleuser/100)*(tailleuser/100)) as resultatimc
from detailuser;