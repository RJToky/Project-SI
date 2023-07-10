select regime.nomregime , detailregime.* , plat.* , sport.* 
from regime
join detailregime on detailregime.idregime = regime.idregime
join plat on detailregime.idplat = plat.idplat
join sport on detailregime.idsport = sport.idsport

select detailregime.* , plat.*  
from detailregime
join plat on detailregime.idplat = plat.idplat
join sport on detailregime.idsport = sport.idsport