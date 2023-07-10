create or replace view v_platsportregime as
select detailregime.iddetailregime, detailregime.idregime, detailregime.idplat, plat.apportcalorieplat,plat.nomplat, regime.idobjectif, regime.nomregime,detailregime.idsport , sport.deficitcalorie, sport.nomsport,objectif.nomobjectif
from detailregime
join regime on regime.idregime = detailregime.idregime
join plat on plat.idplat = detailregime.idplat
join objectif on regime.idobjectif = objectif.idobjectif
join sport on sport.idsport = detailregime.idsport;


create or replace view v_photoplat as 
select photoplat.photoplat
from photoplat 
join v_platsportregime on v_platsportregime.idplat = photoplat.idplat;


create or replace view v_photosport as 
select photosport.photosport
from photosport 
join v_platsportregime on v_platsportregime.idsport = photosport.idsport;


create or replace view v_diffplatsport as
select idobjectif, nomobjectif, idregime, nomregime, sum(apportcalorieplat) as calorieplat,sum(deficitcalorie) as caloriesport,(sum(apportcalorieplat)-sum(deficitcalorie)) as diffplatsport from v_platsportregime group by idregime,idobjectif,nomobjectif,nomregime;


create or replace view v_

