create or replace view v_platsportregime as
select detailregime.iddetailregime, detailregime.idregime, detailregime.idplat, plat.apportcalorieplat,plat.nomplat,regime.idobjectif,detailregime.idsport,sport.deficitcalorie,sport.nomsport
from detailregime
join regime on regime.idregime = detailregime.idregime
join plat on plat.idplat = detailregime.idplat
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
select idobjectif,idregime,sum(apportcalorieplat) as calorieplat,sum(deficitcalorie) as caloriesport,(sum(apportcalorieplat)-sum(deficitcalorie)) as diffplatsport from platsportregime group by idregime,idobjectif;