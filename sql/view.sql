create or replace view v_platsportregime as
select detailregime.iddetailregime, detailregime.idregime, detailregime.idplat, plat.apportcalorieplat,regime.idobjectif, regime.nomregime,detailregime.idsport , sport.deficitcalorie, objectif.nomobjectif
from detailregime
join regime on regime.idregime = detailregime.idregime
join plat on plat.idplat = detailregime.idplat
join objectif on regime.idobjectif = objectif.idobjectif
join sport on sport.idsport = detailregime.idsport;


create or replace view v_diffplatsport as
select idobjectif, nomobjectif,idregime, nomregime,sum(apportcalorieplat) as calorieplat,sum(deficitcalorie) as caloriesport,(sum(apportcalorieplat)-sum(deficitcalorie)) as diffplatsport from v_platsportregime group by idregime,idobjectif,nomobjectif,nomregime;