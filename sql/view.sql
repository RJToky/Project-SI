select detailregime.iddetailregime, detailregime.idregime, detailregime.idplat, sport.nomsport,sport.deficitcalorieplat
from detailregime 
join sport on sport.idsport = detailregime.idsport