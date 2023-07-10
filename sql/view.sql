create or replace view platsportregime as
select detailregime.iddetailregime, detailregime.idregime, detailregime.idplat, plat.apportcalorieplat,plat.nomplat,regime.idobjectif,detailregime.idsport,sport.deficitcalorie,sport.nomsport
from detailregime
join regime on regime.idregime = detailregime.idregime
join plat on plat.idplat = detailregime.idplat
join sport on sport.idsport = detailregime.idsport;


create or replace view diffplatsport as
select idobjectif,idregime,sum(apportcalorieplat) as calorieplat,sum(deficitcalorie) as caloriesport,(sum(apportcalorieplat)-sum(deficitcalorie)) as diffplatsport from platsportregime group by idregime,idobjectif;